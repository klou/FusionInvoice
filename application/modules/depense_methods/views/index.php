<div class="headerbar">
	<h1>Catégorie dépense</h1>

	<div class="pull-right">
		<a class="btn btn-primary" href="<?php echo site_url('depense_methods/form'); ?>"><i class="icon-plus icon-white"></i> <?php echo lang('new'); ?></a>
	</div>
	
	<div class="pull-right">
		<?php echo pager(site_url('depense_methods/index'), 'mdl_depense_methods'); ?>
	</div>

</div>

<?php $this->layout->load_view('layout/alerts'); ?>

<table class="table table-striped">

	<thead>
		<tr>
			<th>Catégorie</th>
			<th><?php echo lang('options'); ?></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($depense_methods as $depense_method) { ?>
		<tr>
			<td><?php echo $depense_method->depense_method_name; ?></td>
			<td>
				<div class="options btn-group">
					<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog"></i> <?php echo lang('options'); ?></a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo site_url('depense_methods/form/' . $depense_method->depense_method_id); ?>">
								<i class="icon-pencil"></i> <?php echo lang('edit'); ?>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('depense_methods/delete/' . $depense_method->depense_method_id); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');">
								<i class="icon-trash"></i> <?php echo lang('delete'); ?>
							</a>
						</li>
					</ul>
				</div>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>
