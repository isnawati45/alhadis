<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanad_m extends CI_Model {

  public function get_sanad()
  {
    $query = $this->db->get('tb_sanad');
    return $query;
  }

  public function get_sanad_byId($id_sanad)
  {
    return $this->db->get_where('tb_sanad', ['id_sanad' => $id_sanad])->row_array();
  }

  public function get_ubah_sanad($data)
  {
    $this->db->where('id_sanad', $data['id_sanad']);
    $this->db->update('tb_sanad', $data);
  }

  public function delete($id)
	{
      $this->db->where('id_sanad', $id);
      $this->db->delete('tb_sanad');
  }
}