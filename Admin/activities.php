

<?php
  require_once '../core/connect.php';
  include 'include/head.php';   
  include '../function.php';   
  include 'include/nav.php';
         

  $errors =array(); 
  $rolesql = "select * from role";
  $resrole = $con->query($rolesql);        

  $watchsql = "SELECT * FROM image";
  $runwatch = $con->query($watchsql);     


  if(isset($_GET['VdeleteId'])){
    $vid = (int)$_GET['VdeleteId'];
    $sqlvdelete = "DELETE FROM `image` WHERE id ='$vid'";
    $resviddelete = $con->query($sqlvdelete);
    redirectImg();
  }     

  if (isset($_POST['add'])) {
      
      $roleidImg = $_POST['roleidImg'];
      $desc = $_POST['desc'];
      $file = $_FILES['file']['name'];

     if($roleidImg==''){
        $errors[] .= "Please select a Role!";
     }

     if($desc==''){
        $errors[] .= "Please add an Description!";
     }
     if($file==''){
        $errors[] .= "Please browse for a image!";
     }


    if(!empty(display_errors($errors))){
        
        uploadsImag($file,$roleidImg,$desc);
    }

     

  }

              
?>
 
    <body class="container">

        <div class="row">
          <div class="col s12 m2" style="margin-top: 10px;">
            <a href="videos.php"class="btn-small wave-effect wave-dark" style="text-decoration: none;">Go to Videos</a>
          </div>
          <div class="col s12 m9">
            <h2 class="indigo-text lighten-1 text-center">Images</h2>
          </div>
        </div>

        <div class="row">
          <div class="col s12 m6">
              <?php
                echo display_errors($errors);
              ?>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m4 ">

             <form action="activities.php" method="post" enctype="multipart/form-data">
              <div class="form-group col m12">
                <label for="roleidImg">Group for the image</label>
                <select name="roleidImg" class="form-control" id="roleidImg">                  
                  <option value="">Select a Group</option>

                  <?php while($run = mysqli_fetch_assoc($resrole)):?>
                  <option value="<?php echo $run['id'];?>"><?php echo $run['name'];?></option>
                  <?php endwhile;?>

                </select>                
              </div>
              <div class="input-field col m12">
                <label for="filefile">Image</label>
              </div>
              <div class="input-field col m12">
                <input type="file" name="file">
              </div>
              <div class="input-field col m12">
                <input type="text" name="desc" id="desc">
                <label for="desc">Description</label>
              </div>
              <div class="input-field col offset-m7 m3 ">
                <input type="submit" name="add" value="Add Image" class="btn-small wave-effect wave-dark">
              </div>
            </form>
          </div>
          <?php
            if(!isset($_GET['VwatchId'])):
          ?>
          <div class="col s12  offset-m2 m6 ">
             <table class="table table-bordered table-striped table-lutho table-condensed">
              <thead>
                <th>Watch</th><th>Group</th><th>Decription</th><th>Romove</th>
              </thead>
              <tbody>
                   <?php while($watch = mysqli_fetch_assoc($runwatch)):?>
                <tr>
                    <td> <a href="activities.php?VwatchId=<?php echo $watch['id'];?>" class="btn blue waves-effect waves-light">
                      <i class="material-icons">visibility</i></a>
                    </td>
                    <td><?php
                        $vid =  $watch['role'];
                        $resVideorole =  mysqli_query($con, "SELECT * FROM `image` WHERE role ='$vid'");
                        $runVRole = mysqli_fetch_assoc($resVideorole);

                        $Vrole = $runVRole['role'];
                        $resRole = mysqli_query($con,"select * from role where id = '$Vrole'");
                        $runRole = mysqli_fetch_assoc($resRole);
                     echo $runRole['name'];?></td>
                    <td><?php echo $watch['descip'];?></td>
                    <td> <a href="activities.php?VdeleteId=<?php echo $watch['id'];?>" class="btn red waves-effect waves-light">
                      <i class="material-icons">clear</i></a>
                    </td>
                </tr>
                <?php endwhile;?>
              </tbody>
            </table>
          </div>

          <?php
            else:
            
          ?>
           <div class="col s12 offset-m2 m3">
                <?php
                  $imageId = (int)$_GET['VwatchId'];
                  $imagsql = "SELECT * FROM image where id = '$imageId'";
                  $runwatch = $con->query($imagsql); 
                  $row = mysqli_fetch_assoc($runwatch);

                ?>
                    <img class="circle responsive-img z-depth-5" src="<?php echo $row['url']; ?>">
                    <p class="text-center"><?php echo $row['name'] ?></p>
                  
                </div>

                <div class="col s12 m12 push-m6">
                  <a href="activities.php">Back to activities</a>
                </div>
                 

          </div>

          <?php 
            endif;
          ?>
        </div>

        <?php
          include 'include/footer.php';
        ?>
    </body>
  </html