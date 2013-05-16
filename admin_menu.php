<?php

	session_start();

	if (!(isset($_SESSION['auth_ok']) && $_SESSION['auth_ok'] === 'true')) {
		header("HTTP/1.0 401 Unauthorized");
		exit();
	}
	
	// ce code html est volontairement un fragment car il sera inséré dans index.html (en tant que #userMenu)
?>
<ul>
	<li><a style="target-name:new; target-new:tab;" target="_new" href="admin_book_addform.php">+ livre</a></li>
	<li><a style="target-name:new; target-new:tab;" target="_new" href="admin_user_addform.php">+ utilisateur</a></li>
</ul>