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
                                <h2>Book with details</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <!-- Add content to the page ... -->
                                <?php
                                $i=0;
                                $sql= "select * from add_books";
                                $result= $conn->query($sql);
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                  while($row=$result->fetch_array())
                                  {                                $i=$i+1;

                                    echo "<td>";
                                    ?><img src="../librarian/<?php echo $row["books_image"];?>" height="100" width="100"><?php
                                    echo "<br>";
                                    echo "<b>".$row["books_name"]."</b>";
                                    echo "<br>";
                                    echo "<b>"."Total Quantity :".$row["books_quantity"]."</b>";
                                    echo "<br>";
                                    echo "<b>"."available :".$row["available_quantity"]."</b>";
                                    echo "<br>";
                                    ?><a href="Student_record_of_this_book.php? books_name=<?php echo $row["books_name"];?>" style="color:red">Student record of this book</a><?php
                                      echo "</td>";

                                    if($i==5)
                                    {
                                      echo "</tr>";
                                      echo "<tr>";
                                      $i=0;
                                    }

                                  }
                                echo "</tr>";
                                echo "</table>";

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
