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
            <iframe width="100%" height="600" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/51941164&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>    
          
        </section>
        </div>
        <!-- END CONTENT -->
        <?
            include('_footer_scripts.php');
        ?>
    </body>
</html>