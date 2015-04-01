<div class="recovery_form">
	<h1>Change password</h1>
	<?=form_open("cabinet", "id=\"password\"");?>
		<p>
			<?=form_label("Password:", "password");?>
			<?=form_password("password", "", "id=\"password\"");?>
		</p>
		
		<p>
			<?=form_label("Repeat password:", "repeat_password");?>
			<?=form_password("repeat_password", "", "id=\"repeat_password\"");?>
		</p>
		
		<p>
			<?=form_submit("submit", "Submit");?>
		</p>
		
	<?=form_close("");?>
	<div class="errors"><?=validation_errors();?></div>
</div>