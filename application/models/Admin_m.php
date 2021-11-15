<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {

    public function login($post){
        $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('tb_admin');
        if($id != null){
            $this->db->where('id_admin', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['name'] = $post['name'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['address'] != "" ? $post['address'] : null;
        $params['level'] = $post['level'];
        $this->db->insert('tb_admin', $params);

    }

    public function delete($id)
	{
        $this->db->where('id_admin', $id);
        $this->db->delete('tb_admin');
    }

    public function edit($post)
    {
        $params['name'] = $post['name'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])){
            $params['password'] = sha1($post['password']);
        }
        $params['address'] = $post['address'] != "" ? $post['address'] : null;
        $params['level'] = $post['level'];
        $this->db->where('id_admin', $post['id_admin']);
        $this->db->update('tb_admin', $params);

    }
}
