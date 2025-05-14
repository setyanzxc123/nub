<?php
class Pasien_model
{

	private $table = 'rs_pasien';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}


	public function getAllPasien()
	{
		$this->db->query('SELECT *FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getPasienId()
	{
		$this->db->query("SELECT MAX(RIGHT(rs_pasien_id_ex, 5)) as max_id FROM " . $this->table . " ORDER BY rs_pasien_id");
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
		return (string) "PASIEN" . $new_id_str;
	}

	public function insertDataPasien($data, $rs_pasien_rad_name_new)
	{
		$query = "INSERT INTO " . $this->table . " (rs_pasien_id_ex, rs_pasien_nama, rs_pasien_jenkel, rs_pasien_tmpt_lhr, rs_pasien_tgl_lhr, rs_pasien_kerja, rs_pasien_alamat, rs_pasien_telp, rs_pasien_hub, rs_pasien_agama, rs_pasien_waktu, rs_pasien_ket, rs_pasien_ibu, rs_pasien_ayah, rs_pasien_darah, rs_pasien_iden, rs_pasien_rad)
						VALUES
						(:rs_pasien_id_ex, :rs_pasien_nama, :rs_pasien_jenkel, :rs_pasien_tmpt_lhr, :rs_pasien_tgl_lhr, :rs_pasien_kerja, :rs_pasien_alamat, :rs_pasien_telp, :rs_pasien_hub, :rs_pasien_agama, :rs_pasien_waktu, :rs_pasien_ket, :rs_pasien_ibu, :rs_pasien_ayah, :rs_pasien_darah, :rs_pasien_iden, :rs_pasien_rad)";

		$this->db->query($query);
		$this->db->bind('rs_pasien_id_ex', (string) $data['rs_pasien_id_ex']);
		$this->db->bind('rs_pasien_nama', (string) $data['rs_pasien_nama']);
		$this->db->bind('rs_pasien_jenkel', (string) $data['rs_pasien_jenkel']);
		$this->db->bind('rs_pasien_tmpt_lhr', (string) $data['rs_pasien_tmpt_lhr']);
		$this->db->bind('rs_pasien_tgl_lhr', (string) $data['rs_pasien_tgl_lhr']);
		$this->db->bind('rs_pasien_kerja', (string) $data['rs_pasien_kerja']);
		$this->db->bind('rs_pasien_alamat', (string) $data['rs_pasien_alamat']);

		$this->db->bind('rs_pasien_telp', (string) $data['rs_pasien_telp']);
		$this->db->bind('rs_pasien_hub', (string) $data['rs_pasien_hub']);
		$this->db->bind('rs_pasien_agama', (string) $data['rs_pasien_agama']);
		$this->db->bind('rs_pasien_waktu', (string) $data['rs_pasien_waktu']);
		$this->db->bind('rs_pasien_ket', (string) $data['rs_pasien_ket']);
		$this->db->bind('rs_pasien_ibu', (string) $data['rs_pasien_ibu']);
		$this->db->bind('rs_pasien_ayah', (string) $data['rs_pasien_ayah']);
		$this->db->bind('rs_pasien_darah', (string) $data['rs_pasien_darah']);
		$this->db->bind('rs_pasien_iden', (string) $data['rs_pasien_iden']);
		$this->db->bind('rs_pasien_rad', (string) $rs_pasien_rad_name_new);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPasien($data, $queryTambahan, $bindParamKey, $bindParamVal)
	{
		$query = "UPDATE " . $this->table . " SET rs_pasien_nama = :rs_pasien_nama, rs_pasien_jenkel = :rs_pasien_jenkel, rs_pasien_tmpt_lhr = :rs_pasien_tmpt_lhr, rs_pasien_tgl_lhr = :rs_pasien_tgl_lhr, rs_pasien_kerja = :rs_pasien_kerja, rs_pasien_alamat = :rs_pasien_alamat, rs_pasien_telp = :rs_pasien_telp, rs_pasien_hub = :rs_pasien_hub, rs_pasien_agama = :rs_pasien_agama, rs_pasien_waktu = :rs_pasien_waktu, rs_pasien_ket = :rs_pasien_ket, rs_pasien_ibu = :rs_pasien_ibu, rs_pasien_ayah = :rs_pasien_ayah, rs_pasien_darah = :rs_pasien_darah, rs_pasien_iden = :rs_pasien_iden " . $queryTambahan . " WHERE rs_pasien_id_ex = :rs_pasien_id_ex";

		$this->db->query($query);
		$this->db->bind('rs_pasien_id_ex', (string) $data['rs_pasien_id_ex']);
		$this->db->bind('rs_pasien_nama', (string) $data['rs_pasien_nama']);
		$this->db->bind('rs_pasien_jenkel', (string) $data['rs_pasien_jenkel']);
		$this->db->bind('rs_pasien_tmpt_lhr', (string) $data['rs_pasien_tmpt_lhr']);
		$this->db->bind('rs_pasien_tgl_lhr', (string) $data['rs_pasien_tgl_lhr']);
		$this->db->bind('rs_pasien_kerja', (string) $data['rs_pasien_kerja']);
		$this->db->bind('rs_pasien_alamat', (string) $data['rs_pasien_alamat']);

		$this->db->bind('rs_pasien_telp', (string) $data['rs_pasien_telp']);
		$this->db->bind('rs_pasien_hub', (string) $data['rs_pasien_hub']);
		$this->db->bind('rs_pasien_agama', (string) $data['rs_pasien_agama']);
		$this->db->bind('rs_pasien_waktu', (string) $data['rs_pasien_waktu']);
		$this->db->bind('rs_pasien_ket', (string) $data['rs_pasien_ket']);
		$this->db->bind('rs_pasien_ibu', (string) $data['rs_pasien_ibu']);
		$this->db->bind('rs_pasien_ayah', (string) $data['rs_pasien_ayah']);
		$this->db->bind('rs_pasien_darah', (string) $data['rs_pasien_darah']);
		$this->db->bind('rs_pasien_iden', (string) $data['rs_pasien_iden']);
		$length = count($bindParamKey);
		if ($length != 0) {
			for ($i = 0; $i < $length; $i++) {
				$this->db->bind($bindParamKey[$i], $bindParamVal[$i]);
			}
		}


		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getPasienById($rs_pasien_id_ex)
	{
		$query = "SELECT rs_pasien_id_ex, rs_pasien_nama, rs_pasien_jenkel, rs_pasien_tmpt_lhr, rs_pasien_tgl_lhr, rs_pasien_kerja, rs_pasien_alamat, rs_pasien_telp, rs_pasien_hub, rs_pasien_agama, rs_pasien_waktu, rs_pasien_ket, rs_pasien_ibu, rs_pasien_ayah, rs_pasien_darah, rs_pasien_iden, rs_pasien_rad FROM " . $this->table . " WHERE rs_pasien_id_ex = :rs_pasien_id_ex";

		$this->db->query($query);
		$this->db->bind('rs_pasien_id_ex', $rs_pasien_id_ex);


		$this->db->execute();

		return $this->db->single();
	}

	public function deleteDataPasien($rs_pasien_id_ex)
	{
		$query = "DELETE FROM " . $this->table . " WHERE rs_pasien_id_ex = :rs_pasien_id_ex";

		$this->db->query($query);
		$this->db->bind('rs_pasien_id_ex', $rs_pasien_id_ex);

		$this->db->execute();

		return $this->db->rowCount();
	}
}
?>