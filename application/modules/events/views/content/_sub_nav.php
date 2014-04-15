<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/events') ?>" id="list"><?php echo lang('events_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Events.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/events/create') ?>" id="create_new"><?php echo lang('events_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>