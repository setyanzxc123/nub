<?php
class Pasien extends Controller
{
	private $idForm = 'pasienAddData';
	private $urlForm = 'pasien';
	private $methodForm = 'insertData';
	private $buttonMethod = 'SIMPAN';
	private $data = [];
	public function __construct()
	{
		$this->data['loadingTitle'] = '';
	}
	public function index()
	{
		$this->data['pasien'] = $this->model('Pasien_model')->getAllPasien();
		$this->data['WebTitle'] = 'DATA PASIEN';
		$length = count($this->data['pasien']);
		for ($i = 0; $i < $length; $i++) {
			$this->data['pasien'][$i]['rs_pasien_nama'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_nama']);
			$this->data['pasien'][$i]['rs_pasien_jenkel'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_jenkel']);
			$this->data['pasien'][$i]['rs_pasien_tmpt_lhr'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_tmpt_lhr']);
			$this->data['pasien'][$i]['rs_pasien_tgl_lhr'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_tgl_lhr']);
			$this->data['pasien'][$i]['rs_pasien_kerja'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_kerja']);
			$this->data['pasien'][$i]['rs_pasien_alamat'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_alamat']);
			$this->data['pasien'][$i]['rs_pasien_telp'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_telp']);
			$this->data['pasien'][$i]['rs_pasien_hub'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_hub']);
			$this->data['pasien'][$i]['rs_pasien_agama'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_agama']);
			$this->data['pasien'][$i]['rs_pasien_waktu'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_waktu']);
			$this->data['pasien'][$i]['rs_pasien_ket'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_ket']);
			$this->data['pasien'][$i]['rs_pasien_ibu'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_ibu']);
			$this->data['pasien'][$i]['rs_pasien_ayah'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_ayah']);
			$this->data['pasien'][$i]['rs_pasien_darah'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_darah']);
			$this->data['pasien'][$i]['rs_pasien_iden'] = $this->model('Rsa_model')->dekripsi($this->data['pasien'][$i]['rs_pasien_iden']);
		}
		$this->view('templates/header', $this->data);
		$this->view('templates/anotherScript', $this->data);
		$this->view('pasien/index', $this->data);
		$this->view('anotherInclude/modal');
		$this->view('templates/footer');
	}
	public function addData()
	{
		$this->data['WebTitle'] = 'DATA PASIEN';
		$this->data['id_pasien'] = $this->model('Pasien_model')->getPasienId();
		$this->data['idForm'] = $this->idForm;
		$this->data['urlForm'] = $this->urlForm;
		$this->data['methodForm'] = $this->methodForm;
		$this->data['buttonMethod'] = $this->buttonMethod;
		$this->view('templates/header', $this->data);
		$this->view('templates/anotherScript', $this->data);
		$this->view('templates/ajaxInsert', $this->data);
		$this->view('pasien/addData', $this->data);
		$this->view('anotherInclude/modal');
		$this->view('templates/footer');
	}
	public function editData($rs_pasien_id_ex = '')
	{
		if ($rs_pasien_id_ex == "") {
			header("Location: " . BASEURL . "/pasien");
			exit();
		} else {
			$this->data['WebTitle'] = 'DATA PASIEN';
			$this->data['id_pasien'] = "";
			$this->data[0] = $this->model('Pasien_model')->getPasienById($rs_pasien_id_ex);
			$this->data[0]['rs_pasien_nama'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_nama']);
			$this->data[0]['rs_pasien_jenkel'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_jenkel']);
			$this->data[0]['rs_pasien_tmpt_lhr'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_tmpt_lhr']);
			$this->data[0]['rs_pasien_tgl_lhr'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_tgl_lhr']);
			$this->data[0]['rs_pasien_kerja'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_kerja']);
			$this->data[0]['rs_pasien_alamat'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_alamat']);
			$this->data[0]['rs_pasien_telp'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_telp']);
			$this->data[0]['rs_pasien_hub'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_hub']);
			$this->data[0]['rs_pasien_agama'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_agama']);
			$this->data[0]['rs_pasien_waktu'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_waktu']);
			$this->data[0]['rs_pasien_ket'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_ket']);
			$this->data[0]['rs_pasien_ibu'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_ibu']);
			$this->data[0]['rs_pasien_ayah'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_ayah']);
			$this->data[0]['rs_pasien_darah'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_darah']);
			$this->data[0]['rs_pasien_iden'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_iden']);
			$this->data[0]['rs_pasien_rad_pre'] = BASEURL . "/img/uploads/" . $this->data[0]['rs_pasien_rad'];
			unset($this->data[0]['rs_pasien_rad']);
			$this->data['idForm'] = $this->idForm;
			$this->data['urlForm'] = $this->urlForm;
			$this->data['methodForm'] = "updateData";
			$this->data['buttonMethod'] = "UBAH";
			$this->view('templates/header', $this->data);
			$this->view('templates/anotherScript', $this->data);
			$this->view('templates/ajaxInsert', $this->data);
			$this->view('pasien/addData', $this->data);
			$this->view('anotherInclude/modal');
			$this->view('templates/loadData', $this->data);
			$this->view('templates/footer');
		}

	}
	public function insertData()
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if (isset($_POST)) {

			$rs_pasien_rad_name = $_FILES['rs_pasien_rad']['name'];
			$rs_pasien_rad_dir = $_FILES['rs_pasien_rad']['tmp_name'];
			$rs_pasien_rad_size = $_FILES['rs_pasien_rad']['size'];
			$file_ext_rad = pathinfo($rs_pasien_rad_name, PATHINFO_EXTENSION);
			$rs_pasien_rad_name_new = "pic-rad-pasien-" . $_POST['rs_pasien_id_ex'] . "." . $file_ext_rad;
			$_POST['rs_pasien_nama'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_nama']);
			$_POST['rs_pasien_jenkel'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_jenkel']);
			$_POST['rs_pasien_tmpt_lhr'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_tmpt_lhr']);
			$_POST['rs_pasien_tgl_lhr'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_tgl_lhr']);
			$_POST['rs_pasien_kerja'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_kerja']);
			$_POST['rs_pasien_alamat'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_alamat']);

			$_POST['rs_pasien_telp'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_telp']);
			$_POST['rs_pasien_hub'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_hub']);
			$_POST['rs_pasien_agama'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_agama']);
			$_POST['rs_pasien_waktu'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_waktu']);
			$_POST['rs_pasien_ket'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_ket']);
			$_POST['rs_pasien_ibu'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_ibu']);
			$_POST['rs_pasien_ayah'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_ayah']);
			$_POST['rs_pasien_darah'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_darah']);
			$_POST['rs_pasien_iden'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_iden']);
			if ($this->model('Pasien_model')->insertDataPasien($_POST, $rs_pasien_rad_name_new) > 0) {

				move_uploaded_file($rs_pasien_rad_dir, BASEDIR . "uploads/" . $rs_pasien_rad_name_new);
				$this->data['response'] = "success";
				$this->data['content'] = "Data Berhasil Disimpan";

			}
			echo json_encode($this->data);
		}
	}

	public function updateData()
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if (isset($_POST)) {
			$queryTambahan = "";
			$bindParamKey = [];
			$bindParamVal = [];
			$rs_pasien_rad_name = $_FILES['rs_pasien_rad']['name'];
			if ($rs_pasien_rad_name == "") {
				$queryTambahan .= "";
			} else {
				$rs_pasien_rad_name = $_FILES['rs_pasien_rad']['name'];
				$rs_pasien_rad_dir = $_FILES['rs_pasien_rad']['tmp_name'];
				$rs_pasien_rad_size = $_FILES['rs_pasien_rad']['size'];
				$file_ext_rad = pathinfo($rs_pasien_rad_name, PATHINFO_EXTENSION);
				$rs_pasien_rad_name_new = "pic-rad-pasien-" . $_POST['rs_pasien_id_ex'] . "." . $file_ext_rad;
				$queryTambahan .= ", rs_pasien_rad = :rs_pasien_rad ";
				$bindParamKey[0] = "rs_pasien_rad";
				$bindParamVal[0] = $rs_pasien_rad_name_new;
			}

			$_POST['rs_pasien_nama'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_nama']);
			$_POST['rs_pasien_jenkel'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_jenkel']);
			$_POST['rs_pasien_tmpt_lhr'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_tmpt_lhr']);
			$_POST['rs_pasien_tgl_lhr'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_tgl_lhr']);
			$_POST['rs_pasien_kerja'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_kerja']);
			$_POST['rs_pasien_alamat'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_alamat']);
			$_POST['rs_pasien_telp'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_telp']);
			$_POST['rs_pasien_hub'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_hub']);
			$_POST['rs_pasien_agama'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_agama']);
			$_POST['rs_pasien_waktu'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_waktu']);
			$_POST['rs_pasien_ket'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_ket']);
			$_POST['rs_pasien_ibu'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_ibu']);
			$_POST['rs_pasien_ayah'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_ayah']);
			$_POST['rs_pasien_darah'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_darah']);
			$_POST['rs_pasien_iden'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pasien_iden']);

			if ($this->model('Pasien_model')->updateDataPasien($_POST, $queryTambahan, $bindParamKey, $bindParamVal) > 0) {
				if ($rs_pasien_rad_name != "") {
					move_uploaded_file($rs_pasien_rad_dir, BASEDIR . "uploads/" . $rs_pasien_rad_name_new);
				}

				$this->data['response'] = "success";
				$this->data['content'] = "Data Berhasil Diubah";

			} else {
				$this->data['response'] = "error";
				$this->data['content'] = "Tidak Ada Data Yang Diubah";
			}
		} else {
			$this->data['response'] = "error";
			$this->data['content'] = "Tidak Ada Data Yang Terkirim";
		}
		echo json_encode($this->data);
	}

	public function deleteData($rs_pasien_id_ex, $rs_pasien_rad)
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if ($this->model('Pasien_model')->deleteDataPasien($rs_pasien_id_ex) > 0) {
			unlink(BASEDIR . "uploads/" . $rs_pasien_rad);
			$this->data['response'] = "success";
			$this->data['content'] = "Data Berhasil Dihapus";
		} else {
			$this->data['response'] = "error";
			$this->data['content'] = "Data Tidak Dapat Dihapus";
		}
		echo json_encode($this->data);
	}

	public function printOut($rs_pasien_id_ex = '')
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");

		$this->data[0] = $this->model('Pasien_model')->getPasienById($rs_pasien_id_ex);

		$this->data[0]['rs_pasien_nama'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_nama']);
		$this->data[0]['rs_pasien_iden'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_iden']);
		$this->data[0]['rs_pasien_jenkel'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_jenkel']);
		if ($this->data[0]['rs_pasien_jenkel'] == "L") {
			$this->data[0]['rs_pasien_jenkel'] = "LAKI - LAKI";
		} else {
			$this->data[0]['rs_pasien_jenkel'] = "PEREMPUAN";
		}

		$this->data[0]['rs_pasien_alamat'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_alamat']);
		$this->data[0]['rs_pasien_ibu'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_ibu']);

		$this->data[0]['rs_pasien_waktu'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_waktu']);

		$this->data[0]['rs_pasien_waktu'] = (string) date('d F Y H:i:s', strtotime($this->data[0]['rs_pasien_waktu']));

		$this->data[0]['rs_pasien_tmpt_lhr'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_tmpt_lhr']);

		$this->data[0]['rs_pasien_tgl_lhr'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_tgl_lhr']);

		$this->data[0]['ttl'] = $this->data[0]['rs_pasien_tmpt_lhr'] . ", " . (string) date('d F Y', strtotime($this->data[0]['rs_pasien_tgl_lhr']));

		$this->data[0]['rs_pasien_darah'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_darah']);

		$this->data[0]['rs_pasien_telp'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_telp']);

		$this->data[0]['rs_pasien_kerja'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_kerja']);

		$this->data[0]['rs_pasien_ayah'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_ayah']);

		$this->data[0]['rs_pasien_hub'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_hub']);
		if ($this->data[0]['rs_pasien_hub'] == 1) {
			$this->data[0]['rs_pasien_hub'] = "MENIKAH";
		} else {
			$this->data[0]['rs_pasien_hub'] = "BELUM MENIKAH";
		}

		$this->data[0]['rs_pasien_ket'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_ket']);

		$this->data[0]['Kod_Diag'] = "";
		$this->data[0]['Nama_Diag'] = "";

		$this->data['hasilLab'] = $this->model('Laboratorium_model')->getLaboratoriumByIdPasien($rs_pasien_id_ex);
		$length = count($this->data['hasilLab']);
		for ($i = 0; $i < $length; $i++) {
			$this->data['hasilLab'][$i]['rs_lab_pasien_diag'] = $this->model('Rsa_model')->dekripsi($this->data['hasilLab'][$i]['rs_lab_pasien_diag']);
			$this->data['hasilLab'][$i]['rs_diagnosis_nama'] = $this->model('Laboratorium_model')->getDiagnosisById($this->data['hasilLab'][$i]['rs_lab_pasien_diag']);
			$this->data['hasilLab'][$i]['rs_diagnosis_nama'] = $this->data['hasilLab'][$i]['rs_diagnosis_nama']['rs_diagnosis_nama'];
			$this->data[0]['Kod_Diag'] .= $this->data['hasilLab'][$i]['rs_lab_pasien_diag'] . "<w:br />";
			$this->data[0]['Nama_Diag'] .= $this->data['hasilLab'][$i]['rs_diagnosis_nama'] . "<w:br />";
		}


		$this->data[0]['date_print'] = (string) date('d F Y', strtotime(date("Ymd")));


		$zip = new ZipArchive();
		$templateFilename = './templates/diagnosis_peserta.docx';
		$inputFilename = "./hasil/diagnosis-" . $rs_pasien_id_ex . ".docx";
		if (!copy($templateFilename, $inputFilename)) {
			$this->data['response'] = "error";
			$this->data['content'] = "Tidak Dapat Menyalin File Dari '$templateFilename' Ke '$inputFilename'";
		} else {
			if ($zip->open($inputFilename, ZipArchive::CREATE) !== TRUE) {
				$this->data['response'] = "error";
				$this->data['content'] = "Tidak Dapat Membuka File '$inputFilename'";
				die;
			} else {
				$xml = $zip->getFromName('word/document.xml');
				$xml = str_replace("No_Pes", $this->data[0]['rs_pasien_id_ex'], $xml);
				$xml = str_replace("Na_Pes", $this->data[0]['rs_pasien_nama'], $xml);
				$xml = str_replace("Iden_Pes", $this->data[0]['rs_pasien_iden'], $xml);
				$xml = str_replace("Jen_Kel", $this->data[0]['rs_pasien_jenkel'], $xml);
				$xml = str_replace("Al_Pes", $this->data[0]['rs_pasien_alamat'], $xml);
				$xml = str_replace("Ibu_Pes", $this->data[0]['rs_pasien_ibu'], $xml);
				$xml = str_replace("Wa_Mas", $this->data[0]['rs_pasien_waktu'], $xml);
				$xml = str_replace("Tem_La", $this->data[0]['ttl'], $xml);
				$xml = str_replace("Gol_Da", $this->data[0]['rs_pasien_darah'], $xml);
				$xml = str_replace("Tel_Pes", $this->data[0]['rs_pasien_telp'], $xml);
				$xml = str_replace("Ker_Pes", $this->data[0]['rs_pasien_kerja'], $xml);
				$xml = str_replace("Ay_Pes", $this->data[0]['rs_pasien_ayah'], $xml);
				$xml = str_replace("Stat_Pes", $this->data[0]['rs_pasien_hub'], $xml);
				$xml = str_replace("Ket_pes", $this->data[0]['rs_pasien_ket'], $xml);
				$xml = str_replace("Kod_Diag", $this->data[0]['Kod_Diag'], $xml);
				$xml = str_replace("Nama_Diag", $this->data[0]['Nama_Diag'], $xml);
				$xml = str_replace("date_print", $this->data[0]['date_print'], $xml);
				if ($zip->addFromString('word/document.xml', $xml)) {
					$zip->close();
					$this->data['response'] = "success";
					$this->data['content'] = "Hasil Laboratorium Berhasil Dibuat";
				} else {
					$this->data['response'] = "error";
					$this->data['content'] = "Nota Tidak Dapat Dibuat, Periksa Akses Direktori File Anda";
				}
			}
		}
		echo json_encode($this->data);
	}
}
?>