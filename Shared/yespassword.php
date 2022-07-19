<?php
//Get all information from database

include(dirname(__FILE__).'/../Functions/dbconnection.php');

$conn = OpenCon();

$sql = "SELECT * FROM Test";
$result = $conn->query($sql);

$hasData = false;
if ($result->num_rows > 0) {
    $hasData = true;
}

$Images = '';
$Moments = '';
if ($hasData)
{
    $AllImages = array();
    $Moments .= '
            <div class="container-fluid">   
                <div class="row justify-content-center" style="margin-top:3rem; margin-bottom:3rem;">';

    while($row = $result->fetch_assoc())
    {
        $Moments .= '<div class="col-10 col-md-6 col-lg-4 pt-1 pb-1">
                        <div class="card">';
 
        if($row['Photos'] > 0)
        {
            $Moments .= '    <div id="photo-gallery-'.$row['ID'].'" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">';

            $files = glob("Images/".$row['ID']."/*.*");
            for ($i = 0; $i < count($files); $i++)
            {
                $file = $files[$i];
                $active="";
                if($i == 0)
                {
                    $active = "active";
                }
                $Moments .= '        <div class="carousel-item card-carousel-item '.$active.'">
                                        <img src="'.$file.'" class="mx-auto d-block rounded" height="250">
                                    </div>';
                array_push($AllImages,$file);
            }          
            $Moments .= '       </div>';
            
            if($row['Photos'] > 1)
            {
                $Moments .= '   <button class="carousel-control-prev" type="button" data-bs-target="#photo-gallery-'.$row['ID'].'" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#photo-gallery-'.$row['ID'].'" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>';
            }
            $Moments .= '   </div>';
        }
        $Moments .= '        <div class="card-body">
                                <h5 class="card-title">'.$row["Title"].'<text style="font-size:.6em;"> ('.$row["Dates"].')</text></h5>
                                <p class="card-text">'.$row["Description"].'</p>
                            </div>
                        </div>
                    </div>';
    }
    $Moments .= '</div>
            </div>';


    $AllImagesCount = count($AllImages);
    $Images .= '<div class="row banner">
                    <div class="col-12">';
    if($AllImagesCount > 0)
    {
        $Images .= '    <div class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">';
        for ($i = 0; $i < $AllImagesCount; $i++)
        {
            $active="";
            if($i == 0)
            {
                $active = "active";
            }
            $Images .= '        <div class="carousel-item '.$active.'">
                                    <img src="'.$AllImages[$i].'" class="mx-auto d-block rounded" height="350">
                                </div>';
        }
        $Images .= '       </div>
                        </div>';
    }
    $Images .= '    </div>
                </div>';    
}

CloseCon($conn);

echo $Images;

if(!$hasData)
{
    echo '<hr/>';
}

?>

<div class="row" style="margin-top:3rem; margin-bottom:3rem;">
    <div class="col-12 text-center">
        <h2>
            <?php 
                $datetime1 = new DateTime('2021-01-08');
                $datetime2 = new DateTime();
                $interval = $datetime1->diff($datetime2);
                echo $interval->format('%y years %m months and %d days');
            ?>
            of special moments
        </h2>
    </div>
</div>

<?php

echo $Moments;

?>

<hr/>
<div class="row" style="margin-top:3rem; margin-bottom:3rem;">
    <div class="col-12 text-center">
        <h2>Want to add another moment?</h2>
        <a class="btn btn-success" href="addmoment.php">Then click here to add one</a>
    </div>
</div>