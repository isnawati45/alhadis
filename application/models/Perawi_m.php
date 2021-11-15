<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawi_m extends CI_Model {

  public function get_perawi()
  {
    $query = $this->db->get('tb_perawi');
    return $query;
  }

  public function get_perawi_byId($id_perawi)
  {
    return $this->db->get_where('tb_perawi', ['id_perawi' => $id_perawi])->row_array();
  }

  public function get_ubah_perawi($data)
  {
    $this->db->where('id_perawi', $data['id_perawi']);
    $this->db->update('tb_perawi', $data);
  }

  public function delete($id)
	{
      $this->db->where('id_perawi', $id);
      $this->db->delete('tb_perawi');
  }
}