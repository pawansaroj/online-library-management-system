<?php
session_start();
if(!isset($_SESSION['librarian']))
{
  header('location:login.php');
}
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
                                <h2>Display Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <!-- Add content to the page ... -->

                    <form name="form1" action="" method="post"/>
                   <input type="text" name="t1" placeholder="Search book here" class="form-control"/>
                   <input type="submit" name="submit1" value="search books" class="btn btn-default"/>
                    </form>



                                <?php
                                if(isset($_POST['submit1']))
                                {
                                  $sql= "SELECT * from add_books WHERE books_name like('$_POST[t1]%')";
                                  $result= $conn->query($sql);
                                  echo "<table class='table table-bordered'>";
                                  echo "<tr>";
                                  echo "<th>"; echo "book name"; echo "</th>";
                                  echo "<th>"; echo "book image"; echo "</th>";
                                  echo "<th>"; echo "author name"; echo "</th>";
                                  echo "<th>"; echo "publication"; echo "</th>";
                                  echo "<th>"; echo "purchase date"; echo "</th>";
                                  echo "<th>"; echo "book price"; echo "</th>";
                                  echo "<th>"; echo "book quantity"; echo "</th>";
                                  echo "<th>"; echo "available quantity"; echo "</th>";
                                        echo "<th>"; echo "Delete Books"; echo "</th>";


                                  echo "</tr>";
                                  while($row=$result->fetch_array()) {
                                                  echo "<tr>";
                                                  echo "<td>"; echo $row["books_name"]; echo "</td>";
                                                  echo "<td>"; ?><img src="<?php echo $row["books_image"];?>" width="100" height="100"><?php echo "</td>";
                                                  echo "<td>"; echo $row["books_author_name"]; echo "</td>";
                                                  echo "<td>"; echo $row["books_publication_name"]; echo "</td>";
                                                  echo "<td>"; echo $row["books_purchase_date"]; echo "</td>";
                                                  echo "<td>"; echo $row["books_price"]; echo "</td>";
                                                  echo "<td>"; echo $row["books_quantity"]; echo "</td>";
                                                  echo "<td>"; echo $row["available_quantity"]; echo "</td>";
                                                  echo "<td>"; ?><a href="delete_books.php?id=<?php echo $row["id"];?>">Delete book</a><?php echo "</td>";

                                                echo "</tr>";
                                               }
                                                  echo "</table>";
                                }
                          else{
                          $sql= "SELECT * from add_books";
                          $result= $conn->query($sql);
                          echo "<table class='table table-bordered'>";
                          echo "<tr>";
                          echo "<th>"; echo "book name"; echo "</th>";
                          echo "<th>"; echo "book image"; echo "</th>";
                          echo "<th>"; echo "author name"; echo "</th>";
                          echo "<th>"; echo "publication"; echo "</th>";
                          echo "<th>"; echo "purchase date"; echo "</th>";
                          echo "<th>"; echo "book price"; echo "</th>";
                          echo "<th>"; echo "book quantity"; echo "</th>";
                          echo "<th>"; echo "available quantity"; echo "</th>";
                          echo "<th>"; echo "Delete Books"; echo "</th>";


                          echo "</tr>";
                          while($row=$result->fetch_array()) {
                                          echo "<tr>";
                                          echo "<td>"; echo $row["books_name"]; echo "</td>";
                                          echo "<td>"; ?><img src="<?php echo $row["books_image"];?>" width="100" height="100"><?php echo "</td>";
                                          echo "<td>"; echo $row["books_author_name"]; echo "</td>";
                                          echo "<td>"; echo $row["books_publication_name"]; echo "</td>";
                                          echo "<td>"; echo $row["books_purchase_date"]; echo "</td>";
                                          echo "<td>"; echo $row["books_price"]; echo "</td>";
                                          echo "<td>"; echo $row["books_quantity"]; echo "</td>";
                                          echo "<td>"; echo $row["available_quantity"]; echo "</td>";
                   echo "<td>"; ?><a href="delete_books.php?id=<?php echo $row["id"];?>">Delete book</a><?php echo "</td>";
                                        echo "</tr>";
                                       }
                                          echo "</table>";
                                   }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


<?php
include "footer.php";
?>
