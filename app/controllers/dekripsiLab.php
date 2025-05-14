<?php
class DekripsiLab extends Controller
{
	private $idForm = 'dekripsiLabAddData';
	private $urlForm = 'dekripsiLab';
	private $methodForm = 'insertData';
	private $buttonMethod = 'DEKRIPSI';
	private $data = [];

	public function __construct()
	{
		$this->data['loadingTitle'] = 'Sementara Memproses Dekripsi File';
	}

	public function index()
	{
		$this->data['dekripsiLab'] = $this->model('DekripsiLab_model')->getAllDekripsiLab();
		$this->data['WebTitle'] = 'DATA DEKRIPSI HASIL LAB';
		$this->view('templates/header', $this->data);
		$this->view('templates/anotherScript', $this->data);
		$this->view('dekripsiLab/index', $this->data);
		$this->view('anotherInclude/modal');
		$this->view('templates/footer');
	}

	public function addData()
	{
		$this->data['WebTitle'] = 'DATA DEKRIPSI HASIL LAB';
		$this->data['dekripsiLab'] = $this->model('DekripsiLab_model')->getDekripsiId();
		$this->data['idForm'] = $this->idForm;
		$this->data['urlForm'] = $this->urlForm;
		$this->data['methodForm'] = $this->methodForm;
		$this->data['buttonMethod'] = $this->buttonMethod;
		$this->view('templates/header', $this->data);
		$this->view('templates/anotherScript', $this->data);
		$this->view('templates/ajaxInsert', $this->data);
		$this->view('dekripsiLab/addData', $this->data);
		$this->view('templates/footer');
	}

	public function insertData()
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if (isset($_POST)) {
			$rs_dekripsi_file_name = $_FILES['rs_dekripsi_file']['name'];
			$rs_dekripsi_file_dir = $_FILES['rs_dekripsi_file']['tmp_name'];
			$rs_dekripsi_file_size = $_FILES['rs_dekripsi_file']['size'];
			$file_ext = pathinfo($rs_dekripsi_file_name, PATHINFO_EXTENSION);
			$rs_dekripsi_id_ex = $this->model('Another_include')->getRandStr(30);
			$rs_dekripsi_file_name_new = $_POST['rs_dekripsi_kode'] . "." . $file_ext;
			if ($this->model('DekripsiLab_model')->insertDataDekripsi($_POST, $rs_dekripsi_file_name_new, $rs_dekripsi_id_ex) > 0) {
				move_uploaded_file($rs_dekripsi_file_dir, "./hasil/" . $rs_dekripsi_file_name_new);
				$file = file_get_contents("./hasil/" . $rs_dekripsi_file_name_new);
				$enkripsiRSA = $this->model('Rsa_model')->dekripsi($file, $_POST['kunci_d'], $_POST['kunci_n']);

				$file = fopen("./hasil/" . $rs_dekripsi_file_name_new, 'wb');
				fwrite($file, $enkripsiRSA);
				fclose($file);
				$this->data['response'] = "success";
				$this->data['content'] = "Data Berhasil Di Dekripsi";
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

	public function deleteData($rs_dekripsi_id_ex, $rs_dekripsi_file)
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if ($this->model('DekripsiLab_model')->deleteDataDekripsi($rs_dekripsi_id_ex) > 0) {
			unlink("./hasil/" . $rs_dekripsi_file);
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