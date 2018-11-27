<?php wp_head(); ?>
<html lang="en-US"><head>
    <meta charset="UTF-8">
    
    <title>Johnson Space Center – JSC EMERGENCY MANAGEMENT</title>
    <link rel="shortcut icon" href="https://jscsos.com/content/plugins/jetty-ui/public/assets/favicon.ico?v=2"><link rel="dns-prefetch" href="//s.w.org">
    
    <style type="text/css">

    /* Sets width of entire accordion */
.topbaricons {
  max-width: 75%;
  margin: 0 auto;
  padding: 20px 0;
}

/* Sets width individual icon sections and floats them left */
.topicon {
  float: left;
  width: 33%;
}

/* Color of links inside the accordion */
.topicon a {
  color: #fff;
}

/* Entire style of the outer accordion */
.accordion {
    background-color: #E3F7FA;
    cursor: pointer;
    color: #000;
    font-family: Arial Rounded MT Bold;
    padding: 18px;
    border: 2px dashed #ccc;
    width: 100%;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

/* Keeps the accordion's color when in action */
button.accordion:hover {
    background-color: #E3F7FA;
}

/* Last but not least, sets the panel up which drops down */
.panel {
    padding: 0 18px;
    background-color: #791420;
    font-family: Arial Rounded MT Bold;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}

    /* caption coy */

    .wp-caption {
        position: relative;
        padding: 0;
        margin: 0;
    }
    .wp-caption img {
        display: block;
        max-width: 100%;
        height: auto;
    }
    .wp-caption:after {
        content: "";
        position: absolute;
        display: block;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0) linear-gradient(to bottom, rgba(0, 0, 0, 0) 0px, rgba(0, 0, 0, 0.6) 100%) repeat 0 0;
        z-index: 1;
    }
    .wp-caption-text {
        /*display: block;
        position: absolute;*/
        /*background-color :blue !important;*/
        /*width: 100%;
        color: #fff;*/
       /* left: 0;
        bottom: 0;
        top:  -5;*/
        /*border-radius: 50%;*/
      /*  width: 40px;
        height: 30px;*/

        /*padding: 1em;
        font-weight: 700;
        z-index: 2;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;*/
    }

    .badge-xbox-one, .badge-xbox, .badge-success {
    background-color: green;
    }


    .cap {
    text-transform: uppercase;
    width: 40px;
    height: 30px;
    top:  -5;
    left: 90%;
    bottom: 80%;
    font-size: 11px;
    font-weight: 400;
    padding: 8px 12px;
    border-radius: 30px;
    color: #fff;
    }


    #recentUpdatesCoy {
        display: inline-block;
    }

    #recentUpdatesCoy p {
        background-color: <?php echo get_theme_mod('recentUpdatesCoy'); ?>;
        border: 1px solid #E6E65C;
        border-radius: 8px;
        color: #000000;
        display: inline-block;
        font-size: 30px;
        padding: 5px;
    }

    #jrlw-accordian .accordion-toggle{
    cursor: pointer; 
    padding: 10px;
    border-radius: 10px;
    color: #ffffff;
    margin-bottom: 10px;
}

#jrlw-accordian .accordion-toggle:not(.jrlw-active){
  width: 85%;
}

#jrlw-accordian .fa-info-circle {
    float: right;
    margin-top: 3px;
    display: inline;
}

#jrlw-accordian .accordion-content {
    padding: 10px;
    margin-bottom: 10px;
    background-color: #efefef;
    overflow: hidden;
    display: none;
}



</style>




<link rel="stylesheet" id="nasa_jsc-bootstrap-css" href="https://jscsos.com/content/themes/nasa_jsc/inc/bootstrap/css/bootstrap.min.css?ver=4.9.6" type="text/css" media="all">
<link rel="stylesheet" id="nasa_jsc-bootstrap-theme-css" href="https://jscsos.com/content/themes/nasa_jsc/inc/bootstrap/css/bootstrap-theme.min.css?ver=4.9.6" type="text/css" media="all">

<link rel="stylesheet" id="nasa_jsc-font-awesome-css" href="https://jscsos.com/content/themes/nasa_jsc/inc/font-awesome/css/font-awesome.min.css?ver=4.9.6" type="text/css" media="all">

<link rel="stylesheet" id="nasa_jsc-style-css" href="https://jscsos.com/content/themes/nasa_jsc/style.css?ver=4.9.6" type="text/css" media="all">

<script type="text/javascript" src="https://jscsos.com/wp-includes/js/jquery/jquery.js?ver=1.12.4"></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



<style type="text/css">
</style>
<style type="text/css">
.header-section h1, .navbar-title a {
    color: #ecf2fa;
}   
</style>
<style type="text/css">
.site-title a,
.site-description {
    color: #ecf2fa;
}
</style>


</head>

<body class="home page-template page-template-template-homepage page-template-template-homepage-php page page-id-2 externalSite group-blog">
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
        <header id="masthead" class="site-header" role="banner">
            <div class="header-section container row">
                <div class="">
                    <div class="header-section-wrap hidden-xs">
                        <div class="header-section-lt ">
                            <img class="img-responsive" src="https://jscsos.com/content/themes/nasa_jsc/img/NASA-Logo.png">
                        </div>
                        <div class="header-section-rt">
                            <h1>JSC EMERGENCY MANAGEMENT</h1>
                        </div>
                    </div>
                </div>
                <nav id="site-navigation" class="main-nav navbar navbar-inverse" role="navigation">
                    <div class="container no-padding">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-nav" aria-expanded="false">
                                <span class="sr-only">Menu</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-wrap visible-xs">
                                <div class="navbar-logo">
                                    <a href="https://jscsos.com/"><img src="https://jscsos.com/content/themes/nasa_jsc/img/NASA-Logo.png" align="left" alt="logo" border="0"></a>
                                </div>
                                <div class="navbar-title">
                                    <a href="https://jscsos.com/">JSC EMERGENCY MANAGEMENT</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-collapse no-padding collapse" id="primary-nav" aria-expanded="false" style="height: 1px;">
                            <div class="menu-primary-container"><ul id="menu-primary" class="menu1 nav navbar-nav nav-with-js nav-menu" aria-expanded="false">
                                <li class="current-menu-item">
                                    <!-- <a href="/">Home</a> -->
                                </li>
                                
                                <li class="menu-item menu-item-type-post_type menu-item-object-page ">
                                    <?php
                                    wp_nav_menu( 
                                        array(

                                            'theme_location'    => 'primary_menu',
                                            
                //'level'             => 2,
                                            'menu_class'        => 'current-menu-item nav navbar-nav ',
                                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        )
                                    );
                                    ?>
                                </li>
                                
                                
                            </ul></div>         </div>
                        </div>
                    </nav><!-- #site-navigation -->
                </div>
            </header><!-- #masthead -->

            

            


            
            


            