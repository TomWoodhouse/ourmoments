<?php

    function OpenCon()
    {
        // $dbhost = "localhost";
        // $dbuser = "root";
        // $dbpass = "ManUtd07";
        // $db = "Our Moments";

        $dbhost = "db5009501952.hosting-data.io";
        $dbuser = "dbu115237";
        $dbpass = "ManUtd07!";
        $db = "dbs8058133";
        
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        
        return $conn;
    }
    
    function CloseCon($conn)
    {
        $conn -> close();
    }
   
?>