<div class="headerbar">
	<h1><?php echo lang('currency_types'); ?></h1>

	<div class="pull-right">
		<a class="btn btn-primary" href="<?php echo site_url('devises/form'); ?>"><i class="icon-plus icon-white"></i> <?php echo lang('new'); ?></a>
	</div>
	
	<div class="pull-right">
		<?php echo pager(site_url('devises/index'), 'mdl_devises'); ?>
	</div>

</div>

<?php $this->layout->load_view('layout/alerts'); ?>
<div class="table-content">
<table class="table table-striped">

	<thead>
		<tr>
			<th><?php echo lang('currencies'); ?></th>
			<th><?php echo lang('tax'); ?></th>
			<th><?php echo lang('options'); ?></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($devises as $devise) { ?>
		<tr>
			<td><?php echo $devise->nomdfr; ?></td>
			<td><?php echo $devise->taux; ?></td>
			<td>
				<div class="options btn-group">
					<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog"></i> <?php echo lang('options'); ?></a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo site_url('devises/form/' . $devise->iddevise); ?>">
								<i class="icon-pencil"></i> <?php echo lang('edit'); ?>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('devises/delete/' . $devise->iddevise); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');">
								<i class="icon-trash"></i> <?php echo lang('delete'); ?>
							</a>
						</li>
					</ul>
				</div>
			</td>
		</tr>
		<?php } ?>
	</tbody>
	</div>

</table>
