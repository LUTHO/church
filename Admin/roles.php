

<?php
/*
  require_once '../core/connect.php';
  include 'include/head.php';   
  include 'function.php';  
 include 'include/nav.php';
         

   if(isset($_POST['add'])){
                
    $name = $_POST['name'];    

    if($name == ''){

      echo "Please enter a Role";
    }else{
        $sql = "INSERT INTO `role`(`name`) VALUES ('$name')";
        $runrole = $con->query($sql);
        //$run = mysqli_query($con, $sql);
      
    }


  }

       */       
?>
 <!--
    <body class="container">


        <h2 class="indigo-text lighten-1 text-center">Images</h2>
        <div class="row">
          <div class="col s12 offset-m4 m4">
             <form action="roles.php" method="post">
              <div class="form-group col m12">
              <div class="input-field col m9">
                <input type="text" name="name" id="name" required="">
                <label for="name">name</label>
              </div>
              <div class="input-field col m3 ">
                <input type="submit" name="add" value="Add" class="btn-small wave-effect wave-dark">
              </div>
            </form>
          </div>

        </div>
        <div class="row">
            <div class="col s12 offset-m4 m4">

              <table class="table table-bordered table-striped table-lutho table-condensed">
              <thead>
                <th>Edite</th><th>Brand</th><th>Romove</th>
              </thead>
              <tbody>
                <?php
                    while ($ru = mysqli_fetch_assoc($runrole)):
                ?>
                <tr>
                    <td> <a href="roles.php?edite=<?php echo $ru['id'];?>" class="btn blue waves-effect waves-light">
                      <i class="material-icons">edite</i></a>
                    </td>
                    <td><?php echo $ru['name'];?></td>
                    <td> <a href="Roles.php?delete=<?php echo $ru['id'];?>" class="btn red waves-effect waves-light">
                      <i class="material-icons">remove</i></a>
                    </td>
                </tr>
                <?php
                  endwhile;
                ?>
              </tbody>
            </table>
            </div>
        </div>
       
        <?php
          include 'include/footer.php';
        ?>
    </body>
  </html


