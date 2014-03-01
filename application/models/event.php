<?php
/**
 * User: martin
 * www.fasani.de
 */

class event extends CI_Model {

    var $citiArr= array(
      1=>'berlin',
        2=>'hamburg',
        3=>'munich'
    );
    function __construct()    {
        parent::__construct();
        //Here must autoload cities array (now in var)
    }
    function eventCount($city=1) {
        $this->db->where('ecity', $city);
        $this->db->from('event');

        return $this->db->count_all_results();
    }

    function getCity($city=1,$limit=0,$offset=0) {
       // Create list
        if ( $this->input->post('keywords') ) {
            $this->db->like('etitle',$this->input->post('keywords') );
            $lookup= array('ecity' => $city);
        } else {
            // Lookup city & startdate major than today
            $lookup= array('ecity' => $city, 'estartdate >='=> date('Y-m-d'));
        }
        $this->db->limit($limit, (int) $offset);

        // Define fields
        $this->db->select( array('id','etitle','estartdate','estarthour') );
        $this->db->order_by('estartdate asc, estarthour desc');

        $data= $this->db->get_where('event',$lookup  );

        /* Do some data transformation before returning the rows */
        $rows = array();
        $ci = get_instance();
        $ci->load->helper('url');

        foreach($data->result_array() as $row)
        {

            $link= site_url( array('event', $this->citiArr[$city], $row['id'] ) );
            $row['etitle'] = "<a href=\"{$link}\">{$row['etitle']}</a>";
            $rows[] = $row;
        }
        $data->result_array=$rows;
        return $data;
    }
}