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

class Mdl_Depenses extends Response_Model {

    public $table            = 'fi_depenses';
    public $primary_key      = 'fi_depenses.depense_id';
    public $validation_rules = 'validation_rules';

    public function create_picture($serie1, $serie2, $name, $total){

 		// Dataset definition   
 		$DataSet = new pData;  
 		$DataSet->AddPoint($serie1,"Serie1");  
 		$DataSet->AddPoint($serie2,"Serie2");  
 		$DataSet->AddAllSeries();  
 		$DataSet->SetAbsciseLabelSerie("Serie2");  
		$DataSet->SetXAxisName("Month of the year");


 		// Initialise the graph  
 		$Test = new pChart(550,244);  
 		$Test->drawFilledRoundedRectangle(7,7,540,240,5,240,240,240);  
 		$Test->drawRoundedRectangle(5,5,542,242,5,230,230,230);  
  
 		// Draw the pie chart  
 		$Test->setFontProperties("Fonts/tahoma.ttf",9);  
		$Test->setShadowProperties(2,2,200,200,200);  
		$Test->drawFlatPieGraphWithShadow($DataSet->GetData(),$DataSet->GetDataDescription(),170,120,100,PIE_PERCENTAGE,10,0);  
 		$Test->drawPieLegend(320,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);  


		// Draw the title  
 		$Test->setFontProperties("Fonts/tahoma.ttf",10);  
	        $Title = "Total: $total $";  
 		$Test->drawTextBox(350,220,480,240,$Title,0,0,0,0,ALIGN_CENTER,FALSE,0,0,0,30);  

		$Test->Render("$name"); 
    }


    public function default_select()
    {
        $this->db->select("
            SQL_CALC_FOUND_ROWS
            fi_depense_methods.*,
            fi_depenses.*, fi_devises.*", FALSE);
    }

    public function default_order_by()
    {
        $this->db->order_by('fi_depenses.depense_date DESC');
    }

    public function default_join()
    {
        $this->db->join('fi_depense_methods', 'fi_depense_methods.depense_method_id = fi_depenses.depense_method_id', 'left');
        $this->db->join('fi_devises', 'fi_depenses.iddevise=fi_devises.iddevise', 'left');
    }

    public function validation_rules()
    {
        return array(
            'depense_date'      => array(
                'field' => 'depense_date',
                'label' => lang('date'),
                'rules' => 'required'
            ),
            'depense_amount'    => array(
                'field' => 'depense_amount',
                'label' => lang('depense'),
                'rules' => 'required|callback_validate_depense_amount'
            ),
            'depense_method_id' => array(
                'field' => 'depense_method_id',
                'label' => lang('depense_method')
            ),
            'iddevise' => array(
                'field' => 'iddevise',
                'label' => 'Devise'
            ),
            'depense_note'      => array(
                'field' => 'depense_note',
                'label' => lang('note')
            )
        );
    }

    public function validate_depense_amount($amount)
    {
        $depense_id = $this->input->post('depense_id');

        if ($depense_id)
        {
            $depense = $this->db->where('depense_id', $depense_id)->get('fi_depenses')->row();
        }

        return TRUE;
    }


    //Génere les images du Dashboard
    public function generate_image(){
	//On génere l'image
	$methods = mysql_query("select * from fi_depense_methods");
	$s1 = array();
	$s2 = array();
	
	$o1 = array();
	$o2 = array();

	$to = 0;
	$too = 0;

	$month = date("m");
	$lmonth = date("Y");

	while( $res = mysql_fetch_assoc($methods)){
		$ot = mysql_fetch_assoc(mysql_query("SELECT SUM(depense_CAD) as total from fi_depenses where depense_method_id=$res[depense_method_id] AND YEAR(depense_date)=$lmonth"));
		if($ot['total'] > 0){
			$o1[] = "$res[depense_method_name]: $ot[total]$";
			$o2[] = $ot['total'];
			$too = $too + $ot['total'];
		}
	}
	
	//$this->create_picture($s2, $s1, "current.png", "$to");
	$this->create_picture($o2, $o1, "last.png", "$too");
    }

    public function save($id = NULL, $db_array = NULL)
    {
        $db_array = ($db_array) ? $db_array : $this->db_array();

	$iddevise = $db_array['iddevise'];
	$tauxdb = mysql_fetch_assoc(mysql_query("select * from fi_devises WHERE iddevise=$iddevise"));

	$db_array['depense_CAD'] = round($db_array['depense_amount'] * $tauxdb['taux'], 2);

        // Save the depense
        $id = parent::save($id, $db_array);

	$this->generate_image();
        return $id;
    }

    public function delete($id = NULL)
    {
        // Get the invoice id before deleting depense
        $this->db->where('depense_id', $id);
        $invoice_id = $this->db->get('fi_depenses')->row()->invoice_id;

        // Delete the depense
        parent::delete($id);

        $this->load->helper('orphan');
        delete_orphans();

	$this->generate_image();
    }

    public function db_array()
    {
        $db_array = parent::db_array();
        
        $db_array['depense_date'] = date_to_mysql($db_array['depense_date']);
        $db_array['depense_amount'] = standardize_amount($db_array['depense_amount']);

        return $db_array;
    }

    public function prep_form($id = NULL)
    {
        parent::prep_form($id);

        if (!$id)
        {
            parent::set_form_value('depense_date', date('Y-m-d'));
        }
    }

}

?>
