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

class Mdl_devises extends Response_Model {
	
	public $table = 'fi_devises';
	public $primary_key = 'fi_devises.iddevise';
    
    public function default_select()
    {
        $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
	$this->db->order_by('fi_devises.taux');
    }
	
	public function order_by()
	{
		//$this->db->order_by('fi_devises.taux');
	}
	
	public function validation_rules()
	{
		return array(
			'nomdfr' => array(
				'field' => 'nomdfr',
				'label' => 'Devise',
				'rules' => 'required'
			),
			'taux' => array(
				'field' => 'taux',
				'label' => 'Taux',
				'rules' => 'required'
			)
		);
	}
	
}

?>
