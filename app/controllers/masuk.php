<?php
class Masuk extends Controller
{
	private $idForm = 'masukPengguna';
	private $urlForm = '';
	private $methodForm = 'authmasuk';
	private $data = [];
	public function __construct()
	{
		$this->data['loadingTitle'] = '';
	}
	public function index()
	{
		$this->data['WebTitle'] = 'MASUK';
		$this->data['idForm'] = $this->idForm;
		$this->data['urlForm'] = $this->urlForm;
		$this->data['methodForm'] = $this->methodForm;

		$this->view('login/index', $this->data);
		$this->view('templates/ajaxInsert', $this->data);
	}
	public function authmasuk()
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if (isset($_POST)) {
			$_POST['password'] = $this->model('Rsa_model')->enkripsi($_POST['password']);
			// if(($_POST['username'] == "admin") && (($_POST['password'] == "admin"))){
			if ($this->model('Masuk_model')->cekDataPengguna($_POST) > 0) {
				$this->data['pengguna'] = $this->model('Masuk_model')->getDataPenggunaById($_POST['username']);
				$this->data['pengguna']['rs_pengguna_nama'] = $this->model('Rsa_model')->dekripsi($this->data['pengguna']['rs_pengguna_nama']);


				$this->data['response'] = "success";
				$this->data['content'] = "Berhasil Masuk";
				$_SESSION['rs_pengguna_id_ex'] = $_POST['username'];
				$_SESSION['rs_pengguna_nama'] = $this->data['pengguna']['rs_pengguna_nama'];
			} else {
				$this->data['response'] = "error";
				$this->data['content'] = "Tidak Dapat Masuk, Periksa Kembali Nama Pengguna Dan Kata Sandi";
			}
			echo json_encode($this->data);
		}

	}

	public function autkeluar()
	{
		$_SESSION['rs_pengguna_id_ex'] = "";

		$this->data['response'] = "success";
		$this->data['content'] = "Berhasil Keluar";
		echo json_encode($this->data);
	}
}
?>