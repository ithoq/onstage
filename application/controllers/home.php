<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $itemsPage=5;
        $this->load->model('event', '', TRUE);
        $total_rows=$this->event->eventCount(1);
        $list=$this->event->getCity(1,$itemsPage,$offset);


        $config['table'] = array(
            'attr'          => array('width' => '500'),
            'total_rows'    =>  $total_rows,
            'query'         =>  $list,
            'per_page'      =>  $itemsPage,
            'numbering'     => array('active' => false),
            'multi_select'  => array('active' => false)
        );

        $this->load->library("listview", $config);
        $template['list']= $this->listview->render();


        $template['render'] = "ok";
		$this->load->view('home',$template);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */