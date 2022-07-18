<?php
//Get all information from database

include(dirname(__FILE__).'/../Functions/dbconnection.php');

$conn = OpenCon();

$sql = "SELECT * FROM Test";
$result = $conn->query($sql);

$hasData = false;
if ($result->num_rows > 0) {
    // output data of each row
//     while($row = $result->fetch_assoc()) {
//       echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//     }
//   } else {
//     echo "0 results";
    $hasData = true;
}

CloseCon($conn);

?>

<div class="row">
    <?php if($hasData) { ?>
    <?php } ?>
    <div class="col-12 text-center">
        <hr/>
        <h2>Want to add another moment?</h2>
        <a class="btn btn-success" href="addmoment.php">Then click here to add one</a>
    </div>
</div>