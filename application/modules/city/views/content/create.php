<?php

$validation_errors = validation_errors();

if ($validation_errors) :
?>
<div class="alert alert-block alert-error fade in">
	<a class="close" data-dismiss="alert">&times;</a>
	<h4 class="alert-heading">Please fix the following errors:</h4>
	<?php echo $validation_errors; ?>
</div>
<?php
endif;

if (isset($city))
{
	$city = (array) $city;
}
$id = isset($city['cid']) ? $city['cid'] : '';

?>
<div class="admin-box">
	<h3>city</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('city') ? 'error' : ''; ?>">
				<?php echo form_label('City'. lang('bf_form_label_required'), 'city_city', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='city_city' type='text' name='city_city' maxlength="60" value="<?php echo set_value('city_city', isset($city['city']) ? $city['city'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('city'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('name') ? 'error' : ''; ?>">
				<?php echo form_label('Name', 'city_name', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='city_name' type='text' name='city_name' maxlength="50" value="<?php echo set_value('city_name', isset($city['name']) ? $city['name'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('name'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('country') ? 'error' : ''; ?>">
				<?php echo form_label('Country', 'city_country', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='city_country' type='text' name='city_country' maxlength="60" value="<?php echo set_value('city_country', isset($city['country']) ? $city['country'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('country'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('fmuser') ? 'error' : ''; ?>">
				<?php echo form_label('Fmuser', 'city_fmuser', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='city_fmuser' type='text' name='city_fmuser' maxlength="50" value="<?php echo set_value('city_fmuser', isset($city['fmuser']) ? $city['fmuser'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('fmuser'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('fmpass') ? 'error' : ''; ?>">
				<?php echo form_label('Fmpass', 'city_fmpass', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='city_fmpass' type='text' name='city_fmpass' maxlength="50" value="<?php echo set_value('city_fmpass', isset($city['fmpass']) ? $city['fmpass'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('fmpass'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('apikey') ? 'error' : ''; ?>">
				<?php echo form_label('Apikey', 'city_apikey', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='city_apikey' type='text' name='city_apikey' maxlength="36" value="<?php echo set_value('city_apikey', isset($city['apikey']) ? $city['apikey'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('apikey'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('apisecret') ? 'error' : ''; ?>">
				<?php echo form_label('Apisecret', 'city_apisecret', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='city_apisecret' type='text' name='city_apisecret' maxlength="36" value="<?php echo set_value('city_apisecret', isset($city['apisecret']) ? $city['apisecret'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('apisecret'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('city_action_create'); ?>"  />
				<?php echo lang('bf_or'); ?>
				<?php echo anchor(SITE_AREA .'/content/city', lang('city_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>