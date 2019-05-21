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
                                <h2>Send Notification to Student</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <!-- Add content to the page ... -->
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                  <table class="table table-bordered">
                                      <tr>
                                        <td>
                                          <select class="form-control" name="dusername">
                                            <?php
                                            $sql= "select * from student_registration";
                                            $result=$conn->query($sql);
                                            while($row=$result->fetch_array())
                                            {
                                              ?> <option value="<?php echo $row['username']?>">
                                                <?php echo $row['username']."(". $row["enrollment"].")";?>
                                                 </option>
                                                <?php
                                            }
                                            ?>
                                          </select>
                                        </td>
                                      </tr>
                                      <tr>
                                      <td>  <input type="text" name="title" class="form-control" placeholder="Enter Title"> </td>
                                      </tr>
                                      <tr>
                                      <td> Message: <br><textarea name="msg" class="form-control"></textarea> </td>
                                      </tr>
                                      <tr>
                                        <td><input type="submit" name="submit1" class="form-control btn btn-default"></td>
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
                                                      echo $_SESSION['librarian'];

                                                      if(isset($_POST['submit1']))
                                                      {

                                                        $sql= "insert into messages values('','$_SESSION[librarian]','$_POST[dusername]','$_POST[title]','$_POST[msg]','n')";
                                                        $conn->query($sql);
                                                        ?>
                                                        <script type="text/javascript">
                                                        alert('message send successfully');
                                                        </script>
                                        <?php
                                      }
                                      ?>
<?php
include "footer.php";
?>
