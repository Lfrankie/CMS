<?php include "includes/header.php" ?>

<div id="wrapper">
<?php include "includes/navigation.php"?>
    

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin 
                            <small>Author</small>
                        </h1>
                    <div class="col-xs-6">
                    <!-- Add categories Starts-->
                    <?php
                    if(isset($_POST['submit'])) {
                        $cat_title = $_POST['catName'];

                        if($cat_title == "" || empty($cat_title)) {
                            echo "<lable>This field should not be empty</lable>";
                        } else {

                        $query = "INSERT INTO categories (cat_title)";
                        $query .= "VALUES ('$cat_title')";
                        $result = mysqli_query($connection, $query);

                            if(!$result) {
                                die("QUERY FAILED" . mysqli_error());
                            } 
                        }
                    }
                    ?>
                        <form action="categories.php" method="post">
                           <div class="form-group">
                              <label for="catName">Add Category</label>
                               <input class="form-control" type="text" name="catName" id="catName">
                           </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                            
                        </form><!-- Add categories Ends-->
                        
                        
                        <?php 
                               if(isset($_GET['edit'])) {
                                   $cat_id = $_GET['edit'];
                                   
                                   include "includes/update_categories.php";
                               }
                               
                               
                               ?>

                    </div> 
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                </tr>
                            </thead>
                            <?php // show all categories query 
                            $query = "SELECT * FROM categories";
                            $show_all_categories = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($show_all_categories)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                
                                echo "<tr>
                                <td>{$cat_id}</td>
                                <td>{$cat_title}</td>
                                <td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>
                                <td><a href='categories.php?edit={$cat_id}'>EDIT</a></td>
                            </tr>";
                            }  
                            ?>
                            
                            <?php // delete category query
                            if(isset($_GET['delete'])) {
                                $del_cat_id = $_GET['delete'];
                                $query = "DELETE FROM categories WHERE cat_id = {$del_cat_id} ";
                                $delete_query = mysqli_query($connection, $query);
                                header("location: categories.php");
                                
                            }
                            ?>
                            
                        </table> 
                    </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  
   <?php include "includes/footer.php "?>