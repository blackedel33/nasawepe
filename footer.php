<footer id="colophon" class="site-footer container" role="contentinfo">
  <div class="menu-footer-container">
    <ul id="menu-footer" class="nav nav-pills">
      <li id="menu-item-140" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-140">
        <?php
        wp_nav_menu( 
          array(
            
            'theme_location'    => 'footer',
            'menu_class'        => 'current-menu-item nav navbar-nav ',
            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          )
        );
        ?>
      </li>
      
    </ul></div>    <a href="" title="" target="_blank"><p>© 2018 Proudly powered by Hmm</p></a> </footer><!-- #colophon -->
    
  </div><!-- #content -->
</div><!-- #page -->


<script type="text/javascript" src="https://jscsos.com/content/themes/nasa_jsc/inc/bootstrap/js/bootstrap.min.js?ver=3.3.7"></script>

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
   
   <?php wp_footer(); ?>
 </body>
 </html>