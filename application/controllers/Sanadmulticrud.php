<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanad extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Sanad_m');
    }

    function index()
    {
        $q["data"] = $this->Sanad_m->get_list()->result();
        $q["data_cout"] = $this->Sanad_m->get_list()->num_rows();        
        $q["title"] = 'Data Sanad';        
        $this->template->load('template', 'datas/sanad/tampil', $q);
    }

    function tambah()
    {
        $get = $this->input->get();
        $q['total_form'] = $get['total_form'];
        $this->template->load('template', 'datas/sanad/tambah', $q);
    }

    function tambah_proses()
    {
        $post = $this->input->post();
        $result = array();
        $total_post = count($post['nama_sanad']);

        foreach($post['nama_sanad'] AS $key => $val)
        {
            $result[] = array(
                'nama_sanad'  => $post['nama_sanad'][$key],
                'kuniyah'  => $post['kuniyah'][$key],
                'kalangan'  => $post['kalangan'][$key],
                'negeri'  => $post['negeri'][$key],
                'wafat'  => $post['wafat'][$key],
                'keterangan'  => $post['keterangan'][$key]
            );
        }
        $this->Sanad_m->post_add($result);
        
        $this->session->set_flashdata('notif', '<p style="color:green;font-weight:bold;">'.$total_post.' data berhasil disimpan!</p>');
        redirect('sanad');
    }

    function sunting_hapus()
    {
        $post = $this->input->post();
        $check = $post['check'];

        if(isset($check))
        {
            if(isset($post['sunting']))
            {
                $q['data'] = $this->Sanad_m->get_edit($post)->result();
                $q['data_count'] = $this->Sanad_m->get_edit($post)->num_rows();

                $this->template->load('template', 'datas/sanad/sunting', $q);
            }
            elseif(isset($post['hapus']))
            {
                $this->Sanad_m->post_delete($post);

                $this->session->set_flashdata('notif', '<p style="color:green;font-weight:bold;">'.count($check).' data berhasil dihapus!</p>');
                redirect('sanad');
            }
        }
        else
        {
            $this->session->set_flashdata('notif', '<p style="color:red;font-weight:bold;">Harap centang dulu datanya!</p>');
            redirect('sanad');
        }
    }

    function sunting_proses()
    {
        $post = $this->input->post();
        $result = array();
        $total_post = count($post['id_sanad']);

        foreach($post['id_sanad'] AS $key => $val)
        {
            $result[] = array(
                'id' => $post['id_sanad'][$key],
                'nama_sanad'  => $post['nama_sanad'][$key],
                'kuniyah'  => $post['kuniyah'][$key],
                'kalangan'  => $post['kalangan'][$key],
                'negeri'  => $post['negeri'][$key],
                'wafat'  => $post['wafat'][$key],
                'keterangan'  => $post['keterangan'][$key]
            );
        }
        $this->Sanad_m->post_edit($result);
        
        $this->session->set_flashdata('notif', '<p style="color:green;font-weight:bold;">'.$total_post.' data berhasil di sunting!</p>');
        redirect('sanad');
    }
}