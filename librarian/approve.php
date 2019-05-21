<?php
include "connection.php";

$id=$_GET['id'];

$sql= "UPDATE student_registration SET status='yes' WHERE id=$id";
if($conn->query($sql))
{
header('location:display_student_info.php');
}
?>
