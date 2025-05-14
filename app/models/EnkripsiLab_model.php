<?php
class EnkripsiLab_model
{

	private $table = 'rs_enkripsi';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}


	public function getAllEnkripsiLab()
	{
		$this->db->query('SELECT *FROM ' . $this->table . ' ORDER BY rs_enkripsi_id DESC');
		return $this->db->resultSet();
	}

	public function getEnkripsiId()
	{
		$this->db->query("SELECT MAX(RIGHT(rs_enkripsi_kode, 5)) as max_id FROM " . $this->table . " ORDER BY rs_enkripsi_id");
		$max_id_db = $this->db->single();

		$max_id = (int) $max_id_db['max_id'];
		$new_id_str = "";
		$new_id = $max_id + 1;
		$lengt_id = strlen((string) $new_id);
		$rolback = 5 - $lengt_id;
		for ($i = 0; $i < $rolback; $i++) {
			$new_id_str .= "0";
		}
		$new_id_str .= (string) $new_id;
		return (string) "labEnk-" . $new_id_str;
	}

	public function insertDataEnkripsi($data, $rs_enkripsi_file_name_new, $rs_enkripsi_id_ex)
	{
		$query = "INSERT INTO " . $this->table . " (rs_enkripsi_id_ex, rs_enkripsi_kode, rs_enkripsi_file, rs_enkripsi_kunci)
						VALUES
						(:rs_enkripsi_id_ex, :rs_enkripsi_kode, :rs_enkripsi_file, :rs_enkripsi_kunci)";

		$this->db->query($query);
		$this->db->bind('rs_enkripsi_id_ex', (string) $rs_enkripsi_id_ex);
		$this->db->bind('rs_enkripsi_kode', (string) $data['rs_enkripsi_kode']);
		$this->db->bind('rs_enkripsi_file', (string) $rs_enkripsi_file_name_new);
		$this->db->bind('rs_enkripsi_kunci', (string) "Kunci P: " . $data['kunci_p'] . ", Kunci Q: " . $data['kunci_q'] . ", Kunci E: " . $data['kunci_e'] . ", Kunci D: " . $data['kunci_d'] . ", Kunci N: " . $data['kunci_n'] . ", Pengguna: " . (string) $_SESSION['rs_pengguna_id_ex']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteDataEnkripsi($rs_enkripsi_id_ex)
	{
		$query = "DELETE FROM " . $this->table . " WHERE rs_enkripsi_id_ex = :rs_enkripsi_id_ex";

		$this->db->query($query);
		$this->db->bind('rs_enkripsi_id_ex', $rs_enkripsi_id_ex);

		$this->db->execute();

		return $this->db->rowCount();
	}
}
?>