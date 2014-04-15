<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Events_model extends BF_Model {

	protected $table_name	= "events";
	protected $key			= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";

	protected $log_user 	= FALSE;

	protected $set_created	= false;
	protected $set_modified = false;

	/*
		Customize the operations of the model without recreating the insert, update,
		etc methods by adding the method names to act as callbacks here.
	 */
	protected $before_insert 	= array();
	protected $after_insert 	= array();
	protected $before_update 	= array();
	protected $after_update 	= array();
	protected $before_find 		= array();
	protected $after_find 		= array();
	protected $before_delete 	= array();
	protected $after_delete 	= array();

	/*
		For performance reasons, you may require your model to NOT return the
		id of the last inserted row as it is a bit of a slow method. This is
		primarily helpful when running big loops over data.
	 */
	protected $return_insert_id 	= TRUE;

	// The default type of element data is returned as.
	protected $return_type 			= "object";

	// Items that are always removed from data arrays prior to
	// any inserts or updates.
	protected $protected_attributes = array();

	/*
		You may need to move certain rules (like required) into the
		$insert_validation_rules array and out of the standard validation array.
		That way it is only required during inserts, not updates which may only
		be updating a portion of the data.
	 */
	protected $validation_rules 		= array(
		array(
			"field"		=> "events_fmid",
			"label"		=> "Last.fm ID",
			"rules"		=> "required|max_length[40]"
		),
		array(
			"field"		=> "events_etitle",
			"label"		=> "Title",
			"rules"		=> "required|max_length[200]"
		),
		array(
			"field"		=> "events_ecity",
			"label"		=> "City",
			"rules"		=> "required|max_length[3]"
		),
		array(
			"field"		=> "events_edescription",
			"label"		=> "Event Description",
			"rules"		=> ""
		),
		array(
			"field"		=> "events_eimage",
			"label"		=> "Image Credits URL",
			"rules"		=> "max_length[200]"
		),
		array(
			"field"		=> "events_soundcloud",
			"label"		=> "Soundcloud ID",
			"rules"		=> "max_length[11]"
		),
		array(
			"field"		=> "events_estartdate",
			"label"		=> "Start Date",
			"rules"		=> "max_length[10]"
		),
		array(
			"field"		=> "events_estarthour",
			"label"		=> "Start Hour",
			"rules"		=> "max_length[8]"
		),
		array(
			"field"		=> "events_eenddate",
			"label"		=> "End Date",
			"rules"		=> "max_length[10]"
		),
		array(
			"field"		=> "events_eendhour",
			"label"		=> "End Hour",
			"rules"		=> "max_length[8]"
		),
		array(
			"field"		=> "events_efmurl",
			"label"		=> "Last.fm URL",
			"rules"		=> "max_length[200]"
		),
		array(
			"field"		=> "events_elocation",
			"label"		=> "Event Location",
			"rules"		=> "max_length[100]"
		),
		array(
			"field"		=> "events_eticketurl",
			"label"		=> "Buy Ticket URL",
			"rules"		=> "max_length[200]"
		),
		array(
			"field"		=> "events_deleted",
			"label"		=> "Deleted",
			"rules"		=> "max_length[1]"
		),
	);
	protected $insert_validation_rules 	= array();
	protected $skip_validation 			= FALSE;

	//--------------------------------------------------------------------

}
