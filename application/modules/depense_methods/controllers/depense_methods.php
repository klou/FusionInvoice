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

class Depense_Methods extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('mdl_depense_methods');
	}
	
	public function index($page = 0)
	{
        $this->mdl_depense_methods->paginate(site_url('depense_methods/index'), $page);
        $depense_methods = $this->mdl_depense_methods->result();
        
		$this->layout->set('depense_methods', $depense_methods);
		$this->layout->buffer('content', 'depense_methods/index');
		$this->layout->render();
	}
	
	public function form($id = NULL)
	{
		if ($this->input->post('btn_cancel'))
		{
			redirect('depense_methods');
		}
		
		if ($this->mdl_depense_methods->run_validation())
		{
			$this->mdl_depense_methods->save($id);
			redirect('depense_methods');
		}
		
		if ($id and !$this->input->post('btn_submit'))
		{
			$this->mdl_depense_methods->prep_form($id);
		}
		
		$this->layout->buffer('content', 'depense_methods/form');
		$this->layout->render();
	}
	
	public function delete($id)
	{
		$this->mdl_depense_methods->delete($id);
		redirect('depense_methods');
	}

}

?>
