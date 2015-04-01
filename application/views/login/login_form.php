<div class="login_form">
	<h1>Login</h1>
	<?=form_open("admin", "id=\"admin\"");?>
		<p>
			<?=form_label("Login:", "login");?>
			<?=form_input("login", set_value("login"), "id=\"login\"");?>
		</p>
		
		<p>
			<?=form_label("Password:", "password");?>
			<?=form_password("password", "", "id=\"password\"");?>
		</p>
		
		<p>
			<?=form_submit("submit", "Login");?>
		</p>
		
	<?=form_close("");?>
	<div class="errors"><?=validation_errors();?></div>
</div>