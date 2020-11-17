<?php
    include_once 'header.php';
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $options = array("Gradenje i iskopi", "Vodoinstalteri", "Eletkroinstalateri", "Soboslikari", "Parketari", "Keramicar", "Fasaderi", "Stolari");
       
    }
?>
<div class="container margin-top-custom">
    <div class="card-columns">
        <?php
        require_once 'include/dbh.inc.php';
       
        $sql = "SELECT jobId, jobName, jobCategory, jobDescription, jobPhoneNumber FROM jobs WHERE jobCategory =  '$options[$category]'";
        $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        while ($record = mysqli_fetch_assoc($resultset)) {
        ?>

            <div class="card shadow" >
                <div class="card-body ">
                    <h3 href="#"><?php echo $record['jobName']; ?></h3>
                    <p class="card-text"><?php echo "Opis: ".$record['jobDescription']; ?></p>
                    <p class="card-text"><?php echo "Telefonski broj: ".$record['jobPhoneNumber']; ?></p>
                </div>
            </div>

        <?php } ?>
    </div>
</div>