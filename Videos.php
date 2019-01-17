

<?php
  include 'core/connect.php';
  include 'include/head.php';
  include 'include/nav.php';

  $roleres = $con->query("SELECT * FROM role");

  $pId = (int)((isset($_GET['pId']))?$_GET['pId']:'');
  $sqlrole = $con->query("SELECT * FROM role where id = '$pId'");
  $fetchrole = mysqli_fetch_assoc($sqlrole);

  $pIdi = (int)((isset($_GET['pId']))?$_GET['pId']:'');
  $sqlVideo = $con->query("SELECT * FROM video WHERE role = '$pIdi'");

?>
 
    <body class="container">
      <h2 class="indigo-text lighten-1">Gallary of the Church</h2>     
        <div class="row">
          <?php
            while ($rolefetch = mysqli_fetch_assoc($roleres)):
          ?>
          <div class="col s12 m3">
            <a href="Videos.php?pId=<?php echo $rolefetch['id'];?>" style="text-decoration: none;">
              <img class="circle responsive-img z-depth-5" src="upload/images/l1.jpg">
              <h5 class="text-center"><?php echo $rolefetch['name'];?></h5>
            </a> 
          </div>
          <?php
            endwhile;
          ?>
          <div class="col s12 m3">
            <a href="" style="text-decoration: none;">
              <img class="circle responsive-img z-depth-5" src="upload/images/l1.jpg">
              <h5 class="text-center">Young Adults</h5>
            </a>
          </div>

        </div><hr>

 
        <div class="row">
          <h2 class="indigo-text lighten-1 text-center"><?php echo $fetchrole['name']; ?></h2>          
        </div>

        <div class="row">
         <?php
          while ($ro = mysqli_fetch_assoc($sqlVideo)):
          ?>

          <div class="col s12 m3 z-depth-3" style="margin-bottom: 10px;">
             <!-- <embed src = "<?= $ro['url'] ?>"></embed><br/> -->
              <video width='320' height='240' controls>
                <source src='<?= $ro['url'] ?>' type='video/mp4'>  
                <!-- <source src='videos/rise.ogg' type='video/ogg'>        -->

                  Your browser does not support the video tag.
              </video><br/>
            <div class="indigo darken-2 white-text"><?php echo $ro['name'];?></div>
          </div>

        <?php
          endwhile;
        ?>
        </div>

        <?php
          include 'include/footer.php';
        ?>
    </body>
  </html