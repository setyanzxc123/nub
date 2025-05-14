<?php
class EnkripsiLab extends Controller
{
	private $idForm = 'enkripsiLabAddData';
	private $urlForm = 'enkripsiLab';
	private $methodForm = 'insertData';
	private $buttonMethod = 'ENKRIPSI';
	private $data = [];

	public function __construct()
	{
		$this->data['loadingTitle'] = 'Sementara Memproses Enkripsi File';
	}

	public function index()
	{
		$this->data['enkripsiLab'] = $this->model('EnkripsiLab_model')->getAllEnkripsiLab();
		$this->data['WebTitle'] = 'DATA ENKRIPSI HASIL LAB';
		$this->view('templates/header', $this->data);
		$this->view('templates/anotherScript', $this->data);
		$this->view('enkripsiLab/index', $this->data);
		$this->view('anotherInclude/modal');
		$this->view('templates/footer');
	}

	public function addData()
	{
		$this->data['WebTitle'] = 'DATA ENKRIPSI HASIL LAB';
		$this->data['enkripsiLab'] = $this->model('EnkripsiLab_model')->getEnkripsiId();
		$this->data['kunci'] = $this->model('Rsa_model')->getD();
		$this->data['idForm'] = $this->idForm;
		$this->data['urlForm'] = $this->urlForm;
		$this->data['methodForm'] = $this->methodForm;
		$this->data['buttonMethod'] = $this->buttonMethod;
		$this->view('templates/header', $this->data);
		$this->view('templates/anotherScript', $this->data);
		$this->view('templates/ajaxInsert', $this->data);
		$this->view('enkripsiLab/addData', $this->data);
		$this->view('templates/footer');
	}

	public function insertData()
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if (isset($_POST)) {
			$rs_enkripsi_file_name = $_FILES['rs_enkripsi_file']['name'];
			$rs_enkripsi_file_dir = $_FILES['rs_enkripsi_file']['tmp_name'];
			$rs_enkripsi_file_size = $_FILES['rs_enkripsi_file']['size'];
			$file_ext = pathinfo($rs_enkripsi_file_name, PATHINFO_EXTENSION);
			$rs_enkripsi_id_ex = $this->model('Another_include')->getRandStr(30);
			$rs_enkripsi_file_name_new = $_POST['rs_enkripsi_kode'] . "." . $file_ext;
			if ($this->model('EnkripsiLab_model')->insertDataEnkripsi($_POST, $rs_enkripsi_file_name_new, $rs_enkripsi_id_ex) > 0) {
				move_uploaded_file($rs_enkripsi_file_dir, "./hasil/" . $rs_enkripsi_file_name_new);
				$file = file_get_contents("./hasil/" . $rs_enkripsi_file_name_new);
				$enkripsiRSA = $this->model('Rsa_model')->enkripsi($file, $_POST['kunci_e'], $_POST['kunci_n']);

				$file = fopen("./hasil/" . $rs_enkripsi_file_name_new, 'wb');
				fwrite($file, $enkripsiRSA);
				fclose($file);
				$this->data['response'] = "success";
				$this->data['content'] = "Data Berhasil Di Enkripsi";
			} else {
				$this->data['response'] = "error";
				$this->data['content'] = "Terdapat Kesalahan Saat Menyimpan Data";
			}
		} else {
			$this->data['response'] = "error";
			$this->data['content'] = "Tidak Ada Data Terkirim";
		}
		echo json_encode($this->data);
	}

	public function deleteData($rs_enkripsi_id_ex, $rs_enkripsi_file)
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if ($this->model('EnkripsiLab_model')->deleteDataEnkripsi($rs_enkripsi_id_ex) > 0) {
			unlink("./hasil/" . $rs_enkripsi_file);
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