                        <form action="categories.php" method="post">
                           <div class="form-group">
                              <label for="catName">Update Category</label>
                        <?php // update category query
                            if(isset($_GET['edit'])) {
                                $edit_cat_id = $_GET['edit'];
                                $query = "SELECT * FROM categories WHERE cat_id = $edit_cat_id";
                                $select_edit_id_query = mysqli_query($connection, $query);
                                
                                while($row = mysqli_fetch_assoc($select_edit_id_query)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                            ?>
                        <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" class="form-control" type="text" name="catName" id="catName">

                        <?php    
                            }
                            }
                            ?>
                            
                            <?php 
                               if(isset($_POST['update'])) {
                                $cat_title = $_POST['cat_title'];
                                $query = "UPDATE FROM categories SET cat_title = '$cat_title' WHERE cat_id = {$cat_id} ";
                                $update_query = mysqli_query($connection, $query);                      
                                
                                   if(!$update_query) {
                                       die("QUERY FAILED" . mysqli_error());
                                   }
                               ?>
                           </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update" value="Update Category">
                            </div>
                            
                        </form>                            
                              
                                
                                  
                                    
                                      
                                        
                                          
                                            
                                              
                                                
                                                  
                                                    
                                                      
                                                        
                                                          
                                                            
                                                              
                                                                
                                                                  
                                                                    
                                                                      
                                                                        
                                                                          
                            