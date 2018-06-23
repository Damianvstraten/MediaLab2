<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "medialab2";

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$image = '';


$directory = "uploads/";
if (file_exists($directory)) {
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));
    $image = reset($scanned_directory);
}

$coffee = $_POST['coffee'];
$tea = $_POST['tea'];
$date = date("Y/m/d");

$sql = "INSERT INTO Orders (Image, Coffee, Tea, date) VALUES ('$image','$coffee', '$tea', '$date')";

$result = mysqli_query($connection, $sql);

if($result === true) {
    rename('uploads/' . $image, 'booth_images/' . $image);
};
