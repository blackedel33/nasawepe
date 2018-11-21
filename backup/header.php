<?php wp_head(); ?>
<html>
<head>

<title>Praktek Coyyy</title>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>

  <div class="center-div">
  
    <div class="header header_bg">
      <span style='float:left;'><img src="https://cdn.shopify.com/s/files/1/0192/1088/products/i4551-Nasa-with-Vector-Back-Patch_caabe0e7-9c39-408a-9e83-daa8ea0317bb_1024x1024.png?v=1526097543" width="100" height="100"></span>
      <h1 style="font-family: Cambria,Georgia,serif; color: white">JSC MANAGEMENT</h1>
      <p>Tahuuu</p>

<!-- navbar -->
       <div class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-light">
     
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <?php
        wp_nav_menu( 
            array(
                
                'theme_location'    => 'primary_menu',
                
                
                'menu_class'        => 'navbar navbar-nav ',
                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            )
        );
        ?>
      </div>
    </nav>
  </div>
    </div>


    

  


  
 


    