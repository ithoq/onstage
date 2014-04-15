<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * settings controller
 */
class settings extends Admin_Controller
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

		$this->auth->restrict('Events.Settings.View');
		$this->load->model('events_model', null, true);
		$this->lang->load('events');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
		Template::set_block('sub_nav', 'settings/_sub_nav');

		Assets::add_module_js('events', 'events.js');
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
					$result = $this->events_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('events_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('events_delete_failure') . $this->events_model->error, 'error');
				}
			}
		}

		$records = $this->events_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage events');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Creates a events object.
	 *
	 * @return void
	 */
	public function create()
	{
		$this->auth->restrict('Events.Settings.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_events())
			{
				// Log the activity
				log_activity($this->current_user->id, lang('events_act_create_record') .': '. $insert_id .' : '. $this->input->ip_address(), 'events');

				Template::set_message(lang('events_create_success'), 'success');
				redirect(SITE_AREA .'/settings/events');
			}
			else
			{
				Template::set_message(lang('events_create_failure') . $this->events_model->error, 'error');
			}
		}
		Assets::add_module_js('events', 'events.js');

		Template::set('toolbar_title', lang('events_create') . ' events');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Allows editing of events data.
	 *
	 * @return void
	 */
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('events_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/events');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Events.Settings.Edit');

			if ($this->save_events('update', $id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('events_act_edit_record') .': '. $id .' : '. $this->input->ip_address(), 'events');

				Template::set_message(lang('events_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('events_edit_failure') . $this->events_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Events.Settings.Delete');

			if ($this->events_model->delete($id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('events_act_delete_record') .': '. $id .' : '. $this->input->ip_address(), 'events');

				Template::set_message(lang('events_delete_success'), 'success');

				redirect(SITE_AREA .'/settings/events');
			}
			else
			{
				Template::set_message(lang('events_delete_failure') . $this->events_model->error, 'error');
			}
		}
		Template::set('events', $this->events_model->find($id));
		Template::set('toolbar_title', lang('events_edit') .' events');
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
	private function save_events($type='insert', $id=0)
	{
		if ($type == 'update')
		{
			$_POST['id'] = $id;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['fmid']        = $this->input->post('events_fmid');
		$data['etitle']        = $this->input->post('events_etitle');
		$data['ecity']        = $this->input->post('events_ecity');
		$data['edescription']        = $this->input->post('events_edescription');
		$data['eimage']        = $this->input->post('events_eimage');
		$data['soundcloud']        = $this->input->post('events_soundcloud');
		$data['imageback']        = $this->input->post('events_imageback');
		$data['estartdate']        = $this->input->post('events_estartdate') ? $this->input->post('events_estartdate') : '0000-00-00';
		$data['estarthour']        = $this->input->post('events_estarthour');
		$data['eenddate']        = $this->input->post('events_eenddate') ? $this->input->post('events_eenddate') : '0000-00-00';
		$data['eendhour']        = $this->input->post('events_eendhour');
		$data['efmurl']        = $this->input->post('events_efmurl');
		$data['elocation']        = $this->input->post('events_elocation');
		$data['eticketurl']        = $this->input->post('events_eticketurl');
		$data['deleted']        = $this->input->post('events_deleted');

		if ($type == 'insert')
		{
			$id = $this->events_model->insert($data);

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
			$return = $this->events_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------


}