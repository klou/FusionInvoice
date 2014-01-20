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

class devises extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('mdl_devises');
	}
	
	public function index($page = 0)
	{
        	$this->mdl_devises->paginate(site_url('devises/index'), $page);
       		$devises = $this->mdl_devises->result();
        
		$this->layout->set('devises', $devises);
		$this->layout->buffer('content', 'devises/index');
		$this->layout->render();
	}
	
	public function form($id = NULL)
	{
		if ($this->input->post('btn_cancel'))
		{
			redirect('devises');
		}
		
		if ($this->mdl_devises->run_validation())
		{
			$this->mdl_devises->save($id);
			redirect('devises');
		}
		
		if ($id and !$this->input->post('btn_submit'))
		{
			$this->mdl_devises->prep_form($id);
		}
		
		$this->layout->buffer('content', 'devises/form');
		$this->layout->render();
	}
	
	public function delete($id)
	{
		$this->mdl_devises->delete($id);
		redirect('devises');
	}

}

?>
