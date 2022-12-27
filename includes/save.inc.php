<?php 
    include_once 'autoloader.inc.php';

    if(isset($_POST['submit'])){
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];

        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $up = new save($fileName, $fileTmpName, $fileSize, $fileError, $fileType);
        try {
         $up->validate();
         header("Location: http://127.0.0.1/php_oop/upd_oop_rev/?uploadsuccess");
 
        } catch (TypeError $e) {
 
         echo $e->getMessage();
 
        }
    }

?>