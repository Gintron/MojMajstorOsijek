<?php
include_once 'header.php';
?> 

<div class="container margin-top-custom">
        <div class="card">
           
            <div class="card-header text-center bg-dark text-white">
					<h2>Dodaj uslugu</h2>
                </div>
                <div class="card-body">
                <form action="include/job.inc.php" method="post">
                    <div class="form-group">
                        <label for="nameOfJob">Naziv usluge</label>
                        <input type="text" class="form-control" id="nameOfJob" name="nameOfJob" placeholder="npr. Elektroinstalater">
                    </div>
                    <div class="form-group">
                        <label for="category">Odaberi kategoriju</label>
                        <select class="form-control" id="category" name="category">
                            <option>Gradenje i iskopi</option>
                            <option>Vodoinstalteri</option>
                            <option>Eletkroinstalateri</option>
                            <option>Soboslikari</option>
                            <option>Parketari</option>
                            <option>Keramicar</option>
                            <option>Fasaderi</option>
                            <option>Stolari</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jobDescription">Opis usluge</label>
                        <textarea class="form-control" id="jobDescription" name="jobDescription" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telephoneNumber">Broj telefona</label>
                        <textarea class="form-control" id="telephoneNumber" name="telephoneNumber"></textarea>
                    </div>
                    <?php
                     if(isset($_SESSION["userid"])){
                        echo "<input type='submit' class='btn btn-dark w-100' value='Predajte uslugu' name='submitJob'>";
                     }
                     if (isset($_GET["error"])) {
						if ($_GET["error"] == "emptyinput") {
							echo "<p> <font color=red>Popunite sva polja.</font> </p>";
                        }
                        else if ($_GET["error"] == "none") {
							echo "<p> <font color=green>Uspjesno ste dodali uslugu</font> </p>";
						}
                    }
                    ?>
                   
                </form>
            </div>
       
    </div>
</div>