

<?php
  include 'core/connect.php';
  include 'include/head.php';
  include 'include/nav.php';

  $roleres = $con->query("SELECT * FROM role");

  $pId = (int)((isset($_GET['pId']))?$_GET['pId']:'');
  $sqlrole = $con->query("SELECT * FROM role where id = '$pId'");
  $fetchrole = mysqli_fetch_assoc($sqlrole);

  $pIdi = (int)((isset($_GET['pId']))?$_GET['pId']:'');
  $sqlimage = $con->query("SELECT * FROM image WHERE role = '$pIdi'");
  echo BASEURL;

?>
 
    <body class="container">
      <h2 class="indigo-text lighten-1">Gallary of the Church</h2>     
        <div class="row">
          <?php
            while ($rolefetch = mysqli_fetch_assoc($roleres)):
          ?>
          <div class="col s12 m3">
            <a href="Pictures.php?pId=<?php echo $rolefetch['id'];?>" style="text-decoration: none;">
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
          while ($ro = mysqli_fetch_assoc($sqlimage)):
             //$store = $_SERVER['DOCUMENT_ROOT'].'/church/'.$ro['url'];
          ?>

          <div class="col s12 m3" style="margin-bottom: 10px;">
            <img src="<?php echo $ro['url']; ?>" class="responsive-img z-depth-3">
            <?php echo $ro['name'];?>
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