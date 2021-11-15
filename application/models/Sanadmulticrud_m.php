<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanad_m extends CI_Model 
{

    function get_list()
    {
        $this->db->select("*");
        $this->db->from('tb_sanad');
        $this->db->order_by('id_sanad');
        $q = $this->db->get();

        return $q;
    }

    function get_edit($post)
    {
        $this->db->select("*");
        $this->db->from('tb_sanad');
        $this->db->where_in('id_sanad', $post['check']);
        $this->db->order_by('id_sanad');
        $q = $this->db->get();

        return $q;
    }

    function post_add($result = array())
    {
        $total_array = count($result);

        if($total_array != 0)
        {
            $this->db->insert_batch('tb_sanad', $result);
        }
    }

    function post_edit($result = array())
    {
        $total_array = count($result);

        if($total_array != 0)
        {
            $this->db->update_batch('tb_sanad', $result, 'id_sanad');
        }
    }

    function post_delete($post = array())
    {
        $total_array = count($post);

        if($total_array != 0)
        {
            $this->db->where_in('id_sanad', $post['check']);
            $this->db->delete('tb_sanad');
        }
    }
}