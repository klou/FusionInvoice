<script type="text/javascript">
$(function() {
   $('#invoice_id').focus();
   
   amounts = JSON.parse('<?php echo $amounts; ?>');
   
   $('#invoice_id').change(function() {
       $('#depense_amount').val(amounts["invoice" + $('#invoice_id').val()]);
   });
   
});
</script>

<form method="post" class="form-horizontal">
    
    <?php if ($depense_id) { ?>
    <input type="hidden" name="depense_id" value="<?php echo $depense_id; ?>">
    <?php } ?>

	<div class="headerbar">
		<h1>Dépense</h1>
		<?php $this->layout->load_view('layout/header_buttons'); ?>
	</div>

	<div class="content">

		<?php $this->layout->load_view('layout/alerts'); ?>

			<div class="control-group">
				<label class="control-label"><?php echo lang('date'); ?>: </label>
				<div class="controls input-append date datepicker">
					<input type="text" name="depense_date" id="depense_date" value="<?php echo date_from_mysql($this->mdl_depenses->form_value('depense_date')); ?>" readonly>
					<span class="add-on"><i class="icon-th"></i></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo lang('amount'); ?>: </label>
				<div class="controls">
					<input type="text" name="depense_amount" id="depense_amount" value="<?php echo format_amount($this->mdl_depenses->form_value('depense_amount')); ?>">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Devise: </label>
				<div class="controls">
					<select name="iddevise">
						<?php foreach ($devises as $devise) { ?>
						<option value="<?php echo $devise->iddevise; ?>" <?php 
							if ($this->mdl_depenses->form_value('iddevise') == $devise->iddevise) 
								{ ?>selected="selected"<?php } ?>>
							<?php echo $devise->nomdfr; ?>
						</option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="control-group">

				<label class="control-label">Catégorie: </label>
				<div class="controls">
					<select name="depense_method_id">
						<option value="0"></option>
						<?php foreach ($depense_methods as $depense_method) { ?>
						<option value="<?php echo $depense_method->depense_method_id; ?>" <?php if ($this->mdl_depenses->form_value('depense_method_id') == $depense_method->depense_method_id) { ?>selected="selected"<?php } ?>>
							<?php echo $depense_method->depense_method_name; ?>
						</option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="control-group">

				<label class="control-label"><?php echo lang('note'); ?>: </label>
				<div class="controls">
					<textarea name="depense_note"><?php echo $this->mdl_depenses->form_value('depense_note'); ?></textarea>
				</div>

			</div>

	</div>

</form>
