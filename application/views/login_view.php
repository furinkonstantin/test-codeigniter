<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<? // Можно было разбить на header.php и footer.php, но это тестовое задание ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script>
		//Можно было бы добавить в общий файл скриптов js, но это тестовое задание
		$(function() {
			$("#admin").live("submit",function(){
				var serialize = $(this).serialize();
				$.post(
					"admin",
					serialize,
					function(data) {
						$(".login_form").replaceWith(data);
						console.log(data);
					}
				);
				return false;
			});
		});
	</script>
	<style>
		label {
			display:block;
		}
		.errors {
			color: red;
		}
	</style>
</head>
<body>
	<? $this->load->view("login/login_form");?>
</body>
</html>