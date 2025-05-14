<?php
class Diagnosis extends Controller
{
	private $idForm = 'diagnosisAddData';
	private $urlForm = 'diagnosis';
	private $methodForm = 'insertData';
	private $buttonMethod = 'SIMPAN';
	private $data = [];

	public function __construct()
	{
		$this->data['loadingTitle'] = '';
	}
	public function index()
	{
		$this->data['diagnosis'] = $this->model('Diagnosis_model')->getAllDiagnosis();
		$this->data['WebTitle'] = 'DATA DIAGNOSIS';
		$this->view('templates/header', $this->data);
		$this->view('templates/anotherScript', $this->data);
		$this->view('diagnosis/index', $this->data);
		$this->view('anotherInclude/modal');
		$this->view('templates/footer');
	}

	public function addData()
	{
		$this->data['WebTitle'] = 'DATA DIAGNOSIS';
		$this->data['idForm'] = $this->idForm;
		$this->data['urlForm'] = $this->urlForm;
		$this->data['methodForm'] = $this->methodForm;
		$this->data['buttonMethod'] = $this->buttonMethod;
		$this->view('templates/header', $this->data);
		$this->view('templates/anotherScript', $this->data);
		$this->view('templates/ajaxInsert', $this->data);
		$this->view('diagnosis/addData', $this->data);
		$this->view('anotherInclude/modal');
		$this->view('templates/footer');
	}

	public function editData($rs_diagnosis_kode = '')
	{
		if ($rs_diagnosis_kode == "") {
			header("Location: " . BASEURL . "/diagnosis");
			exit();
		} else {
			$this->data['WebTitle'] = 'DATA DIAGNOSIS';
			$this->data['id_pasien'] = "";
			$this->data[0] = $this->model('Diagnosis_model')->getDiagnosisById($rs_diagnosis_kode);
			$this->data['idForm'] = $this->idForm;
			$this->data['urlForm'] = $this->urlForm;
			$this->data['methodForm'] = "updateData";
			$this->data['buttonMethod'] = "UBAH";
			$this->view('templates/header', $this->data);
			$this->view('templates/anotherScript', $this->data);
			$this->view('templates/ajaxInsert', $this->data);
			$this->view('diagnosis/addData', $this->data);
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
			if ($this->model('Diagnosis_model')->insertDataDiagnosis($_POST) > 0) {
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
			if ($this->model('Diagnosis_model')->updateDataDiagnosis($_POST) > 0) {
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

	public function deleteData($rs_diagnosis_kode = '')
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if ($this->model('Diagnosis_model')->deleteDataDiagnosis($rs_diagnosis_kode) > 0) {
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