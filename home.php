<!DOCTYPE html>
    <?php
        include ('_head.php')
    ?>

    <body>
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Add your site or application content here -->
        <!-- <div id='menu-bg' ></div> -->
        
        <?php
            include ('_nav.php')
        ?>
        <div id='row1'>
<?php
            include ('_contentheader.php');
        //echo print_r($graphObject->getPropertyNames());
        ?>
            <div class="content" id='homecontent'>

                <div id='coverphoto'>
                </div>
                <div id='next'><h6>next --></h6></div>
        </div>
        </div>
        

        <?php
            include ('_footer_scripts.php');
        ?>
        
    <script src="js/main.js"></script>
    </body>
</html>


