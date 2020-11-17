<?php
include_once 'header.php';


?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <?php
        if(isset($_SESSION["userid"]))
        echo "<h2 class='display-4 text-center'>" . $_SESSION["userName"] . "</h2>";
        ?>
    </div>
</div>
<div class="container">
    <div class="card-columns">
        <?php
        if(isset($_SESSION["userid"])){
        require_once 'include/dbh.inc.php';
        $id = $_SESSION["userid"];
       
        $sql = "SELECT jobId, jobName, jobCategory, jobDescription, jobPhoneNumber FROM jobs WHERE userId = $id";
        $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        while ($record = mysqli_fetch_assoc($resultset)) {
        ?>

            <div class="card shadow" >
                <div class="card-body ">
                    <h3 href="#"><?php echo $record['jobName']; ?></h3>
                    <p class="card-text"><?php echo "Opis: ".$record['jobDescription']; ?></p>
                    <p class="card-text"><?php echo "Telefonski broj: ".$record['jobPhoneNumber']; ?></p>
                    <a href="include/profile.inc.php?delete=<?php echo $record['jobId']; ?> "class="btn btn-danger">Izbrisi</a>
                    <a href="edit.php?edit=<?php echo $record['jobId']; ?> "class="btn btn-dark">Uredi</a>
                </div>
            </div>

        <?php }} ?>
    </div>
</div>