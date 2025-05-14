<?php
class Another_include
{
	private $table = 'komp_prov';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllProv()
	{
		$this->db->query('SELECT *FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getKabupaten($tableSet, $data)
	{
		$this->table = $tableSet;
		$this->db->query('SELECT komp_kab_nama, komp_kab_id FROM ' . $this->table . ' WHERE komp_prov_id = ' . $data);
		return $this->db->resultSet();
	}

	public function getKecamatan($tableSet, $data)
	{
		$this->table = $tableSet;
		$this->db->query('SELECT komp_kec_id, komp_kec_nama FROM ' . $this->table . ' WHERE komp_kab_id = ' . $data);
		return $this->db->resultSet();
	}

	public function getDesa($tableSet, $data)
	{
		$this->table = $tableSet;
		$this->db->query('SELECT komp_desa_id, komp_desa_nama FROM ' . $this->table . ' WHERE komp_kec_id = ' . $data);
		return $this->db->resultSet();
	}

	public function getAllDiagnosis()
	{
		$this->table = "rs_diagnosis";
		$this->db->query('SELECT *FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getRandStr($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
?>