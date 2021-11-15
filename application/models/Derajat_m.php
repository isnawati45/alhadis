<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Derajat_m extends CI_Model {

  public function get_derajat()
  {
    $query = $this->db->get('tb_derajat');
    return $query;
  }

  public function get_derajat_byId($id_derajat)
  {
    return $this->db->get_where('tb_derajat', ['id_derajat' => $id_derajat])->row_array();
  }

  public function get_ubah_derajat($data)
  {
    $this->db->where('id_derajat', $data['id_derajat']);
    $this->db->update('tb_derajat', $data);
  }

  public function delete($id)
	{
      $this->db->where('id_derajat', $id);
      $this->db->delete('tb_derajat');
  }
}