<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * FusionInvoice
 * 
 * A free and open source web based invoicing system
 *
 * @package		FusionInvoice
 * @author		Jesse Terry
 * @copyright	Copyright (c) 2012 - 2013, Jesse Terry
 * @license		http://www.fusioninvoice.com/support/page/license-agreement
 * @link		http://www.fusioninvoice.com
 * 
 */

class Depenses extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('mdl_depenses');
    }

    public function index($page = 0)
    {
        $this->mdl_depenses->paginate(site_url('depenses/index'), $page);
        $depenses = $this->mdl_depenses->result();

        $this->layout->set(
            array(
                'depenses'           => $depenses,
                'filter_display'     => TRUE,
                'filter_placeholder' => lang('filter_depenses'),
                'filter_method'      => 'filter_depenses'
            )
        );

        $this->layout->buffer('content', 'depenses/index');
        $this->layout->render();
    }

    public function form($id = NULL)
    {
        if ($this->input->post('btn_cancel'))
        {
            redirect('depenses');
        }

        if ($this->mdl_depenses->run_validation())
        {
            $id = $this->mdl_depenses->save($id);

            redirect('depenses');
        }

        if (!$this->input->post('btn_submit'))
        {
            $this->mdl_depenses->prep_form($id);

        }

        $this->load->model('depense_methods/mdl_depense_methods');
        $this->load->model('devises/mdl_devises');

        $amounts = array();

        $this->layout->set(
            array(
                'depense_id'      => $id,
                'depense_methods' => $this->mdl_depense_methods->get()->result(),
                'devises'	  => $this->mdl_devises->get()->result(),
                'amounts'         => json_encode($amounts)
            )
        );

        if ($id)
        {
            $this->layout->set('depense', $this->mdl_depenses->where('fi_depenses.depense_id', $id)->get()->row());
        }

        $this->layout->buffer('content', 'depenses/form');
        $this->layout->render();
    }

    public function delete($id)
    {
        $this->mdl_depenses->delete($id);
        redirect('depenses');
    }

}

?>
