<div>
	<h1 class="page-header">events</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				
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
		<th>Deleted</th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td>
						<?php if ($field == 'deleted'): ?>
							<?php e(($value > 0) ? lang('events_true') : lang('events_false')); ?>
						<?php else: ?>
							<?php e($value); ?>
						<?php endif ?>
					</td>
				<?php endif; ?>
				
			<?php endforeach; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>