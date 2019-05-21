<?php
session_start();
include "header.php";
include "connection.php";

?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <!-- Add content to the page ... -->
                            <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                              <table class="table table-bordered">
                                  <tr>
                                         <td><input type="text" class="form-control" name="bookname" placeholder="Add_books" required=""></td>
                                  </tr>
                                  <tr>
                                        <td> Add Book Image
                                         <input type="file"  name="f1" required=""></td>
                                  </tr>
                                  <tr>
                                         <td><input type="text" class="form-control" placeholder="books author name" name="bauthorname" required=""></td>
                                  </tr>
                                  <tr>
                                         <td><input type="text" class="form-control" placeholder="books publication name" name="bpublicationname" required=""></td>
                                  </tr>
                                  <tr>
                                         <td><input type="text" class="form-control" placeholder="books purchased date" name="bpurchasedt" required=""></td>
                                  </tr>
                                  <tr>
                                         <td><input type="text" class="form-control" placeholder="books price" name="bprice" required=""></td>
                                  </tr>
                                  <tr>
                                         <td><input type="text" class="form-control" placeholder="books quantity" name="bquantity" required=""></td>
                                  </tr>
                                  <tr>
                                         <td><input type="text" class="form-control" placeholder="books available quantity" name="aquantity" required=""></td>
                                  </tr>
                                  <tr>
                                         <td><input type="submit" name="submit1" class="btn btn-default submit" value="insert book"></td>
                                  </tr>
                              </table>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php
if(isset($_POST['submit1'])){
  $tm=md5(time());
  $fnm=$_FILES['f1']['name'];
// $tmp_images=$_FILES['f1']['tmp_name'];
$dst="./books_image/".$tm.$fnm;
$dst1="books_image/".$tm.$fnm;
move_uploaded_file($_FILES['f1']['tmp_name'],$dst);
    // move_uploaded_file($tmp_images,"./books_image/".$fnm);

$sql= "INSERT INTO add_books(books_name,books_image,books_author_name,books_publication_name,books_purchase_date,books_price,books_quantity,available_quantity,librarian_username) VALUES ('".$_POST['bookname']."','$dst1','".$_POST['bauthorname']."','".$_POST['bpublicationname']."','".$_POST['bpurchasedt']."','".$_POST['bprice']."','".$_POST['bquantity']."','".$_POST['aquantity']."','".$_SESSION['librarian']."')";
$conn->query($sql);
?>
<script type="text/javascript">
alert("Book Successfully Inserted");

</script>

<?php
}


?>

<?php
include "footer.php";
?>
