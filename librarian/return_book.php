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
                                <h2>Return Book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <!-- Add content to the page ... -->
                                <form name="form1" action="" method="post"/>
                              <table class="table table-bordered">
                                 <tr>
                                    <td>
                                       <select name="enr"  class="form-control">
                                      <?php
                                      $sql = "select student_enrollment from issue_books where books_return_date=''";
                                      $result= $conn->query($sql);
                                      while($row=$result->fetch_array())
                                      {
                                       echo "<option>";
                                       echo  $row["student_enrollment"];
                                       echo "</option>";
                                     }
                                      ?>
                                       </select>
                                    </td>
                                    <td>
                                    <input type="submit" name="submit1" value="search" class="form-control"/>

                                    </td>
                                </tr>
                              </table>

                              <?php
                                  if(isset($_POST['submit1']))
                                  {

                                                                          echo "<table class='table table-bordered'>";
                                                                          echo "<tr>";
                                                                          echo "<th>"; echo "student enrollment"; echo "</th>";
                                                                          echo "<th>"; echo "student name"; echo "</th>";
                                                                          echo "<th>"; echo "student sem"; echo "</th>";
                                                                          echo "<th>"; echo "student contact"; echo "</th>";
                                                                          echo "<th>"; echo "student email"; echo "</th>";
                                                                          echo "<th>"; echo "books name"; echo "</th>";
                                                                          echo "<th>"; echo "books issue date"; echo "</th>";
                                                                          echo "<th>"; echo "Return Books"; echo "</th>";

                                                                          echo "</tr>";


                                    $sql2 = "select * from issue_books where student_enrollment='$_POST[enr]'";
                                    $result= $conn->query($sql2);

                                      while($row2=$result->fetch_array())
                                      {
                                        echo "<td>"; echo $row2["student_enrollment"]; echo "</td>";
                                        echo "<td>"; echo $row2["student_name"]; echo "</td>";
                                        echo "<td>"; echo $row2["student_sem"]; echo "</td>";
                                        echo "<td>"; echo $row2["student_contact"]; echo "</td>";
                                        echo "<td>"; echo $row2["student_email"]; echo "</td>";
                                        echo "<td>"; echo $row2["books_name"]; echo "</td>";
                                        echo "<td>"; echo $row2["books_issue_date"]; echo "</td>";
                                        echo "<td>"; ?> <a href="return.php?id=<?php echo $row2["id"];?>">return books</a><?php echo "</td>";

                                      }

                                  }
                              ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


<?php
include "footer.php";
?>
