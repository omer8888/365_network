<?php
    $con= mysqli_connect("localhost","root","","365_db");
    if(mysqli_connect_errno()){
        echo "db connction error" . mysqli_connect_errno();
    }
    $name='omer';
    $query= mysqli_query($con,"INSERT INTO test VALUES ('', '{$name}')");

    echo "Hello from 365";

?>

<html>
<head>
    <title>365 Network</title>
</head>
<body>

</body>
</html>
