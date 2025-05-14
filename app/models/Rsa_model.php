<?php
// mengatur batas waktu eksekusi skrip PHP menjadi 60000 detik (sekitar 16 jam) untuk memungkinkan proses yang memerlukan waktu lama
set_time_limit(60000);
class Rsa_model
{
    private $e = 0; // variabel untuk menyimpan nilai eksponen publik dalam enkripsi RSA. 
    private $n = 0; // variabel untuk menyimpan nilai modulus dalam enkripsi RSA.
    private $d = 0; // variaabel untuk menyimpan nilai eksponen privat dalam enkripsi RSA.

    private $batas_bawah = 257; // batas bawah untuk mencari bilangan prima. 
    private $batas_atas = 1000; // batas atas untuk mencari bingan prima.
    private $prima_p = 0; // variabel untuk menyimpan bilangan prima p.
    private $prima_q = 0; // variabel untuk menyimpan bilangan prima q.
    private $bilangan_n = 0; // variabel untuk menyimpan hasil perkalian dua bilangan prima p dan q.
    private $bilangan_phi = 0; // variabel untuk menyimpan nilai fungsi totien Euler.
    private $bilangan_e = 0; // variabel untuk menyimpan nilai ekponen publik yang diguanakan dalam RSA.
    private $bilangan_gcd = 0; // variabel untuk menyimpan nilai GCD (greates common divisor) dari phi dan e.
    private $bilangan_k = 0; // variabel untuk menyimpan nilai k yang digunakan untuk menghitung nilai d dalam RSA.
    private $bilangan_d = 0; // variabel untuk menyimpan nilai eksponen privat dalam RSA.
    private $bilangan = []; // array untuk menyimpan semua bilangan dalam RSA. 

    private $dh_p; // prime number untuk Diffie-Hellman key exchange.
    private $dh_g; // base (generator) untuk Diffie-Hellman key exchange.
    private $dh_private; // kunci private untuk Diffie-Hellman key exchange.
    private $dh_public; // kunci publik untuk Diffie-Hellman key exchange. 
    private $dh_shared_secret; // secret key hasil pertukaran Diffie-Hellman. 

    public function __construct()
    {
        $file = file("./app/kunci.txt");
        $file_ex = explode(",", $file[0]);
        $this->e = (int) $file_ex[0];
        $this->n = (int) $file_ex[1];
        $this->d = (int) $file_ex[2];
        // konstruktor mengambil nilai kunci RSA dari file 'kunci.text' dan menginisialisasi variabel $e, $n, dan $d.
        // 'kunci.txt' diasumsikan berisi nilai-nilai ini dalam format CSV (mis. "65537,123456789, 987654321").

        // Initialize Diffie-Hellman parameters
        $this->dh_p = gmp_init('FFFFFFFFFFFFFFFFC90FDAA22168C234C4C6628B80DC1CD1' .
                               '29024E088A67CC74020BBEA63B139B22514A08798E3404DD' .
                               'EF9519B3CD3A431B302B0A6DF25F14374FE1356D6D51C245' .
                               'E485B576625E7EC6F44C42E9A63A3620FFFFFFFFFFFFFFFF', 16);
        // menginisialisasi $dh_p dengan bilangan prima besar yang digunakan dalam perhitungan Diffie-Helman. bilangan ini dinyatakan dalam basis 16 (heksadesimal).

        $this->dh_g = gmp_init(2);
        // menginisialisasi $dh_g dengan 2, yang merupakan basis umum dalam Diffie-Helman.

        $this->dh_private = gmp_random_range(gmp_init(2), $this->dh_p);
        // menghasilkan kunci private $dh_private secara acak dalam rentang antara 2 dan $dh_p.

        $this->dh_public = gmp_powm($this->dh_g, $this->dh_private, $this->dh_p);
        // menghitung kunci publik $dh_public sebagai g private mod p, dimana g adalah bilangan dasar dan p adalah modulus besar yang sudah diinisialisasi.
    }

    public function getDHPublicKey()
    {
        return gmp_strval($this->dh_public, 16);
        // mengembalikan kunci publik Diffie-Helman dalam format string heksadesimal (basis 16).
    }

    public function setDHPublicKey($public_key)
    {
        $this->dh_shared_secret = gmp_powm(gmp_init($public_key, 16), $this->dh_private, $this->dh_p);
        // menerima kunci publik dari pihak lain ($publik_key) dan menghitung rahasia bersama ($dh_shared secret) menggunakan rumus publik private mod p.
    }

    public function prima()
    {
        for ($i = rand($this->batas_bawah, $this->batas_atas); $i < $this->batas_atas; $i++) {
            if ($this->isprime($i)) {
                return $i;
                break;
            }
        }
        // fungsi ini memilih secara acak bilangan prima antara $batas_bawah dan $batas_atas.
        // bilangan prima pertama yang ditemukan akan dikembalikan sebagai hasil dalam proses pembuatan kunci pada algoritma RSA yang membutuhkan dua bilangan prima besar.
    }

    public function isprime($angka)
    {
        if ($angka % 2 == 0) {
            return false;
        }
        for ($i = 3; $i <= ceil(sqrt($angka)); $i = $i + 2) {
            if ($angka % $i == 0) {
                return false;
            }
        }
        return true;
        // fungsi ini memeriksa apakah sebuah bilangan ($angka) adalah prima.
        // jika angka tersebut genap atau dapat dibagi oleh bilangan lainnya (selain 1 dari dirinya sendiri), maka itu bukan bilangan prima
    }

