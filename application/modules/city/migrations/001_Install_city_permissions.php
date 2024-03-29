<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_city_permissions extends Migration
{

	/**
	 * Permissions to Migrate
	 *
	 * @var Array
	 */
	private $permission_values = array(
		array(
			'name' => 'City.Content.View',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Content.Create',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Content.Edit',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Content.Delete',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Reports.View',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Reports.Create',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Reports.Edit',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Reports.Delete',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Settings.View',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Settings.Create',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Settings.Edit',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Settings.Delete',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Developer.View',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Developer.Create',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Developer.Edit',
			'description' => '',
			'status' => 'active',
		),
		array(
			'name' => 'City.Developer.Delete',
			'description' => '',
			'status' => 'active',
		),
	);

	/**
	 * The name of the permissions table
	 *
	 * @var String
	 */
	private $table_name = 'permissions';

	/**
	 * The name of the role/permissions ref table
	 *
	 * @var String
	 */
	private $roles_table = 'role_permissions';

	//--------------------------------------------------------------------

	/**
	 * Install this migration
	 *
	 * @return void
	 */
	public function up()
	{
		$role_permissions_data = array();
		foreach ($this->permission_values as $permission_value)
		{
			$this->db->insert($this->table_name, $permission_value);

			$role_permissions_data[] = array(
				'role_id' => '1',
				'permission_id' => $this->db->insert_id(),
			);
		}

		$this->db->insert_batch($this->roles_table, $role_permissions_data);
	}

	//--------------------------------------------------------------------

	/**
	 * Uninstall this migration
	 *
	 * @return void
	 */
	public function down()
	{
		foreach ($this->permission_values as $permission_value)
		{
			$query = $this->db->select('permission_id')
				->get_where($this->table_name, array('name' => $permission_value['name'],));

			foreach ($query->result() as $row)
			{
				$this->db->delete($this->roles_table, array('permission_id' => $row->permission_id));
			}

			$this->db->delete($this->table_name, array('name' => $permission_value['name']));
		}
	}

	//--------------------------------------------------------------------

}