<?php
include "connection.php";
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $sql= "delete from add_books where id=$id";
  $conn->query($sql);
header('location:display_books.php');
}
else
{

header('location:display_books.php');



}
?>
