<?php
class Diagnosis_model
{

	private $table = 'rs_diagnosis';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}


	public function getAllDiagnosis()
	{
		$this->db->query('SELECT *FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function insertDataDiagnosis($data)
	{
		$query = "INSERT INTO " . $this->table . " (rs_diagnosis_kode, rs_diagnosis_nama)
						VALUES
						(:rs_diagnosis_kode, :rs_diagnosis_nama)";

		$this->db->query($query);
		$this->db->bind('rs_diagnosis_kode', (string) $data['rs_diagnosis_kode']);
		$this->db->bind('rs_diagnosis_nama', (string) strtoupper($data['rs_diagnosis_nama']));

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDiagnosisById($rs_diagnosis_kode)
	{
		$query = "SELECT rs_diagnosis_kode, rs_diagnosis_nama FROM " . $this->table . " WHERE rs_diagnosis_kode = :rs_diagnosis_kode";

		$this->db->query($query);
		$this->db->bind('rs_diagnosis_kode', $rs_diagnosis_kode);


		$this->db->execute();

		return $this->db->single();
	}

	public function updateDataDiagnosis($data)
	{
		$query = "UPDATE " . $this->table . " SET rs_diagnosis_nama = :rs_diagnosis_nama WHERE rs_diagnosis_kode = :rs_diagnosis_kode";

		$this->db->query($query);
		$this->db->bind('rs_diagnosis_kode', (string) $data['rs_diagnosis_kode']);
		$this->db->bind('rs_diagnosis_nama', (string) strtoupper($data['rs_diagnosis_nama']));

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteDataDiagnosis($rs_diagnosis_kode)
	{
		$query = "DELETE FROM " . $this->table . " WHERE rs_diagnosis_kode = :rs_diagnosis_kode";

		$this->db->query($query);
		$this->db->bind('rs_diagnosis_kode', $rs_diagnosis_kode);

		$this->db->execute();

		return $this->db->rowCount();
	}
}
?>