<?php

include(dirname(__FILE__).'/dbconnection.php');

$conn = OpenCon();

$title = "";
if(isset($_POST['title']))
{
    $title = $_POST['title'];
}

$dates = "";
if(isset($_POST['dates']))
{
    $dates = $_POST['dates'];
}

$description = "";
if(isset($_POST['description']))
{
    $description = $_POST['description'];
}

$total = 0;
$total = count($_FILES['photo']['name']);

$sql = "INSERT INTO Test (Title, Dates, Description, Photos)
VALUES ('".$title."', '".$dates."', '".$description."', '".$total."')";

if ($conn->query($sql) === TRUE)
{
    $id = mysqli_insert_id($conn);
    $directoryCreated = false;
    if (!file_exists("../Images/".$id))
    {    
        $directoryCreated = mkdir("../Images/".$id, 0777, true);
    }
    
    // Loop through each file
    for( $i=0 ; $i < $total ; $i++ ) 
    {
        $tmpFilePath = $_FILES['photo']['tmp_name'][$i];
        if ($tmpFilePath != "")
        {
            if($directoryCreated)
            {
                //Setup our new file path
                $newFilePath = "../Images/".$id."/".$_FILES['photo']['name'][$i];

                //Upload the file into the temp dir
                $res = move_uploaded_file($tmpFilePath, $newFilePath);
            }
        }
    }
}
else
{
  echo "Error: " . $sql . "<br>" . $conn->error;
  die();
}

CloseCon($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
die();
?>