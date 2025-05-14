<?php
class AnotherInclude extends Controller
{
	private $data = [];
	public function getDaerah()
	{
		header("Content-Type:application/json;charset=utf-8");
		header("Access-Control-Allow-Origin: *");
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			if ($url[2] == "provinsi") {
				$this->data = $this->model('Another_include')->getAllProv();
				for ($i = 0; $i < count($this->data); $i++) {
					$this->data[$i]['optValue'] = $this->data[$i]['komp_prov_id'];
					$this->data[$i]['optText'] = $this->data[$i]['komp_prov_nama'];
					unset($this->data[$i]['komp_prov_id']);
					unset($this->data[$i]['komp_prov_nama']);
				}
			} elseif ($url[2] == "kabupaten") {
				$this->data = $this->model('Another_include')->getKabupaten('komp_kab', $url[3]);
				for ($i = 0; $i < count($this->data); $i++) {
					$this->data[$i]['optValue'] = $this->data[$i]['komp_kab_id'];
					$this->data[$i]['optText'] = $this->data[$i]['komp_kab_nama'];
					unset($this->data[$i]['komp_kab_id']);
					unset($this->data[$i]['komp_kab_nama']);
				}
			} elseif ($url[2] == "kecamatan") {
				$this->data = $this->model('Another_include')->getKecamatan('komp_kec', $url[3]);
				for ($i = 0; $i < count($this->data); $i++) {
					$this->data[$i]['optValue'] = $this->data[$i]['komp_kec_id'];
					$this->data[$i]['optText'] = $this->data[$i]['komp_kec_nama'];
					unset($this->data[$i]['komp_kec_id']);
					unset($this->data[$i]['komp_kec_nama']);
				}
			} elseif ($url[2] == "desa") {
				$this->data = $this->model('Another_include')->getDesa('komp_desa', $url[3]);
				for ($i = 0; $i < count($this->data); $i++) {
					$this->data[$i]['optValue'] = $this->data[$i]['komp_desa_id'];
					$this->data[$i]['optText'] = $this->data[$i]['komp_desa_nama'];
					unset($this->data[$i]['komp_desa_id']);
					unset($this->data[$i]['komp_desa_nama']);
				}
			}
			echo json_encode($this->data);
		}
	}

	public function getDiagnosis()
	{
		$this->data = $this->model('Another_include')->getAllDiagnosis();
		for ($i = 0; $i < count($this->data); $i++) {
			$this->data[$i]['optValue'] = $this->data[$i]['rs_diagnosis_kode'];
			$this->data[$i]['optText'] = $this->data[$i]['rs_diagnosis_kode'] . " - " . $this->data[$i]['rs_diagnosis_nama'];
			unset($this->data[$i]['rs_diagnosis_kode']);
			unset($this->data[$i]['rs_diagnosis_nama']);
		}
		echo json_encode($this->data);
	}
}
?>