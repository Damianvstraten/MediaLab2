<?php
$target_dir = "uploads/";

$files = glob('uploads/*'); // get all file names
foreach ($files as $file) { // iterate files
    if (is_file($file))
        unlink($file); // delete file
}

if (!file_exists($target_dir)) {
    mkdir('uploads/', 0777, true);
}



$image = $_FILES['file'];
$target_file = $target_dir . $image['name'];
move_uploaded_file($image['tmp_name'], $target_file);


$directory = "uploads/";
if (file_exists($directory)) {
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));
    $firstimage = "uploads/" . reset($scanned_directory);

    echo $firstimage;
}
?>

