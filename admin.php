<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "medialab2";

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$orders = [];
$sql = "SELECT * FROM ORDERS";

if($result = mysqli_query($connection, $sql)) {
    while($row = mysqli_fetch_assoc($result)) {
        $row['date'] = date('d, F, Y');
        $orders[] = $row;
    }
}

?>
<!doctype html>
<html>
<head>
    <title></title>
    <meta name="description" content="text"/>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css"/>


</head>
<body>
<a href="index.php" class="admin"></a>
<div class="orders">
    <?php foreach ($orders as $order) {?>
        <div class="order">
            <div class="order-info">
                <span>IBIS Workbooth photo</span>
                <ul>
                    <li><?= $order['coffee'] ?> Coffee</li>
                    <li><?= $order['tea'] ?> Tea</li>
                    <li><img src="images/calendar.png"><?= $order['date'] ?> </li>
                </ul>
            </div>
            <div class="image"><img src="booth_images/<?= $order['image'] ?>"></div>
        </div>


    <?php } ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</body>
</html>
    