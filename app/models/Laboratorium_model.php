<?php
class Laboratorium_model
{

	private $table = 'rs_lab_pasien';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getPasienById($rs_pasien_id_ex)
	{
		$this->table = 'rs_pasien';
		$query = "SELECT rs_pasien_id_ex, rs_pasien_nama FROM " . $this->table . " WHERE rs_pasien_id_ex = :rs_pasien_id_ex";

		$this->db->query($query);
		$this->db->bind('rs_pasien_id_ex', $rs_pasien_id_ex);


		$this->db->execute();

		return $this->db->single();
	}

	public function insertDataLaboratorium($data, $rs_lab_pasien_id_ex)
	{
		$query = "INSERT INTO " . $this->table . " (rs_lab_pasien_id_ex, rs_lab_pasien_pasien, rs_lab_pasien_diag)
						VALUES
						(:rs_lab_pasien_id_ex, :rs_lab_pasien_pasien, :rs_lab_pasien_diag)";

		$this->db->query($query);
		$this->db->bind('rs_lab_pasien_id_ex', $rs_lab_pasien_id_ex);
		$this->db->bind('rs_lab_pasien_pasien', (string) $data['rs_pasien_id_ex']);
		$this->db->bind('rs_lab_pasien_diag', (string) $data['rs_lab_pasien_diag']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getLaboratoriumByIdPasien($rs_pasien_id_ex)
	{
		$query = "SELECT rs_lab_pasien.rs_lab_pasien_id_ex, rs_lab_pasien.rs_lab_pasien_diag, rs_pasien.rs_pasien_nama, rs_pasien.rs_pasien_jenkel, rs_pasien.rs_pasien_tmpt_lhr, rs_pasien.rs_pasien_tgl_lhr, rs_pasien.rs_pasien_darah, rs_pasien.rs_pasien_waktu, rs_pasien.rs_pasien_iden FROM " . $this->table . " INNER JOIN rs_pasien ON " . $this->table . ".rs_lab_pasien_pasien = rs_pasien.rs_pasien_id_ex WHERE rs_pasien.rs_pasien_id_ex = :rs_pasien_id_ex";

		$this->db->query($query);
		$this->db->bind('rs_pasien_id_ex', $rs_pasien_id_ex);

		$this->db->execute();

		return $this->db->resultSet();
	}

	public function getDiagnosisById($rs_diagnosis_kode)
	{
		$this->table = 'rs_diagnosis';
		$query = "SELECT rs_diagnosis_nama FROM " . $this->table . " WHERE rs_diagnosis_kode = :rs_diagnosis_kode";

		$this->db->query($query);
		$this->db->bind('rs_diagnosis_kode', $rs_diagnosis_kode);


		$this->db->execute();

		return $this->db->single();
	}

	public function deleteDataLaboratorium($rs_lab_pasien_id_ex)
	{
		$query = "DELETE FROM " . $this->table . " WHERE rs_lab_pasien_id_ex = :rs_lab_pasien_id_ex";

		$this->db->query($query);
		$this->db->bind('rs_lab_pasien_id_ex', $rs_lab_pasien_id_ex);

		$this->db->execute();

		return $this->db->rowCount();
	}
}
?>