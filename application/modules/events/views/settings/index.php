<?php

$num_columns	= 16;
$can_delete	= $this->auth->has_permission('Events.Settings.Delete');
$can_edit		= $this->auth->has_permission('Events.Settings.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

?>
<div class="admin-box">
	<h3>events</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($can_delete && $has_records) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Last.fm ID</th>
					<th>Title</th>
					<th>City</th>
					<th>Event Description</th>
					<th>Image Credits URL</th>
					<th>Soundcloud ID</th>
					<th>Imageback</th>
					<th>Start Date</th>
					<th>Start Hour</th>
					<th>End Date</th>
					<th>End Hour</th>
					<th>Last.fm URL</th>
					<th>Event Location</th>
					<th>Buy Ticket URL</th>
					<th>Deleted</th>
				</tr>
			</thead>
			<?php if ($has_records) : ?>
			<tfoot>
				<?php if ($can_delete) : ?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">
						<?php echo lang('bf_with_selected'); ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('events_delete_confirm'))); ?>')" />
					</td>
				</tr>
				<?php endif; ?>
			</tfoot>
			<?php endif; ?>
			<tbody>
				<?php
				if ($has_records) :
					foreach ($records as $record) :
				?>
				<tr>
					<?php if ($can_delete) : ?>
					<td class="column-check"><input type="checkbox" name="checked[]" value="<?php echo $record->id; ?>" /></td>
					<?php endif;?>
					
				<?php if ($can_edit) : ?>
					<td><?php echo anchor(SITE_AREA . '/settings/events/edit/' . $record->id, '<span class="icon-pencil"></span>' .  $record->fmid); ?></td>
				<?php else : ?>
					<td><?php e($record->fmid); ?></td>
				<?php endif; ?>
					<td><?php e($record->etitle) ?></td>
					<td><?php e($record->ecity) ?></td>
					<td><?php e($record->edescription) ?></td>
					<td><?php e($record->eimage) ?></td>
					<td><?php e($record->soundcloud) ?></td>
					<td><?php e($record->imageback) ?></td>
					<td><?php e($record->estartdate) ?></td>
					<td><?php e($record->estarthour) ?></td>
					<td><?php e($record->eenddate) ?></td>
					<td><?php e($record->eendhour) ?></td>
					<td><?php e($record->efmurl) ?></td>
					<td><?php e($record->elocation) ?></td>
					<td><?php e($record->eticketurl) ?></td>
					<td><?php echo $record->deleted > 0 ? lang('events_true') : lang('events_false')?></td>
				</tr>
				<?php
					endforeach;
				else:
				?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">No records found that match your selection.</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>