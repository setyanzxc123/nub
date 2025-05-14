<?php
class Pengguna_model
{

	private $table = 'rs_pengguna';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}


	public function getAllPengguna()
	{
		$this->db->query('SELECT *FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function countPenggunaByUsername($rs_pengguna_pengguna)
	{
		$query = "SELECT *FROM " . $this->table . " WHERE rs_pengguna_pengguna = :rs_pengguna_pengguna";

		$this->db->query($query);
		$this->db->bind('rs_pengguna_pengguna', $rs_pengguna_pengguna);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function insertDataPengguna($data, $rs_pengguna_id_ex)
	{
		$query = "INSERT INTO " . $this->table . " (rs_pengguna_id_ex, rs_pengguna_pengguna, rs_pengguna_nama, rs_pengguna_sandi)
						VALUES
						(:rs_pengguna_id_ex, :rs_pengguna_pengguna, :rs_pengguna_nama, :rs_pengguna_sandi)";

		$this->db->query($query);
		$this->db->bind('rs_pengguna_id_ex', $rs_pengguna_id_ex);
		$this->db->bind('rs_pengguna_pengguna', (string) $data['rs_pengguna_pengguna']);
		$this->db->bind('rs_pengguna_nama', (string) $data['rs_pengguna_nama']);
		$this->db->bind('rs_pengguna_sandi', (string) $data['rs_pengguna_sandi']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getPenggunaById($rs_pengguna_id_ex)
	{
		$query = "SELECT rs_pengguna_id_ex, rs_pengguna_pengguna, rs_pengguna_nama, rs_pengguna_sandi FROM " . $this->table . " WHERE rs_pengguna_id_ex = :rs_pengguna_id_ex";

		$this->db->query($query);
		$this->db->bind('rs_pengguna_id_ex', $rs_pengguna_id_ex);


		$this->db->execute();

		return $this->db->single();
	}

	public function updateDataPengguna($data)
	{
		$query = "UPDATE " . $this->table . " SET rs_pengguna_pengguna = :rs_pengguna_pengguna, rs_pengguna_nama = :rs_pengguna_nama, rs_pengguna_sandi = :rs_pengguna_sandi WHERE rs_pengguna_id_ex = :rs_pengguna_id_ex";

		$this->db->query($query);
		$this->db->bind('rs_pengguna_id_ex', (string) $data['rs_pengguna_id_ex']);
		$this->db->bind('rs_pengguna_pengguna', (string) $data['rs_pengguna_pengguna']);
		$this->db->bind('rs_pengguna_nama', (string) $data['rs_pengguna_nama']);
		$this->db->bind('rs_pengguna_sandi', (string) $data['rs_pengguna_sandi']);


		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteDataPengguna($rs_pengguna_id_ex)
	{
		$query = "DELETE FROM " . $this->table . " WHERE rs_pengguna_id_ex = :rs_pengguna_id_ex";

		$this->db->query($query);
		$this->db->bind('rs_pengguna_id_ex', $rs_pengguna_id_ex);

		$this->db->execute();

		return $this->db->rowCount();
	}
}
?>