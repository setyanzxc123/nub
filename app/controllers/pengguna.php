<?php
class Pengguna extends Controller
{
	private $idForm = 'pasienAddData';
	private $urlForm = 'pengguna';
	private $methodForm = 'insertData';
	private $buttonMethod = 'SIMPAN';
	private $data = [];
	public function __construct()
	{
		$this->data['loadingTitle'] = '';
	}
	public function index()
	{
		$this->data['pengguna'] = $this->model('Pengguna_model')->getAllPengguna();
		$this->data['WebTitle'] = 'DATA PENGGUNA';
		$length = count($this->data['pengguna']);
		for ($i = 0; $i < $length; $i++) {
			$this->data['pengguna'][$i]['rs_pengguna_nama'] = $this->model('Rsa_model')->dekripsi($this->data['pengguna'][$i]['rs_pengguna_nama']);
		}
		$this->view('templates/header', $this->data);
		$this->view('templates/anotherScript', $this->data);
		$this->view('pengguna/index', $this->data);
		$this->view('anotherInclude/modal');
		$this->view('templates/footer');
	}

	public function addData()
	{
		$this->data['WebTitle'] = 'DATA PENGGUNA';
		$this->data['idForm'] = $this->idForm;
		$this->data['urlForm'] = $this->urlForm;
		$this->data['methodForm'] = $this->methodForm;
		$this->data['buttonMethod'] = $this->buttonMethod;
		$this->view('templates/header', $this->data);
		$this->view('templates/anotherScript', $this->data);
		$this->view('templates/ajaxInsert', $this->data);
		$this->view('pengguna/addData', $this->data);
		$this->view('anotherInclude/modal');
		$this->view('templates/footer');
	}

	public function editData($rs_pengguna_id_ex = '')
	{
		if ($rs_pengguna_id_ex == "") {
			header("Location: " . BASEURL . "/pengguna");
			exit();
		} else {
			$this->data['WebTitle'] = 'DATA PENGGUNA';
			$this->data[0] = $this->model('Pengguna_model')->getPenggunaById($rs_pengguna_id_ex);
			$this->data[0]['rs_pengguna_nama'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pengguna_nama']);
			$this->data[0]['rs_pengguna_sandi'] = $this->model('Rsa_model')->dekripsi($this->data[0]['rs_pengguna_sandi']);
			$this->data['idForm'] = $this->idForm;
			$this->data['urlForm'] = $this->urlForm;
			$this->data['methodForm'] = "updateData";
			$this->data['buttonMethod'] = "UBAH";
			$this->view('templates/header', $this->data);
			$this->view('templates/anotherScript', $this->data);
			// $this->view('templates/ajaxInsert', $this->data);
			$this->view('pengguna/addData', $this->data);
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
			if (strlen($_POST['rs_pengguna_pengguna']) < 5) {
				$this->data['response'] = "error";
				$this->data['content'] = "Nama Pengguna Harus Lebih Dari 5 Karakter";
			} else {
				if (strlen($_POST['rs_pengguna_pengguna']) > 20) {
					$this->data['response'] = "error";
					$this->data['content'] = "Nama Pengguna Tidak Dapat Lebih Dari 20 Karakter";
				} else {
					if ($this->model('Pengguna_model')->countPenggunaByUsername($_POST['rs_pengguna_pengguna']) > 0) {
						$this->data['response'] = "error";
						$this->data['content'] = "Nama Pengguna Sudah Ada";
					} else {
						$_POST['rs_pengguna_nama'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pengguna_nama']);
						$_POST['rs_pengguna_sandi'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pengguna_sandi']);
						$rs_pengguna_id_ex = $this->model('Another_include')->getRandStr(20);
						if ($this->model('Pengguna_model')->insertDataPengguna($_POST, $rs_pengguna_id_ex) > 0) {
							$this->data['response'] = "success";
							$this->data['content'] = "Data Berhasil Disimpan";

						} else {
							$this->data['response'] = "error";
							$this->data['content'] = "Terdapat Masalah Pada Penyimpanan Data";
						}
					}
				}
			}
		} else {
			$this->data['response'] = "error";
			$this->data['content'] = "Tidak Ada Data Yang Terkirim";
		}
		echo json_encode($this->data);
	}

	public function updateData()
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if (isset($_POST)) {
			if (strlen($_POST['rs_pengguna_pengguna']) < 5) {
				$this->data['response'] = "error";
				$this->data['content'] = "Nama Pengguna Harus Lebih Dari 5 Karakter";
			} else {
				if (strlen($_POST['rs_pengguna_pengguna']) > 20) {
					$this->data['response'] = "error";
					$this->data['content'] = "Nama Pengguna Tidak Dapat Lebih Dari 20 Karakter";
				} else {
					$_POST['rs_pengguna_nama'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pengguna_nama']);
					$_POST['rs_pengguna_sandi'] = $this->model('Rsa_model')->enkripsi($_POST['rs_pengguna_sandi']);
					if ($this->model('Pengguna_model')->updateDataPengguna($_POST) > 0) {
						$this->data['response'] = "success";
						$this->data['content'] = "Data Berhasil Diubah";

					} else {
						$this->data['response'] = "error";
						$this->data['content'] = "Tidak Ada Data Yang Diubah";
					}
				}
			}
		} else {
			$this->data['response'] = "error";
			$this->data['content'] = "Tidak Ada Data Yang Terkirim";
		}
		echo json_encode($this->data);
	}

	public function deleteData($rs_pengguna_id_ex)
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if ($this->model('Pengguna_model')->deleteDataPengguna($rs_pengguna_id_ex) > 0) {
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