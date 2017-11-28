<?php
include("db.php");
if( isset($_POST['id'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sql = "UPDATE employee SET fname='$fname', lname='$lname' WHERE employee_id = '$id'";
    pg_query($sql);
}
print_r($_GET);
print_r($_POST);
?>
