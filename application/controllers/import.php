<?php
class Import extends CI_Controller {

 function last($city) 	{

     $userArr= array(
         1=>'movil',
         2=>'movilhamburg',
         3=>'movilmunchen'
     );

     $this->load->model('event_model', '', TRUE);
     $cityid = $this->event_model->lookupCity($city);

     $feedbase="http://ws.audioscrobbler.com/1.0/user/@lastfmuser/eventsysrecs.rss";
     $feedurl = str_replace('@lastfmuser', $userArr[$cityid] ,$feedbase);

     $this->load->spark('ci-simplepie/1.0.1/');

     $today= date('Y-m-d');
     $feed = $this->cisimplepie;
     $feed->set_feed_url($feedurl);
// Initialize the whole SimplePie object.  Read the feed, process it, parse it, cache it
     $success = $feed->init();
// This function will grab the proper character encoding, as well as set the content type to text/html.
     $feed->handle_content_type();
     // Check to see if there are more than zero errors (i.e. if there are any errors at all)
     if ($feed->error())
     {
         // If so, start a <div> element with a classname so we can style it.
         echo '<div class="sp_errors">' . "\r\n";
         echo '<p>' . htmlspecialchars($feed->error()) . "</p>\r\n";

         echo '</div>' . "\r\n";
     }

     if ($success) {

         $echo='<pre>';


         foreach($feed->get_items() as $item) {

             $postdate= $item->get_date('Y-m-d');

             // if ($startdate< $today) Then do not add to array

             $f['efmurl']=$item->get_permalink();
             $f['etitle']=$item->get_title();

             $f['edescription']=$item->get_content();

             // GET Location
             $f['elocation']='';

             @preg_match("/^Location?: +[0-9\-\pL]+[\s]/",$f['edescription'] ,$matches);
//            print_r($matches);

             if (isset ($matches[0]) ) {
                 $getlocation=  explode("Location:", $matches[0]);
                 $f['elocation']=$getlocation[1];
             } else {
                 $f['elocation']='NOT found';
             }

             // GET ID of Last
             $path = parse_url($f['efmurl'], PHP_URL_PATH);
             $pathFragments = explode('/', $path);
             $endid = end($pathFragments);

             if(preg_match("/(\d+)+/",$endid ,$matches)) {
                 $f['efmid']=$matches[1];
             } else  {
                 //Your URL didn't match
                 $f['efmid']=$endid;
             }
             // STARTS extract and convert the xCal:dtstart variable
             $when = $item->get_item_tags('urn:ietf:params:xml:ns:xcal', 'dtstart');
             $sdate = explode("T",$when[0]['data']);
             $f['estartdate'] = $sdate[0];
             $f['estarthour'] = substr( $sdate[1],0,-1);

             // End
             $when = $item->get_item_tags('urn:ietf:params:xml:ns:xcal', 'dtend');
             $enddate = explode("T",$when[0]['data']);
             $f['eenddate'] = $enddate[0];
             $f['eendhour'] = substr( $enddate[1],0,-1);


            //  Insert event in DB
           if (! $this->event_model->lookupLast($f['efmid'])  ) {

                   $data = array('fmid' =>$f['efmid'],
                       'etitle'        =>$f['etitle'],
                       'ecity'         =>$cityid,
                       'edescription'  =>$f['edescription'],
                       'estartdate'    =>$f['estartdate'],
                       'estarthour'    =>$f['estarthour'],
                       'eenddate'      =>$f['eenddate'],
                       'eendhour'      =>$f['eendhour'],
                       'efmurl'        =>$f['efmurl'],
                       'elocation'     =>$f['elocation']
                   );
               $this->event_model->insert($data);

               $echo.=print_r( $f ,true);

           } else {
               $echo.='<br><b>Exists</b>&gt; ';
               $echo.=print_r( $f['etitle'] ,true);
           }

         }

         echo $echo;
     }
 }

}