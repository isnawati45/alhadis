<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read_m extends CI_Model {
    
    //READ
    function get_hadis($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_hadis');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_hadis.id_kategori');
        $this->db->join('tb_sumber', 'tb_sumber.id_sumber = tb_hadis.id_sumber');
        $this->db->join('tb_ulamatakrij', 'tb_ulamatakrij.id_ulamatakrij = tb_hadis.id_ulamatakrij');
        $this->db->join('tb_derajat', 'tb_derajat.id_derajat = tb_hadis.id_derajat');

        $this->db->join('syarah_hadis', 'tb_hadis.id=syarah_hadis.id_matan');    
        $this->db->join('tb_syarah', 'syarah_hadis.id_isi_syarah=tb_syarah.id_syarah');       
        $this->db->join('tb_ulamasyarah', 'tb_ulamasyarah.id_ulamasyarah = tb_syarah.id_ulamasyarah');


        if($id != null){
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    public function get_name_s1($id = null){
        $this->db->select('*');
        $this->db->from('sanad_hadis');
        $this->db->join('tb_sanad', 'sanad_hadis.s1=tb_sanad.id_sanad');
        if($id != null){
            $this->db->where('id_matan', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_name_s2($id = null){
        $this->db->select('*');
        $this->db->from('sanad_hadis');
        $this->db->join('tb_sanad', 'sanad_hadis.s2=tb_sanad.id_sanad');
        if($id != null){
            $this->db->where('id_matan', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_name_s3($id = null){
        $this->db->select('*');
        $this->db->from('sanad_hadis');
        $this->db->join('tb_sanad', 'sanad_hadis.s3=tb_sanad.id_sanad');
        if($id != null){
            $this->db->where('id_matan', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_name_s4($id = null){
        $this->db->select('*');
        $this->db->from('sanad_hadis');
        $this->db->join('tb_sanad', 'sanad_hadis.s4=tb_sanad.id_sanad');
        if($id != null){
            $this->db->where('id_matan', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_name_s5($id = null){
        $this->db->select('*');
        $this->db->from('sanad_hadis');
        $this->db->join('tb_sanad', 'sanad_hadis.s5=tb_sanad.id_sanad');
        if($id != null){
            $this->db->where('id_matan', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    //GET DATA HADIS BY ID
    function get_detail_hadis($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_hadis');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_hadis.id_kategori');
        $this->db->join('tb_sumber', 'tb_sumber.id_sumber = tb_hadis.id_sumber');
        $this->db->join('tb_ulamatakrij', 'tb_ulamatakrij.id_ulamatakrij = tb_hadis.id_ulamatakrij');
        $this->db->join('tb_derajat', 'tb_derajat.id_derajat = tb_hadis.id_derajat');
        // $this->db->join('tb_sanad', 'tb_sanad.id_sanad = tb_hadis.id_sanad');

        $this->db->join('syarah_hadis', 'tb_hadis.id=syarah_hadis.id_matan');    
        $this->db->join('tb_syarah', 'syarah_hadis.id_isi_syarah=tb_syarah.id_syarah');       
        $this->db->join('tb_ulamasyarah', 'tb_ulamasyarah.id_ulamasyarah = tb_syarah.id_ulamasyarah');
        
        $this->db->join('perawi_hadis', 'tb_hadis.id=perawi_hadis.id_matan');
        $this->db->join('tb_perawi', 'id_nama_perawi=id_perawi');

        // $this->db->join('sanad_hadis', 'tb_hadis.id=sanad_hadis.id_matan');    
        // $this->db->join('tb_sanad', 'sanad_hadis.s1=tb_sanad.id_sanad');

        if($id != null){
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    //TAMPIL DATA ARRAY PERAWI
    public function get_data_perawi()
    {
        
    }


}