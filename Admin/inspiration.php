

<?php
  require_once '../core/connect.php';
  include 'include/head.php';   
  include '../function.php';   
  include 'include/nav.php';
         

  $errors =array(); 

  $inspSql ="SELECT * from inspire";
  $InspRun = $con->query($inspSql);
  $resInspire = mysqli_fetch_assoc($InspRun);
  //$count = $conts = mysqli_num_rows($InspRun);
  $imgid = $resInspire['imgid'];



  $images = "select * from image where id ='$imgid'";
  $runimag = $con->query($images);        

  $video = "SELECT * FROM video";
  $runvideo = $con->query($video);    

    
  if(isset($_GET['ImgInspireId'])){ //delete image from inspire
    $IMageDelete = isset($_GET['ImgInspireId']);
    //((isset($_GET['ImgInspireId']))?isset($_GET['ImgInspireId']):'');
    echo $IMageDelete; 
    $sqlvdelete = "DELETE FROM `inspire` WHERE id ='$IMageDelete'";
    $resviddelete = $con->query($sqlvdelete);
  } 

  if(isset($_GET['VideoDelete'])){ //delete video from inspire
    echo $IMageDelete = $_GET['IMageDelete'];
    //$sqlvdelete = "DELETE FROM `inspire` WHERE imgid ='$IMageDelete'";
    $resviddelete = $con->query($sqlvdelete);
    redirectIspire();
  }

  if (isset($_POST['insert'])) {
      
      $imageId =  ((isset($_POST['imageId']) && isset($_POST['imageId']) != '')?$_POST['imageId']:'');
      $videoId =  ((isset($_POST['videoId']) && isset($_POST['videoId']) != '')?$_POST['videoId']:'');
      $type =  ((isset($_POST['type']) && isset($_POST['type']) != '')?$_POST['type']:'');

        $ExistSql ="SELECT * from inspire WHERE imgid = '$imageId' ||  vid ='videoId'";
        $ExistRun = $con->query($ExistSql);
        $Existfetch = mysqli_fetch_assoc($ExistRun);
        $Existcount = mysqli_num_rows($ExistRun);

       
    /* if($imageId==''){
        $errors[] .= "Please select a image!";
     }

     if($videoId==''){
        $errors[] .= "Please select a video!";
     }
     if($type==''){
        $errors[] .= "Please enter type!";
     }
    */
      if ($Existcount > 0) {
           $errors[] .= $imageId.' And '.$videoId.' And '.$type.' already exist!'; 
        } 
        

    if(!empty(display_errors($errors))){        

        $runInspire = $con->query("INSERT INTO `inspire`(`type`, `imgid`, `vid`) 
                                          VALUES ('$type','$imageId','$videoId')");
          echo '<div class="bg-success"> hallo</div>';
           redirectIspire();

    }
  }     
?>
    <body class="container">

        <div class="row">
          <div class="col s12 offset-m4 m6">
            <h2 class="indigo-text lighten-1 text-center">Inspiration</h2>
          </div>
        </div>

        <div class="row">
          <div class="col s12 m4">
              <?php
                echo display_errors($errors);                
              ?>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m4" style="border-radius: 25px; border: 2px solid; color: #6f00ff;">

             <form action="Inspiration.php" method="post" enctype="multipart/form-data">
              <div class="form-group col m12">
                <label for="imageId">Select a image</label>
                <select name="imageId" class="form-control" id="imageId">    
                              
                  <option value="">Select  image</option>

                  <?php 
                      $images = "select * from image";
                         $runimag = $con->query($images); 
                  while($rowimg = mysqli_fetch_assoc($runimag)):?>
                  <option value="<?php echo $rowimg['id'];?>"><?php echo $rowimg['name'];?></option>
                  <?php endwhile;?>
                </select>     

           
              </div>

              <div class="form-group col m12">
                <label for="videoId">Select a Video</label>
                <select name="videoId" class="form-control" id="videoId">                  
                  <option value="">Select Video</option>

                  <?php while($rowvideo = mysqli_fetch_assoc($runvideo)):?>
                  <option value="<?php echo $rowvideo['id'];?>"><?php echo $rowvideo['name'];?></option>
                  <?php endwhile;?>

                </select>                
              </div>
              <div class="input-field col m9">
                <input type="text" name="type" id="type" placeholder="Verses, Poem, Motivation">
                <label for="type">Type</label>
              </div>
              <div class="input-field col m12 offset-m7">   
                <input type="submit" name="insert" value="Insert" class="btn-small wave-effect wave-dark">
              </div>
            </form>
          </div>
          <?php  if(!isset($_GET['change'])==1):?>
          <div class="col s12 offset-m2 m5">
            <div class="col s12 m12 text-center">
                  <h5 class="indigo-text">Images</h5>
            </div>
            <div class="col s12 m12">
              <table class="table table-bordered table-striped table-lutho table-condensed">
              <thead>
                <th>Edite</th><th>Type</th><th>Group</th><th>Image</th><th>Description</th><th>Romove</th>
              </thead>
              <tbody>

                   <?php 
                        
                   while($rowimgs = mysqli_fetch_assoc($InspRun)):

                        $imgrowId = $rowimgs['imgid'];
                        $rId =  $rowimgs['id'];

                        $imgsql = "select * from image where id = '$imgrowId'";
                        $imgrun = $con->query($imgsql); 
                        $fetch =  mysqli_fetch_assoc($imgrun); ///while i think
                        $fetch1 = $fetch['role'];

                        $sqlrole = "SELECT * FROM role where id ='$fetch1'";
                        $runrole = $con->query($sqlrole); 
                        $resrole = mysqli_fetch_assoc($runrole);

                    ?>

                <tr>
                    <td> 
                      <a href="#terms" class="btn blue waves-effect waves-light modal-trigger">
                      <i class="material-icons">visibility</i></a>
                    </td>

                    <td><?php echo $rowimgs['type'];?></td>
                    <td><?php echo $resrole['name'];?></td> 
                    <td><img class="circle responsive-img" src="<?php echo $fetch['url'];?>"></td>
                    <td><?php echo $fetch['descip'];?></td>

                    <td>
                      <a href="Inspiration.php?ImgInspireId=<?php echo $rowimgs['id'];?>" class="btn red waves-effect waves-light">
                      <i class="material-icons">clear</i></a>
                    </td>
                </tr>
                <?php                       
                      endwhile;?>
              </tbody>
            </table>
            </div>
            <div class="row">
              <div class="col s12 m4">
                <a href="Inspiration.php?change=1"class="btn-small wave-effect wave-dark" style="text-decoration: none;">
                                      <span>Videos</span><i class="material-icons right">visibility</i></a>
              </div>
            </div>

          </div>
        <?php  endif; 
        if(!isset($_GET['change2'])==1):
          ?>

          <div class="col s12 offset-m2 m5">
            <div class="col s12 m12 text-center">
                  <h5 class="indigo-text">Videos</h5>
            </div>
            <div class="col s12 m12">
              <table class="table table-bordered table-striped table-lutho table-condensed">
              <thead>
                <th>Edite</th><th>Type</th><th>Group</th><th>Description</th><th>Romove</th>
              </thead>
              <tbody>
                   <?php 
                        
                   while($rowimgs = mysqli_fetch_assoc($InspRun)):

                        $imgrowId = $rowimgs['vid'];
                        $rId =  $rowimgs['id'];

                        $imgsql = "select * from video where id = '$imgrowId'";
                        $imgrun = $con->query($imgsql); 
                        $fetch =  mysqli_fetch_assoc($imgrun); ///while i think
                        $fetch1 = $fetch['role'];

                        $sqlrole = "SELECT * FROM role where id ='$fetch1'";
                        $runrole = $con->query($sqlrole); 
                        $resrole = mysqli_fetch_assoc($runrole);
                    ?>

                <tr>
                    <td> <a href="#terms" 
                      class="btn blue waves-effect waves-light    modal-trigger">
                      <i class="material-icons">visibility</i></a>
                    </td>
                    <td><?php echo $rowimgs['type'];?></td>
                    <td><?php echo $resrole['name'];?></td> 
                    <td><?php echo $fetch['descip'];?></td>
                    <td> 
                       <form action="inspiration.php" action="POST">
                        <input type="hidden" name="id" value="<?php echo $rId;?>">
                        <button class="btn red waves-effect waves-light"><i class="material-icons">clear</i></button>
                     </form>
                    </td>
                </tr>
                <?php                       
                      endwhile;?>
              </tbody>
            </table>
            </div>
            <div class="row">
              <div class="col s12 m4">
                <a href="Inspiration.php?change2=1"class="btn-small wave-effect wave-dark" style="text-decoration: none;">
                                      <span>Images</span><i class="material-icons right">visibility</i></a>
              </div>
            </div>
          </div>
        <?php endif;?>

          <?php
            modal();
          ?>

    </div>

    <?php
      include 'include/footer.php';
    ?>
  </body>
</html