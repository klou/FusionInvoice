<script type="text/javascript">
	$(function()
	{
		$('#enter-depense').on('shown', function() {
           $('#depense_amount').focus(); 
        });
        
        $('#btn_modal_depense_submit').click(function()
		{
			$.post("<?php echo site_url('depenses/ajax/add'); ?>", { 
				invoice_id: $('#invoice_id').val(),
				depense_amount: $('#depense_amount').val(),
				depense_method_id: $('#depense_method_id').val(),
				depense_date: $('#depense_date').val(),
				depense_note: $('#depense_note').val()
			},
			function(data) {
				var response = JSON.parse(data);
				if (response.success == '1')
				{
					// The validation was successful and depense was added
					window.location = "<?php echo site_url('invoices/view/' . $invoice_id); ?>";
				}
				else
				{
					// The validation was not successful
					$('.control-group').removeClass('error');
					for (var key in response.validation_errors) {
						$('#' + key).parent().parent().addClass('error');

					}
				}
			});
		});
	});
</script>

<div id="enter-depense" class="modal hide fade">
	<div class="modal-header">
		<a data-dismiss="modal" class="close">×</a>
		<h3>Nouvelle dépense</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal">
			<div class="control-group">

				<label class="control-label"><?php echo lang('amount'); ?>: </label>
				<div class="controls">
					<input type="text" name="depense_amount" id="depense_amount">
				</div>

			</div>

			<div class="control-group">

				<label class="control-label">Date: </label>
				<div class="controls input-append date datepicker">
					<input size="16" type="text" name="depense_date" id="depense_date" value="<?php echo date(date_format_setting()); ?>" readonly>
					<span class="add-on"><i class="icon-th"></i></span>
				</div>

			</div>

			<div class="control-group">

				<label class="control-label">Catégorie: </label>
				<div class="controls">
					<select name="depense_method_id" id="depense_method_id">
						<option value=""></option>
						<?php foreach ($depense_methods as $depense_method) { ?>
						<option value="<?php echo $depense_method->depense_method_id; ?>"><?php echo $depense_method->depense_method_name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="control-group">

				<label class="control-label"><?php echo lang('note'); ?>: </label>
				<div class="controls">
					<textarea name="depense_note" id="depense_note"></textarea>
				</div>

			</div>
		</form>
	</div>

	<div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="icon-white icon-remove"></i> <?php echo lang('cancel'); ?></button>
		<button class="btn btn-primary" id="btn_modal_depense_submit" type="button"><i class="icon-white icon-ok"></i> <?php echo lang('submit'); ?></button>
	</div>

</div>
