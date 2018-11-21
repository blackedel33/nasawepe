<?php
/**
 * The Sidebar area

 */
?>
<div id="secondary" class="col-md-4" role="complementary">
    <div class="widget-area">

     
    </div>
</div><!-- #secondary .widget-area -->

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4" >
            <h4 style="font-family: Cambria,Georgia,serif;">Additional information</h4>
            <p style="font-family: Cambria,Georgia,serif;">
                <!-- <ul class="list-group"> -->
                    
                    


                    <?php
        // wp_nav_menu( 
        //     array(     
        //         'theme_location'    => 'information',          
        //         'menu_class'        => 'list-group',                
        //     )
        // );


                    wp_nav_menu( 
                        array(
                            'theme_location'    => 'information',
                            'menu_class'        => 'list-group', 
                        )
                    );
                    ?>



                    
                    
                    

                    <!-- </ul> -->
                </p>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p><a href="https://www.accuweather.com/en/id/malang/208996/weather-forecast/208996" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1541566410139" class="aw-widget-current"  data-locationkey="208996" data-unit="c" data-language="en-us" data-useip="false" data-uid="awcc1541566410139"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script></p>

</div>
</div>


