<?php
class Masuk_model
{
	private $table = 'rs_pengguna';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function cekDataPengguna($data)
	{
		$query = "SELECT *FROM " . $this->table . " WHERE rs_pengguna_pengguna = :rs_pengguna_pengguna AND rs_pengguna_sandi = :rs_pengguna_sandi";

		$this->db->query($query);
		$this->db->bind('rs_pengguna_pengguna', (string) $data['username']);
		$this->db->bind('rs_pengguna_sandi', (string) $data['password']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getDataPenggunaById($rs_pengguna_pengguna)
	{
		$query = "SELECT *FROM " . $this->table . " WHERE rs_pengguna_pengguna = :rs_pengguna_pengguna";

		$this->db->query($query);
		$this->db->bind('rs_pengguna_pengguna', $rs_pengguna_pengguna);

		$this->db->execute();

		return $this->db->single();
	}
}
?>