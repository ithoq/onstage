<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    var $itemsPage= 10;
    var $tablewidth= "80%";
    function __construct()    {
        parent::__construct();
      //  $this->db->simple_query('SET NAMES \'utf-8\'');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($offset=0) 	{
        $itemsPage=$this->itemsPage;
        $this->load->model('event_model', '', TRUE);

        $total_rows=$this->event_model->getCityCount(1);
        $list=$this->event_model->getCity(1,$itemsPage,$offset);


        $config['table'] = array(
            'attr'          => array('width' => $this->tablewidth),
            'total_rows'    =>  $total_rows,
            'query'         =>  $list,
            'per_page'      =>  $itemsPage,
            'numbering'     => array('active' => false),
            'multi_select'  => array('active' => false),
            'hidden_fields' => array('id')
        );

        $this->load->library("listview", $config);
        $template['list']= $this->listview->render();


        $template['render'] = "ok";
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
            'query'         =>  $list,
            'per_page'      =>  $itemsPage,
            'numbering'     => array('active' => false),
            'multi_select'  => array('active' => false),
            'hidden_fields' => array('id')
        );

        $this->load->library("listview", $config);
        $template['list']= $this->listview->render();


        $template['render'] = "ok";
        $this->load->view('home',$template);
    }
    public function munich($offset=0) 	{
        $itemsPage=$this->itemsPage;
        $this->load->model('event_model', '', TRUE);

        $total_rows=$this->event_model->getCityCount(3);
        $list=$this->event_model->getCity(3,$itemsPage,$offset);


        $config['table'] = array(
            'attr'          => array('width' => $this->tablewidth),
            'total_rows'    =>  $total_rows,
            'query'         =>  $list,
            'per_page'      =>  $itemsPage,
            'numbering'     => array('active' => false),
            'multi_select'  => array('active' => false),
            'hidden_fields' => array('id')
        );

        $this->load->library("listview", $config);
        $template['list']= $this->listview->render();


        $template['render'] = "ok";
        $this->load->view('home',$template);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */