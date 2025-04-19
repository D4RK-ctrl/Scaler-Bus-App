<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // import config file
        include("config.php");
        
        $query = "SELECT * FROM bus_schedule";
        $result = $conn->query($query);
        $result->fetch_assoc();
        foreach($result as $row){
            echo $row["driver"]." ".$row["source"]." ".$row["departure"]." ".$row["destination"]." ".$row["arrival"]." ".$row["status"];
            echo "<br>";
        }
        echo "Hello World";
        echo "<br>";
        echo "<h1>Sourabh</h1>";
        for($i=0;$i<5;$i++){
            echo $i;
        }
    ?>
</body>
</html>