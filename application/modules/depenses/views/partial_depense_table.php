<table class="table table-striped">

	<thead>
		<tr>
			<th><?php echo lang('expense_date'); ?></th>
			<th><?php echo lang('amount'); ?></th>
			<th><?php echo lang('currency'); ?></th>
			<th><?php echo lang('category'); ?></th>
			<th><?php echo lang('note'); ?></th>
			<th><?php echo lang('options'); ?></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($depenses as $depense) { ?>
		<tr>
			<td><?php echo date_from_mysql($depense->depense_date); ?></td>
			<td><?php echo format_currency($depense->depense_amount); ?></td>
			<td><?php echo $depense->nomdfr; ?></td>
			<td><?php echo $depense->depense_method_name; ?></td>
			<td><?php echo $depense->depense_note; ?></td>
			<td>
				<div class="options btn-group">
					<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog"></i> <?php echo lang('options'); ?></a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo site_url('depenses/form/' . $depense->depense_id); ?>">
								<i class="icon-pencil"></i> <?php echo lang('edit'); ?>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('depenses/delete/' . $depense->depense_id); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');">
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
