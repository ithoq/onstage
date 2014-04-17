<?php

$num_columns	= 8;
$can_delete	= $this->auth->has_permission('City.Settings.Delete');
$can_edit		= $this->auth->has_permission('City.Settings.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

?>
<div class="admin-box">
	<h3>city</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($can_delete && $has_records) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>City</th>
					<th>Name</th>
					<th>Country</th>
					<th>Fmuser</th>
					<th>Fmpass</th>
					<th>Apikey</th>
					<th>Apisecret</th>
				</tr>
			</thead>
			<?php if ($has_records) : ?>
			<tfoot>
				<?php if ($can_delete) : ?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">
						<?php echo lang('bf_with_selected'); ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('city_delete_confirm'))); ?>')" />
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
					<td class="column-check"><input type="checkbox" name="checked[]" value="<?php echo $record->cid; ?>" /></td>
					<?php endif;?>
					
				<?php if ($can_edit) : ?>
					<td><?php echo anchor(SITE_AREA . '/settings/city/edit/' . $record->cid, '<span class="icon-pencil"></span>' .  $record->city); ?></td>
				<?php else : ?>
					<td><?php e($record->city); ?></td>
				<?php endif; ?>
					<td><?php e($record->name) ?></td>
					<td><?php e($record->country) ?></td>
					<td><?php e($record->fmuser) ?></td>
					<td><?php e($record->fmpass) ?></td>
					<td><?php e($record->apikey) ?></td>
					<td><?php e($record->apisecret) ?></td>
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