<?php
	@session_start();
	header('Content-Type: text/json; charset=utf-8');
?>
{
	"auth_ok" : "<?php echo $_SESSION["auth_ok"]; ?>",
	"user": {
		"uid" : "<?php echo $_SESSION["uid"]; ?>",
		"name" : "<?php echo $_SESSION["user_name"]; ?>"
	},
	"menuUrl" : "principal.php"
}