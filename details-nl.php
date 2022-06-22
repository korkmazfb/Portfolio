<?php
require 'functions.php';
$connection = dbConnect();

if( !isset($_GET['id']) ){
    echo "de ID is niet gezet";
    exit;
}

$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if($check_int == false){
    echo "dit is geen getal (integer)";
    exit;
}

$statement = $connection->prepare('SELECT * FROM `projecten-nederlands` WHERE id=?');
$params = [$id];
$statement->execute($params);
$place = $statement->fetch(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="detail_body">
<header id="header">
      <nav class="nav">
        <img src="img/logo.webp" alt="logo" />
        <ul>
          <li><a href="nl.php">HOME</a></li>
        </ul>
      </nav>
    </header>

    <div class="container">
        <h1 class="header2"><?php echo $place['titel']?></h1>
        <figure><img src="img/<?php echo $place['foto']?>" alt="" width="700px" height="500px"></figure>
        <p class="p"><?php echo $place['info']?></p>

    </div>
    
</body>
</html>