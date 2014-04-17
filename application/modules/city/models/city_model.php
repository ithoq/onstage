<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class City_model extends BF_Model {

	protected $table_name	= "city";
	protected $key			= "cid";
	protected $soft_deletes	= false;
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
			"field"		=> "city_city",
			"label"		=> "City",
			"rules"		=> "required|max_length[60]"
		),
		array(
			"field"		=> "city_name",
			"label"		=> "Name",
			"rules"		=> "max_length[50]"
		),
		array(
			"field"		=> "city_country",
			"label"		=> "Country",
			"rules"		=> "max_length[60]"
		),
		array(
			"field"		=> "city_fmuser",
			"label"		=> "Fmuser",
			"rules"		=> "max_length[50]"
		),
		array(
			"field"		=> "city_fmpass",
			"label"		=> "Fmpass",
			"rules"		=> "max_length[50]"
		),
		array(
			"field"		=> "city_apikey",
			"label"		=> "Apikey",
			"rules"		=> "max_length[36]"
		),
		array(
			"field"		=> "city_apisecret",
			"label"		=> "Apisecret",
			"rules"		=> "max_length[36]"
		),
	);
	protected $insert_validation_rules 	= array();
	protected $skip_validation 			= FALSE;

	//--------------------------------------------------------------------
    function getCities() {
        $records = $this->select('cid,city')->find_all();

        foreach ($records as $r) {
            $sel[$r->cid]=$r->city;
        }
        return $sel;
    }
}
