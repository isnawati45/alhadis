<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulamasyarah_m extends CI_Model {

  public function get_ulamasyarah()
  {
    $query = $this->db->get('tb_ulamasyarah');
    return $query;
  }

  public function get_ulamasyarah_byId($id_ulamasyarah)
  {
    return $this->db->get_where('tb_ulamasyarah', ['id_ulamasyarah' => $id_ulamasyarah])->row_array();
  }

  public function get_ubah_ulamasyarah($data)
  {
    $this->db->where('id_ulamasyarah', $data['id_ulamasyarah']);
    $this->db->update('tb_ulamasyarah', $data);
  }

  public function delete($id)
	{
      $this->db->where('id_ulamasyarah', $id);
      $this->db->delete('tb_ulamasyarah');
  }
}