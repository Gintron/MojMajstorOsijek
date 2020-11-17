<?php
include_once 'header.php';
?>

<div class="container vh-100">
	<div class="row justify-content-center h-100">
		<div class="card w-50 my-auto shadow">
			<div class="card-header text-center bg-dark text-white">
				<h2>Registracija</h2>
			</div>
			<div class="card-body">
				<form action="include/register.inc.php" method="post">
					<div class="form-group">
						<label for="name">Naziv obrta ili kompanije</label>
						<input type="text" name="name" class="form-control">
						<label for="email">Email</label>
						<input type="email" id="email" class="form-control" name="email" />
					</div>
					<div class="form-group">
						<label for="password">Lozinka</label>
						<input type="password" id="password" class="form-control" name="pwd" />
						<label for="password">Ponovi lozinku</label>
						<input type="password" id="password" class="form-control" name="pwdrepeat" />
					</div>
					<input type="submit" class="btn btn-dark w-100" value="Registrirajte se" name="register">
					<?php

					if (isset($_GET["error"])) {
						if ($_GET["error"] == "emptyinput") {
							echo "<p> <font color=red>Popunite sva polja.</font> </p>";
						} else if ($_GET["error"] == "invalidemail") {
							echo "<p> <font color=red>Unesite valjanu email adresu</font> </p>";
						} else if ($_GET["error"] == "paswordmissmatch") {
							echo "<p> <font color=red>Lozinke se ne poklapaju</font> </p>";
						} else if ($_GET["error"] == "stmtfailed") {
							echo "<p> <font color=red>Nesto je poslo po zlu.</font> </p>";
						} else if ($_GET["error"] == "none") {
							echo "<p> <font color=green>Uspjesno ste registrirani</font> </p>";
						}
					}
					?>
				</form>
			</div>
		</div>
	</div>
</div>