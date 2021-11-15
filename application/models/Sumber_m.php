<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sumber_m extends CI_Model {

  public function get_sumber()
  {
    $query = $this->db->get('tb_sumber');
    return $query;
  }

  public function get_sumber_byId($id_sumber)
  {
    return $this->db->get_where('tb_sumber', ['id_sumber' => $id_sumber])->row_array();
  }

  public function get_ubah_sumber($data)
  {
    $this->db->where('id_sumber', $data['id_sumber']);
    $this->db->update('tb_sumber', $data);
  }

  public function delete($id)
	{
      $this->db->where('id_sumber', $id);
      $this->db->delete('tb_sumber');
  }
}