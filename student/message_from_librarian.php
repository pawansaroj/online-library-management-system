<?php
session_start();
if(!isset($_SESSION['username']))
{
  header('location:login.php');
}
include "header.php";
include "connection.php";
$sql = "update messages set read1='y' where dusername='$_SESSION[username]'";
$conn->query($sql);
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
                                <h2>Message from Liberarian</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <!-- Add content to the page ... -->
<table class="table table-bordered">
<th>full name</th>
<th>title</th>
<th>message</th>

                          <?php
                          $sql= "select * from messages where dusername='$_SESSION[username]' order by id desc";
                          $result=$conn->query($sql);
                          while($row=$result->fetch_array())
                          {
                            $sql1= "select * from librarian_registration where username='$row[susername]'";
                            $result=$conn->query($sql1);
                            while($row1=$result->fetch_array())
                            {
                              $fullname=$row1['firstname']." ".$row1['lastname'];
                            }

                            echo "<tr>";
                            echo "<td>";echo $fullname; echo "</td>";
                              echo "<td>";echo $row['title']; echo "</td>";
                              echo "<td>";echo $row['msg']; echo "</td>";

                            echo "</tr>";
                          }

                          ?>
                          </table>
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