    public function bilangan()
    {
        $this->prima_p = $this->prima();
        $this->prima_q = $this->prima();
        $this->bilangan_n = $this->prima_p * $this->prima_q;
        $this->bilangan_phi = ($this->prima_p - 1) * ($this->prima_q - 1);
        return true;
        // fungsi ini memilih dua bilangan prima ($prima_p dan $prima_q) dan menghitung nilai $bilangan_n sebagai hasil kali kedua bilangan prima tersebut.
        // $bilangan_phi dihitung menggunakan fungsi Euler: (p - q) * (q - 1). 
    }

    public function gcd()
    {
        for ($i = 0; $i < $this->batas_atas; $i++) {
            $bilangan = $this->bilangan();
            $this->bilangan_e = rand($this->batas_bawah, $this->batas_atas);
            $this->bilangan_gcd = $this->bilangan_phi % $this->bilangan_e;
            if ($this->bilangan_gcd == 1) {
                break;
            }
        }
        // fungsi ini memilih eksponen publik ($bilangan_e) secara acak dan menghitung GCD (greates common divisor) antara $bilangan_phi dan $bilangan_e.
        // GCD harus sama dengan 1 agar $bilangan_e valid. jika tidak, proses akan diulang.
    }

    public function getD()
    {
        //menghitung nilai eksponen privat d yang sesuai dengan eksponen publik e. 
        for ($i = 0; $i < 1000; $i++) {
            $gcd = $this->gcd();
            $this->bilangan_k = rand($this->batas_bawah, $this->batas_atas);
            $this->bilangan_d = (1 + ($this->bilangan_k * $this->bilangan_phi)) / $this->bilangan_e;
            if (is_int($this->bilangan_d)) {
                // menyimpan semua bilanganyang digunakan untuk enkripsi dan dekripsi RSA.
                $this->bilangan['title'] = "Generate Kunci Enkripsi RSA";
                $this->bilangan['prima_p'] = $this->prima_p;
                $this->bilangan['prima_q'] = $this->prima_q;
                $this->bilangan['bilangan_n'] = $this->bilangan_n;
                $this->bilangan['bilangan_phi'] = $this->bilangan_phi;
                $this->bilangan['bilangan_e'] = $this->bilangan_e;
                $this->bilangan['bilangan_gcd'] = $this->bilangan_gcd;
                $this->bilangan['bilangan_k'] = $this->bilangan_k;
                $this->bilangan['bilangan_d'] = $this->bilangan_d;
                break;
            }
        }
        return $this->bilangan; // mengembalikan array yang berisi bilangan RSA.
    }

    public function enkripsi($plainteks, $e = '', $n = '')
    {
        // mengenkripsi teks menggunakan algoritma RSA.
        if ($e == "") {
            $e = $this->e; // menggunakan eksponen publik default jika tidak diberikan.
        }

        if ($n == "") {
            $n = $this->n; // menggunakan modulus default jika tidak diberikan.
        }
        $length = strlen($plainteks); // menghitung panjang teks yang akan dienkripsi. 
        $ex = str_split((string) $plainteks); // memecah teks menjadi array karakter. 
        $asci = []; // array untuk menyimpan nilai ASCII dari karakter.
        $c = []; // array untuk menyimpan ciphertext.
        $chiper = []; // array untuk menyimpan ciphertext yang dienkripsi.

        // mengkonversi setiap karakter menjadi nilai ASCII.
        for ($i = 0; $i < $length; $i++) {
            $asci[$i] = ord($ex[$i]);
        }

        $lengthArray = count($asci); // menghitung panjang array ASCII.
        // mengenkripsi setiap nilai ASCII menggunakan RSA.
        for ($i = 0; $i < $lengthArray; $i++) {
            $chiper[$i] = bcpowmod($asci[$i], (int) $e, (int) $n);
        }
        $chiper = implode(' ', $chiper); // menggabungkan ciphertext menjadi string.
        return $chiper; // mengembalikan ciphertext yang telah dienkripsi
    }

    public function dekripsi($chiperteks, $d = '', $n = '')
    {
        // mendekripsi text menggunakan algoritma RSA.
        if ($d == "") {
            $d = $this->d; // menggunakan eksponen privat default jika tidak diberikan.
        }

        if ($n == "") {
            $n = $this->n; // menggunakan modulus default jika tidak diberikan.
        }
        $chiper = explode(" ", $chiperteks); // memecah ciphertext menjadi array.
        $length = count($chiper); // menghitung panjang array ciphertext.
        $teks = []; // array untuk menyimpan hasil dekripsi.
        $m = []; //  array untuk menyimpan nilai ASCII hasil dekripsi.
        $asci = []; // array untuk menyimpan menyimpan karakter hasil dekripsi.

        // mendekripsi setiap elemen ciphertext menggunakan RSA.
        for ($i = 0; $i < $length; $i++) {
            $m[$i] = strval(bcpowmod($chiper[$i], $d, $n));
        }

        $lengthArray = count($m); // menghitung panjang array nilai ASCII hasil dekripsi. 
        // mengkonversi nilai ASCII kembali menjadi karakter.
        for ($i = 0; $i < $lengthArray; $i++) {
            $teks[$i] = chr((int) $m[$i]);
        }
        $teks = implode('', $teks); // menggabungkan karakter menjadi tsring teks.
        return $teks; // mengembalikan text yang telah didekripsi.
    }
}
?>
