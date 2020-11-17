<?php
include_once 'header.php';

if (isset($_GET['edit'])) {
    require_once 'include/dbh.inc.php';
    $id = $_GET['edit'];
    $sql = "SELECT * FROM jobs WHERE jobId = '$id' ";
    $run = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($run);
    $jobName = $row['jobName'];
    $jobCategory = $row['jobCategory'];
    $jobDescription = $row['jobDescription'];
    $jobPhoneNumber = $row['jobPhoneNumber'];
}
?>

<div class="container margin-top-custom">
    <div class="card">

        <div class="card-header text-center bg-dark text-white">
            <h2>Izmjeni uslugu</h2>
        </div>
        <div class="card-body">
            <form action="include/edit.inc.php?edit=<?php echo $id; ?>" method="post">
                <div class="form-group">
                    <label for="nameOfJob">Naziv usluge</label>
                    <input type="text" class="form-control" id="nameOfJob" name="nameOfJob" value="<?php echo $jobName; ?>">
                </div>
                <div class="form-group">
                    <label for="category">Odaberi kategoriju</label>
                    <?php
                    $options = array("Gradenje i iskopi", "Vodoinstalteri", "Eletkroinstalateri", "Soboslikari", "Parketari", "Keramicar", "Fasaderi", "Stolari");
                    ?>

                    <select class="form-control" id="category" name="category">
                        <?php foreach ($options as $option) : ?>
                            <option value="<?php echo $option; ?>" <?php if ($jobCategory == $option) : ?> selected="selected" <?php endif; ?>>
                                <?php echo $option; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jobDescription">Opis usluge</label>
                    <textarea class="form-control" id="jobDescription" name="jobDescription" rows="3"><?php echo $jobDescription; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="telephoneNumber">Broj telefona</label>
                    <textarea class="form-control" id="telephoneNumber" name="telephoneNumber"><?php echo $jobPhoneNumber; ?></textarea>
                </div>
                <?php
                if (isset($_SESSION["userid"])) {
                    echo "<input type='submit' class='btn btn-dark w-100' value='Spremi izmjene' name='editJob'>";
                }
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p> <font color=red>Popunite sva polja.</font> </p>";
                    }
                }
                ?>

            </form>
        </div>

    </div>
</div>