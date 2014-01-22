<form method="post" class="form-horizontal">

	<div class="headerbar">
		<h1><?php echo lang('edit_category'); ?></h1>
		<?php $this->layout->load_view('layout/header_buttons'); ?>
	</div>

	<div class="content">

		<?php $this->layout->load_view('layout/alerts'); ?>

			<div class="control-group">
				<label class="control-label"><?php echo lang('category'); ?>: </label>
				<div class="controls">
					<input type="text" name="depense_method_name" id="depense_method_name" value="<?php echo $this->mdl_depense_methods->form_value('depense_method_name'); ?>">
				</div>
			</div>

	</div>
	
</form>
