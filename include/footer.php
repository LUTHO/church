
  <!--footer-->
  <div class="page-footer indigo darken-4 scrollspy" id="footerid" style="padding-bottom: 10px;">
    <div class="container">
      <div class="row">
        <div class="col s12 l4">
          <h5>Campany Address</h5>
          <table>
            <tr>
              <td>Address:</td>
              <td>D254 uMlazi</td>
              
            </tr>
            <tr><td><td>Mapapa Mthiyane Street</td></tr>
            <tr><td><td>4066</td></tr>
            <tr><td>Email:</td><td>mpume@gmail.com</td></tr>
            <tr><td>Phone Number:</td><td>(+27)633 32347</td></tr>
          </table>
        </div>
        <div class="col s12 l6 offset-l2">
          <h5>Want Help</h5>
          <form action="index.php" method="post">
            <div class="input-field">
              <input type="email" name="email" id="email" required="">
              <label for="email">Email</label>
            </div>
            <div class="input-field">
              <textarea id="message" name="message" placeholder="How can we help you today..." class="materialize-textarea" required=""></textarea>
                   <label for="message">message</label>         
            </div>
            <div class="input-field">
              <input type="submit" name="send" value="Send" class="btn-large wave-effect wave-dark">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--footer-->


<script type="text/javascript" src="js/init.js"></script>

<script type="text/javascript" src="js/materialize.min.js"></script>

<script type="text/javascript" src="js/materialize.js"></script>

     <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/carousel.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/transition.js"></script>
   


<script type="text/javascript">
  $(document).ready(function(){
    $('sidenav').sidenav();
    $('.materialboxed').materialbox();
    $('.parallax').parallax();
    $('.scrollspy').scrollSpy();

     document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.carousel');
        var instances = M.Carousel.init(elems, options);
      });

      // Or with jQuery

      $(document).ready(function(){
        $('.carousel').carousel();
      });

      $(document).ready(function(){
          $('.show').modal();
      });




  })
</script>

