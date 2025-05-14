<?php
class Laboratorium extends Controller
{
	private $idForm = 'laboratoriumAddData';
	private $urlForm = 'laboratorium';
	private $methodForm = 'insertData';
	private $buttonMethod = 'SIMPAN';
	private $data = [];

	public function __construct()
	{
		$this->data['loadingTitle'] = '';
	}
	public function index($rs_pasien_id_ex = "")
	{
		if ($rs_pasien_id_ex == "") {
			header("Location: " . BASEURL . "/pasien");
			exit();
		} else {

			$this->data[0] = $this->model('Pasien_model')->getPasienById($rs_pasien_id_ex);
			$this->data[0]['rs_pasien_nama'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_nama']);
			$this->data['WebTitle'] = 'DATA LABORATOIUM PASIEN A.n ' . strtoupper($this->data[0]['rs_pasien_nama']);
			$this->data['hasilLab'] = $this->model('Laboratorium_model')->getLaboratoriumByIdPasien($rs_pasien_id_ex);
			$length = count($this->data['hasilLab']);
			for ($i = 0; $i < $length; $i++) {
				$this->data['hasilLab'][$i]['rs_pasien_nama'] = $this->model('Rsa_model')->dekripsi($this->data['hasilLab'][$i]['rs_pasien_nama']);
				$this->data['hasilLab'][$i]['rs_pasien_jenkel'] = $this->model('Rsa_model')->dekripsi($this->data['hasilLab'][$i]['rs_pasien_jenkel']);
				$this->data['hasilLab'][$i]['rs_pasien_tmpt_lhr'] = $this->model('Rsa_model')->dekripsi($this->data['hasilLab'][$i]['rs_pasien_tmpt_lhr']);
				$this->data['hasilLab'][$i]['rs_pasien_tgl_lhr'] = $this->model('Rsa_model')->dekripsi($this->data['hasilLab'][$i]['rs_pasien_tgl_lhr']);
				$this->data['hasilLab'][$i]['rs_pasien_waktu'] = $this->model('Rsa_model')->dekripsi($this->data['hasilLab'][$i]['rs_pasien_waktu']);
				$this->data['hasilLab'][$i]['rs_pasien_darah'] = $this->model('Rsa_model')->dekripsi($this->data['hasilLab'][$i]['rs_pasien_darah']);
				$this->data['hasilLab'][$i]['rs_pasien_iden'] = $this->model('Rsa_model')->dekripsi($this->data['hasilLab'][$i]['rs_pasien_iden']);
				$this->data['hasilLab'][$i]['rs_lab_pasien_diag'] = $this->model('Rsa_model')->dekripsi($this->data['hasilLab'][$i]['rs_lab_pasien_diag']);
				$this->data['hasilLab'][$i]['rs_diagnosis_nama'] = $this->model('Laboratorium_model')->getDiagnosisById($this->data['hasilLab'][$i]['rs_lab_pasien_diag']);
				$this->data['hasilLab'][$i]['rs_diagnosis_nama'] = $this->data['hasilLab'][$i]['rs_diagnosis_nama']['rs_diagnosis_nama'];
			}
			$this->data['rs_pasien_id_ex'] = $rs_pasien_id_ex;
			$this->view('templates/header', $this->data);
			$this->view('templates/anotherScript', $this->data);
			$this->view('laboratorium/index', $this->data);
			$this->view('anotherInclude/modal');
			$this->view('templates/footer');
		}
	}

	public function addData($rs_pasien_id_ex = "")
	{
		if ($rs_pasien_id_ex == "") {
			header("Location: " . BASEURL . "/pasien");
			exit();
		} else {
			$this->urlForm = 'laboratorium/' . $rs_pasien_id_ex;
			$this->data['id_pasien'] = "";
			$this->data[0] = $this->model('Laboratorium_model')->getPasienById($rs_pasien_id_ex);
			$this->data[0]['rs_pasien_nama'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pasien_nama']);
			$this->data['WebTitle'] = 'DATA LABORATOIUM PASIEN A.n ' . strtoupper($this->data[0]['rs_pasien_nama']);
			$this->data['idForm'] = $this->idForm;
			$this->data['urlForm'] = $this->urlForm;
			$this->data['methodForm'] = $this->methodForm;
			$this->data['buttonMethod'] = $this->buttonMethod;
			$this->view('templates/header', $this->data);
			$this->view('templates/anotherScript', $this->data);
			$this->view('templates/ajaxInsert', $this->data);
			$this->view('laboratorium/addData', $this->data);
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
			$rs_lab_pasien_id_ex = $this->model('Another_include')->getRandStr(20);
			$_POST['rs_lab_pasien_diag'] = $this->model('Rsa_model')->enkripsi($_POST['rs_lab_pasien_diag']);
			if ($this->model('Laboratorium_model')->insertDataLaboratorium($_POST, $rs_lab_pasien_id_ex) > 0) {
				$this->data['response'] = "success";
				$this->data['content'] = "Data Berhasil Disimpan";

			}
			echo json_encode($this->data);
		}
	}

	public function deleteData($rs_lab_pasien_id_ex)
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if ($this->model('Laboratorium_model')->deleteDataLaboratorium($rs_lab_pasien_id_ex) > 0) {
			$this->data['response'] = "success";
			$this->data['content'] = "Data Berhasil Dihapus";
		} else {
			$this->data['response'] = "error";
			$this->data['content'] = "Data Tidak Dapat Dihapus";
		}
		echo json_encode($this->data);
	}
}
?>