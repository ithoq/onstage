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

if (isset($events))
{
	$events = (array) $events;
}
$id = isset($events['id']) ? $events['id'] : '';

?>
<div class="admin-box">
	<h3>events</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('fmid') ? 'error' : ''; ?>">
				<?php echo form_label('Last.fm ID'. lang('bf_form_label_required'), 'events_fmid', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_fmid' type='text' name='events_fmid' maxlength="40" value="<?php echo set_value('events_fmid', isset($events['fmid']) ? $events['fmid'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('fmid'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('etitle') ? 'error' : ''; ?>">
				<?php echo form_label('Title'. lang('bf_form_label_required'), 'events_etitle', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_etitle' type='text' name='events_etitle' maxlength="200" value="<?php echo set_value('events_etitle', isset($events['etitle']) ? $events['etitle'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('etitle'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('ecity') ? 'error' : ''; ?>">
				<?php echo form_label('City'. lang('bf_form_label_required'), 'events_ecity', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_ecity' type='text' name='events_ecity' maxlength="3" value="<?php echo set_value('events_ecity', isset($events['ecity']) ? $events['ecity'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('ecity'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('edescription') ? 'error' : ''; ?>">
				<?php echo form_label('Event Description', 'events_edescription', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_edescription' type='text' name='events_edescription'  value="<?php echo set_value('events_edescription', isset($events['edescription']) ? $events['edescription'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('edescription'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('eimage') ? 'error' : ''; ?>">
				<?php echo form_label('Image Credits URL', 'events_eimage', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_eimage' type='text' name='events_eimage' maxlength="200" value="<?php echo set_value('events_eimage', isset($events['eimage']) ? $events['eimage'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('eimage'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('soundcloud') ? 'error' : ''; ?>">
				<?php echo form_label('Soundcloud ID', 'events_soundcloud', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_soundcloud' type='text' name='events_soundcloud' maxlength="11" value="<?php echo set_value('events_soundcloud', isset($events['soundcloud']) ? $events['soundcloud'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('soundcloud'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('imageback') ? 'error' : ''; ?>">
				<?php echo form_label('Imageback', 'events_imageback', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_imageback' type='text' name='events_imageback' maxlength="48" value="<?php echo set_value('events_imageback', isset($events['imageback']) ? $events['imageback'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('imageback'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('estartdate') ? 'error' : ''; ?>">
				<?php echo form_label('Start Date', 'events_estartdate', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_estartdate' type='text' name='events_estartdate' maxlength="1" value="<?php echo set_value('events_estartdate', isset($events['estartdate']) ? $events['estartdate'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('estartdate'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('estarthour') ? 'error' : ''; ?>">
				<?php echo form_label('Start Hour', 'events_estarthour', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_estarthour' type='text' name='events_estarthour' maxlength="1" value="<?php echo set_value('events_estarthour', isset($events['estarthour']) ? $events['estarthour'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('estarthour'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('eenddate') ? 'error' : ''; ?>">
				<?php echo form_label('End Date', 'events_eenddate', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_eenddate' type='text' name='events_eenddate' maxlength="1" value="<?php echo set_value('events_eenddate', isset($events['eenddate']) ? $events['eenddate'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('eenddate'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('eendhour') ? 'error' : ''; ?>">
				<?php echo form_label('End Hour', 'events_eendhour', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_eendhour' type='text' name='events_eendhour' maxlength="1" value="<?php echo set_value('events_eendhour', isset($events['eendhour']) ? $events['eendhour'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('eendhour'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('efmurl') ? 'error' : ''; ?>">
				<?php echo form_label('Last.fm URL', 'events_efmurl', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_efmurl' type='text' name='events_efmurl' maxlength="200" value="<?php echo set_value('events_efmurl', isset($events['efmurl']) ? $events['efmurl'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('efmurl'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('elocation') ? 'error' : ''; ?>">
				<?php echo form_label('Event Location', 'events_elocation', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_elocation' type='text' name='events_elocation' maxlength="100" value="<?php echo set_value('events_elocation', isset($events['elocation']) ? $events['elocation'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('elocation'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('eticketurl') ? 'error' : ''; ?>">
				<?php echo form_label('Buy Ticket URL', 'events_eticketurl', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='events_eticketurl' type='text' name='events_eticketurl' maxlength="200" value="<?php echo set_value('events_eticketurl', isset($events['eticketurl']) ? $events['eticketurl'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('eticketurl'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('deleted') ? 'error' : ''; ?>">
				<?php echo form_label('Deleted', 'events_deleted', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<label class='checkbox' for='events_deleted'>
						<input type='checkbox' id='events_deleted' name='events_deleted' value='1' <?php echo (isset($events['deleted']) && $events['deleted'] == 1) ? 'checked="checked"' : set_checkbox('events_deleted', 1); ?>>
						<span class='help-inline'><?php echo form_error('deleted'); ?></span>
					</label>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('events_action_edit'); ?>"  />
				<?php echo lang('bf_or'); ?>
				<?php echo anchor(SITE_AREA .'/reports/events', lang('events_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Events.Reports.Delete')) : ?>
				or
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('events_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('events_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>