<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mypos_gateway extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        if (!is_admin()) {
            access_denied('Custom Js');
        }
        
        $this->load->helper('/mypos_gateway');
    }

    public function index()
    {
        $data['title'] = _l('mypos_gateway');
        $this->load->view('mypos_gateway', $data);
    }

    public function reset()
    {
        update_option('mypos_gateway', 'enable');
        redirect(admin_url('mypos_gateway'));
    }

    public function save()
    {
        hooks()->do_action('before_save_mypos_gateway');
    }
    
    public function enable()
    {
        hooks()->do_action('before_save_mypos_gateway');

        update_option('mypos_gateway', 'enable');
    }
    
    public function disable()
    {
        hooks()->do_action('before_save_mypos_gateway');

        update_option('mypos_gateway', 'disable');
    }
}
