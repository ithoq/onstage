<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/city') ?>" id="list"><?php echo lang('city_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('City.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/city/create') ?>" id="create_new"><?php echo lang('city_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>