<?php
/**
 * User: martin
 * www.fasani.de
 */

class event_model extends CI_Model {

    var $citiArr= array(
      1=>'berlin',
        2=>'hamburg',
        3=>'munich'
    );

    function __construct()    {
        parent::__construct();
        //Here must autoload cities array (now in var)
    }

    function lookupCity($city) {
        if (in_array($city,$this->citiArr) ) {
            $this->city=array_search($city,$this->citiArr);
            return $this->city;
        }
    }

    function lookupEvent($id) {
        $lookup= array('ecity' => $this->city, 'id'=>$id);
        $this->db->where($lookup);
        $this->db->from('event');
       $get= $this->db->get();

        if ( $get->num_rows() ) {
       $data= $get->result();
        return $data[0];
        } else {
            return NULL;
        }
    }


    function getCityCount($city=1) {
        $lookup= array('ecity' => $city, 'estartdate >='=> date('Y-m-d'));
        $this->db->where($lookup);
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
        $this->db->select( array('id','etitle','estartdate','estarthour','soundcloud') );
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
            $row['soundcloud']= isset($row['soundcloud']) ? $this->getSoundcloud($row['soundcloud']) :'';
            $row['estartdate']= isset($row['estartdate']) ? date('d/m/Y',strtotime($row['estartdate'])):'';
            $row['estarthour']= isset($row['estarthour']) ? substr($row['estarthour'],0,5):'';
            $rows[] = $row;
        }
        $data->result_array=$rows;
        return $data;
    }

    private function getSoundcloud($id) {
    $widgetparams="&color=ff6600&auto_play=false";
        $player= <<<HTML
<object height="18" width="100%">
    <param name="movie" value="https://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F{$id}&player_type=tiny{$widgetparams}"></param>
    <param name="allowscriptaccess" value="always"></param>
    <param name="wmode" value="transparent"></param>
    <embed wmode="transparent" allowscriptaccess="always" height="18" width="100%" src="https://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F{$id}&player_type=tiny{$widgetparams}"></embed>
</object>
HTML;
        return $player;
    }
}