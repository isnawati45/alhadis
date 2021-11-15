<?php

Class Page {

    var $page_data = array();

    function set($name, $value)
    {
        $this->page_data[$name] = $value;
    }

    function load($page = '', $view = '', $view_data = array(), $return = FALSE)
    {
        $this->CI =& get_instance();
        $this->set('halaman', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($page, $this->page_data, $return);
    }
}