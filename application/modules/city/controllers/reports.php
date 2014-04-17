<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * reports controller
 */
class reports extends Admin_Controller
{

	//--------------------------------------------------------------------


	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('City.Reports.View');
		$this->load->model('city_model', null, true);
		$this->lang->load('city');
		
		Template::set_block('sub_nav', 'reports/_sub_nav');

		Assets::add_module_js('city', 'city.js');
	}

	//--------------------------------------------------------------------


	/**
	 * Displays a list of form data.
	 *
	 * @return void
	 */
	public function index()
	{

		// Deleting anything?
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->city_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('city_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('city_delete_failure') . $this->city_model->error, 'error');
				}
			}
		}

		$records = $this->city_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage city');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Creates a city object.
	 *
	 * @return void
	 */
	public function create()
	{
		$this->auth->restrict('City.Reports.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_city())
			{
				// Log the activity
				log_activity($this->current_user->id, lang('city_act_create_record') .': '. $insert_id .' : '. $this->input->ip_address(), 'city');

				Template::set_message(lang('city_create_success'), 'success');
				redirect(SITE_AREA .'/reports/city');
			}
			else
			{
				Template::set_message(lang('city_create_failure') . $this->city_model->error, 'error');
			}
		}
		Assets::add_module_js('city', 'city.js');

		Template::set('toolbar_title', lang('city_create') . ' city');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Allows editing of city data.
	 *
	 * @return void
	 */
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('city_invalid_id'), 'error');
			redirect(SITE_AREA .'/reports/city');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('City.Reports.Edit');

			if ($this->save_city('update', $id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('city_act_edit_record') .': '. $id .' : '. $this->input->ip_address(), 'city');

				Template::set_message(lang('city_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('city_edit_failure') . $this->city_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('City.Reports.Delete');

			if ($this->city_model->delete($id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('city_act_delete_record') .': '. $id .' : '. $this->input->ip_address(), 'city');

				Template::set_message(lang('city_delete_success'), 'success');

				redirect(SITE_AREA .'/reports/city');
			}
			else
			{
				Template::set_message(lang('city_delete_failure') . $this->city_model->error, 'error');
			}
		}
		Template::set('city', $this->city_model->find($id));
		Template::set('toolbar_title', lang('city_edit') .' city');
		Template::render();
	}

	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/**
	 * Summary
	 *
	 * @param String $type Either "insert" or "update"
	 * @param Int	 $id	The ID of the record to update, ignored on inserts
	 *
	 * @return Mixed    An INT id for successful inserts, TRUE for successful updates, else FALSE
	 */
	private function save_city($type='insert', $id=0)
	{
		if ($type == 'update')
		{
			$_POST['cid'] = $id;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['city']        = $this->input->post('city_city');
		$data['name']        = $this->input->post('city_name');
		$data['country']        = $this->input->post('city_country');
		$data['fmuser']        = $this->input->post('city_fmuser');
		$data['fmpass']        = $this->input->post('city_fmpass');
		$data['apikey']        = $this->input->post('city_apikey');
		$data['apisecret']        = $this->input->post('city_apisecret');

		if ($type == 'insert')
		{
			$id = $this->city_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			}
			else
			{
				$return = FALSE;
			}
		}
		elseif ($type == 'update')
		{
			$return = $this->city_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------


}