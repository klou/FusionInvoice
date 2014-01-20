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

class Ajax extends Admin_Controller {
	
	public $ajax_controller = TRUE;

	public function add()
	{
		$this->load->model('depenses/mdl_depenses');
		
		if ($this->mdl_depenses->run_validation())
		{
			$this->mdl_depenses->save();

			$response = array(
				'success' => 1
			);
		}
		else
		{
			$this->load->helper('json_error');
			$response = array(
				'success' => 0,
				'validation_errors' => json_errors()
			);
		}

		echo json_encode($response);
	}

}

?>