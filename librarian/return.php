<?php
include "connection.php";

$id=$_GET['id'];
$a =date("d-M-y");
$sql= "UPDATE issue_books SET books_return_date='$a' where id=$id";
$conn->query($sql);

$books_name="";
$sql2= "SELECT * from issue_books where id='$id'";
$result=$conn->query($sql2);
while($row=$result->fetch_array())
{
  $books_name=$row['books_name'];
  $sql3="UPDATE add_books SET available_quantity=available_quantity+1 WHERE books_name='$books_name'";
  $conn->query($sql3);
}

?>
<script type="text/javascript">

window.location="return_book.php";
</script>
