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
                                <h2>Issue Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <!-- Add content to the page ... -->
                              <!-- <input type="text" name="t1" placeholder="Search book here" class="form-control"/> -->
                              <form name="form1" action="" method="post"/>
                                  <table>
                                      <tr>
                                          <td>
                                            <select name="enr"class="form-control" selectpicker>

                                            <?php
                                           $sql = "select enrollment from student_registration";
                                           $result= $conn->query($sql);
                                           while($row=$result->fetch_array())
                                           {
                                            echo "<option>";
                                            echo  $row["enrollment"];
                                            echo "</option>";
                                           }
                                            ?>
                                            </select>
                                          </td>
                                          <td>
                                          <input type="submit" name="submit1" value="search books" class="btn btn-default"/>

                                          </td>
                                      </tr>
                                  </table>

                              <?php
                                if(isset($_POST['submit1']))
                                {
                                  $sql2 = "select * from student_registration where enrollment='$_POST[enr]'";
                                  $result= $conn->query($sql2);
                                  while($row2=$result->fetch_array())
                                  {
                                    $firstname = $row2["firstname"];
                                    $lastname = $row2["lastname"];
                                    $username1 = $row2["username"];
                                    $email = $row2["email"];
                                    $contact = $row2["contact"];
                                    $sem = $row2["sem"];
                                    $enrollment = $row2["enrollment"];
                                    $_SESSION['enrollment']=$enrollment;
                                    $_SESSION['susername']=$username1;



                                  }
                                  ?>
                                  <table class="table table-bordered">
                                      <tr>
                                             <td><input type="text" class="form-control" value="<?php echo "$enrollment"?>" name="enrollment" placeholder="enrollment no" required="" disabled></td>
                                      </tr>
                                      <tr>
                                             <td><input type="text" class="form-control" value="<?php echo $firstname.' '.$lastname; ?>" name="studentname" placeholder="student name" required="" ></td>
                                      </tr>
                                      <tr>
                                             <td><input type="text" class="form-control" value="<?php echo "$sem"?>"name="studentsem" placeholder="student sem" required="" ></td>
                                      </tr>
                                      <tr>
                                             <td><input type="text" class="form-control" value="<?php echo "$contact"?>"name="studentcontact" placeholder="student contact" required="" ></td>
                                      </tr>
                                      <tr>
                                             <td><input type="text" class="form-control" value="<?php echo "$email"?>"name="studentemail" placeholder="student email" required="" ></td>
                                      </tr>
                                      <tr>
                                        <td>
                                            <select name="booksname" class="form-control selectpicker">
                                              <?php
                                                $sql= "select books_name from add_books";
                                                $result= $conn->query($sql);
                                                while($row=$result->fetch_array())
                                                {
                                                  echo "<option>";
                                                  echo  $row["books_name"];
                                                  echo "</option>";

                                                }
                                              ?>
                                            </select>
                                        </td>
                                      </tr>
                                      <tr>
                                             <td><input type="text" class="form-control" name="booksissuedate" value="<?php echo date("d-M-y");?>"placeholder="books issue date" required="" ></td>
                                      </tr>


                                      <tr>
                                             <td><input type="text" class="form-control" value="<?php echo "$username1";?>" name="susername" placeholder="Student Username" required=""  disabled></td>
                                      </tr>
                                      <tr>
                                             <td><input type="submit" class="form-control btn btn-default" name="submit2" placeholder="Issue books" required="" ></td>
                                      </tr>
                                  </table>
                             <?php
                                }
                              ?>

                          </form>
                          <?php
                           if(isset($_POST['submit2']))
                           {
                             $qty=0;
                             $sql3= "select * from add_books where books_name='$_POST[booksname]'";
                             $result= $conn->query($sql3);
                             while($row=$result->fetch_array())
                             {
                               $qty= $row["available_quantity"];
                             }
                             if($qty==0)
                             {
                               ?>
                               <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                 <strong style="">This book is not available</strong>
                               </div>
                               <?php
                             }
                             else {
                             $sql= "insert into issue_books values('',  '$_SESSION[enrollment]','".$_POST['studentname']."','".$_POST['studentsem']."','".$_POST['studentcontact']."','".$_POST['studentemail']."','".$_POST['booksname']."','".$_POST['booksissuedate']."','',  '  $_SESSION[susername]')";
                             $sql2= "UPDATE add_books SET available_quantity=available_quantity-1 WHERE books_name='$_POST[booksname]'";
                             $conn->query($sql2);
                             if($conn->query($sql)==TRUE)
                             {
                               ?>
                               <script type="text/javascript">
                               alert("Book issued successfully");
                               window.location.href = window.location.href;
                              </script>
<?php
                              }
                             }
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
