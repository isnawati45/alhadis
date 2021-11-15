<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_m extends CI_Model {

  public function get_kategori()
  {
    $query = $this->db->get('tb_kategori');
    return $query;
  }

  public function get_kategori_byId($id_kategori)
  {
    return $this->db->get_where('tb_kategori', ['id_kategori' => $id_kategori])->row_array();
  }

  public function get_ubah_kategori($data)
  {
    $this->db->where('id_kategori', $data['id_kategori']);
    $this->db->update('tb_kategori', $data);
  }

  public function delete($id)
	{
      $this->db->where('id_kategori', $id);
      $this->db->delete('tb_kategori');
  }
}