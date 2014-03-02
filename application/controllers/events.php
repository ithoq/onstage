<?php
class Events extends CI_Controller {

 function lookup($city,$id) 	{
     $this->load->model('event_model', '', TRUE);
     $cityid= $this->event_model->lookupCity($city);

     $data=$this->event_model->lookupEvent($id);

     if (isset($data)) {
     $template['city']          = $city;
     $template['title']         = $data->etitle;
     $template['description']   = $data->edescription;
     $template['location']      = $data->elocation.', '. ucfirst($city);
     $template['startdate']     = $data->estartdate;
     $template['starthour']     = substr($data->estarthour,0,5);
     $template['endhour']       = substr($data->eendhour,0,5);
    // Build calendar timestamps to add event in google calendar->from db was like  '%Y%m%d T %H%i%s
     $template['calstart']  = str_replace('-','',$data->estartdate).'T'.str_replace(':','',$data->estarthour);
     $template['calend']    = str_replace('-','',$data->eenddate).'T'.str_replace(':','',$data->eendhour);


     $template['eticketurl']    = $data->eticketurl;
         $template['source']     = ($data->efmurl=='')?'':"<a href=\"{$data->efmurl}\">Event source</a>";
         //Check for event image
         $imagepath= "/public/img/event/{$id}.jpg";
         // echo $_SERVER['DOCUMENT_ROOT'].$imagepath;
        if ( file_exists($_SERVER['DOCUMENT_ROOT'].$imagepath) ) {
            $template['image']      = $imagepath;
            $template['imagestyle'] = " style=\"background-image: url('{$imagepath}')\" ";
        } else {
            $template['image']      = NULL;
            $template['imagestyle'] = NULL;
        }

	    $this->load->view('event',$template);
     } else {

         echo "Event #$id not found.";

     }
}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */