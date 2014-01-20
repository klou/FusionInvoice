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

class Mdl_Depense_Methods extends Response_Model {
	
	public $table = 'fi_depense_methods';
	public $primary_key = 'fi_depense_methods.depense_method_id';
    
    public function default_select()
    {
        $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
    }
	
	public function order_by()
	{
		$this->db->order_by('fi_depense_methods.depense_method_name');
	}
	
	public function validation_rules()
	{
		return array(
			'depense_method_name' => array(
				'field' => 'depense_method_name',
				'label' => lang('depense_method'),
				'rules' => 'required'
			)
		);
	}
	
}

?>
