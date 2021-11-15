<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulamatakrij_m extends CI_Model {

  public function get_ulamatakrij()
  {
    $query = $this->db->get('tb_ulamatakrij');
    return $query;
  }

  public function get_ulamatakrij_byId($id_ulamatakrij)
  {
    return $this->db->get_where('tb_ulamatakrij', ['id_ulamatakrij' => $id_ulamatakrij])->row_array();
  }

  public function get_ubah_ulamatakrij($data)
  {
    $this->db->where('id_ulamatakrij', $data['id_ulamatakrij']);
    $this->db->update('tb_ulamatakrij', $data);
  }

  public function delete($id)
	{
      $this->db->where('id_ulamatakrij', $id);
      $this->db->delete('tb_ulamatakrij');
  }
}