<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    var $itemsPage= 10;
    var $tablewidth= "96%";
    var $fields= array(    'id' => 'Id',
    'etitle' => 'Event:',
    'estartdate' => 'Am',
    'estarthour' => 'Um',
    'soundcloud' => 'Soundcloud');

    function __construct()    {
        parent::__construct();
    }

	public function index($offset=0) 	{
        $itemsPage=$this->itemsPage;
        $this->load->model('event_model', '', TRUE);

        $total_rows=$this->event_model->getCityCount(1);
        $list=$this->event_model->getCity(1,$itemsPage,$offset);


        $config['table'] = array(
            'attr'          => array('width' => $this->tablewidth),
            'total_rows'    => $total_rows,
            'query'         => $list,
            'fields'        => $this->fields,
            'per_page'      => $itemsPage,
            'numbering'     => array('active' => false),
            'multi_select'  => array('active' => false),
            'hidden_fields' => array('id')
        );

        $this->load->library("listview", $config);
        $template['list']= $this->listview->render();


        $template['city'] = "Berlin";
		$this->load->view('home',$template);
	}
    public function hamburg($offset=0) 	{
        $itemsPage=$this->itemsPage;
        $this->load->model('event_model', '', TRUE);

        $total_rows=$this->event_model->getCityCount(2);
        $list=$this->event_model->getCity(2,$itemsPage,$offset);


        $config['table'] = array(
            'attr'          => array('width' => $this->tablewidth),
            'total_rows'    =>  $total_rows,
            'query'         => $list,
            'fields'        => $this->fields,
            'per_page'      => $itemsPage,
            'numbering'     => array('active' => false),
            'multi_select'  => array('active' => false),
            'hidden_fields' => array('id')
        );

        $this->load->library("listview", $config);
        $template['list']= $this->listview->render();


        $template['city'] = "Hamburg";
        $this->load->view('home',$template);
    }
    public function munich($offset=0) 	{
        $itemsPage=$this->itemsPage;
        $this->load->model('event_model', '', TRUE);

        $total_rows=$this->event_model->getCityCount(3);
        $list=$this->event_model->getCity(3,$itemsPage,$offset);


        $config['table'] = array(
            'attr'          => array('width' => $this->tablewidth),
            'total_rows'    => $total_rows,
            'query'         => $list,
            'fields'        => $this->fields,
            'per_page'      => $itemsPage,
            'numbering'     => array('active' => false),
            'multi_select'  => array('active' => false),
            'hidden_fields' => array('id')
        );

        $this->load->library("listview", $config);
        $template['list']= $this->listview->render();


        $template['city'] = "Münich";
        $this->load->view('home',$template);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */