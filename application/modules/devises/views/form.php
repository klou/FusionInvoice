<form method="post" class="form-horizontal">

	<div class="headerbar">
		<h1><?php echo lang('edit_currency'); ?></h1>
		<?php $this->layout->load_view('layout/header_buttons'); ?>
	</div>

		<?php $this->layout->load_view('layout/alerts'); ?>
			<br>

			<div class="control-group">
				<label class="control-label"><?php echo lang('currency'); ?>: </label>
				<div class="controls">
					<input type="text" name="nomdfr" id="nomdfr" value="<?php echo $this->mdl_devises->form_value('nomdfr'); ?>">
				</div>
				<label class="control-label"><?php echo lang('tax'); ?>: </label>
				<div class="controls">
					<input type="text" name="taux" id="taux" value="<?php echo $this->mdl_devises->form_value('taux'); ?>">
				</div>
			</div>

	</div>
	
</form>
