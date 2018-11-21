<div class="footer">
    
    <div class="credits">
    <ul id="menu">
              
  
        <li><?php
        wp_nav_menu( 
            array(
                
                'theme_location'    => 'footer',
                'menu_class'        => 'nav ',
            )
        );
        ?></li>
        
        


        
      </ul>  
    </div>

    <h2 style="font-family: Cambria,Georgia,serif;  font-size:15px" >c 2018 Bumidatar</h2>
    <h2 style="font-family: Cambria,Georgia,serif; font-size:15px">c 2018 Tahu bulat</h2>
  </div>

</div>


    </div>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);
    
    function plusDivs(n) {
      showDivs(slideIndex += n);
    }
    
    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
      }
      x[slideIndex-1].style.display = "block";  
    }
    </script>

    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</body>

</html>