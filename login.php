<?php
	include_once 'header.php';
?>

	<div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-50 my-auto shadow">
				<div class="card-header text-center bg-dark text-white">
					<h2>Prijavite se</h2>
				</div>
				<div class="card-body">
					<form action="include/login.inc.php" method="post">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" id="email" class="form-control" name="email" />
						</div>
						<div class="form-group">
							<label for="password">Lozinka</label>
							<input type="password" id="password" class="form-control" name="pwd" />
						</div>
						<input type="submit" class="btn btn-dark w-100" value="Prijavite se" name="login">
						<?php

					if (isset($_GET["error"])) {
						if ($_GET["error"] == "emptyinput") {
							echo "<p> <font color=red>Popunite sva polja.</font> </p>";
						} else if ($_GET["error"] == "emaildontexists") {
							echo "<p> <font color=red>Email ne posotoji</font> </p>";
						} else if ($_GET["error"] == "wrongpassword") {
							echo "<p> <font color=red>Netocna lozinka</font> </p>";
						} 
					}
					?>
					</form>
				</div>
			</div>
		</div>
	</div>
