<?php
class DekripsiLab_model
{

	private $table = 'rs_dekripsi';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}


	public function getAllDekripsiLab()
	{
		$this->db->query('SELECT *FROM ' . $this->table . ' ORDER BY rs_dekripsi_id DESC');
		return $this->db->resultSet();
	}

	public function getDekripsiId()
	{
		$this->db->query("SELECT MAX(RIGHT(rs_dekripsi_kode, 5)) as max_id FROM " . $this->table . " ORDER BY rs_dekripsi_id");
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
		return (string) "labDek-" . $new_id_str;
	}

	public function insertDataDekripsi($data, $rs_dekripsi_file_name_new, $rs_dekripsi_id_ex)
	{
		$query = "INSERT INTO " . $this->table . " (rs_dekripsi_id_ex, rs_dekripsi_kode, rs_dekripsi_file, rs_dekripsi_kunci)
						VALUES
						(:rs_dekripsi_id_ex, :rs_dekripsi_kode, :rs_dekripsi_file, :rs_dekripsi_kunci)";

		$this->db->query($query);
		$this->db->bind('rs_dekripsi_id_ex', (string) $rs_dekripsi_id_ex);
		$this->db->bind('rs_dekripsi_kode', (string) $data['rs_dekripsi_kode']);
		$this->db->bind('rs_dekripsi_file', (string) $rs_dekripsi_file_name_new);
		$this->db->bind('rs_dekripsi_kunci', (string) "Kunci D: " . $data['kunci_d'] . ", Kunci N: " . $data['kunci_n']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteDataDekripsi($rs_dekripsi_id_ex)
	{
		$query = "DELETE FROM " . $this->table . " WHERE rs_dekripsi_id_ex = :rs_dekripsi_id_ex";

		$this->db->query($query);
		$this->db->bind('rs_dekripsi_id_ex', $rs_dekripsi_id_ex);

		$this->db->execute();

		return $this->db->rowCount();
	}
}
?>