<!DOCTYPE html>
<?php
include('_head.php')
?>
<body>
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Add your site or application content here -->
    <!-- <div id='menu-bg' ></div> -->
    
    <?php
    include('_nav.php')
    ?>
    <!-- BEGIN CONTENT -->
    <div id='row1'>
    <?php
            include ('_contentheader.php');
        //echo print_r($graphObject->getPropertyNames());
        ?>
        <section class='content'>
        <h2>Upcoming Shows</h2> 
            <p class="show-listing">
            Nothing to announce just yet. In the meantime, <a href="./booking">book us</a> for your next show.
            </p>
        <br><br>
        <h2>Past Shows</h2> 
            <p class="show-listing">
                9/25/2014: <a href="http://publicsf.com/exhibitions/hanna-quevedo-11353" target="blank">Hanna Quevedo Photo Gallery Opening </a> at Public Works SF Roll Up Gallery &nbsp<a href="https://www.facebook.com/events/733163130087603/" target="blank"><img src="img/fb_white_29.png"></a>
            </p>
        </section>
    </div>
    <!-- END CONTENT -->
    <?
    include('_footer_scripts.php');
    ?>
</body>
</html>