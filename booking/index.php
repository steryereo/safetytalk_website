<!DOCTYPE html>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/_head.php')
?>
<body>
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Add your site or application content here -->
    <!-- <div id='menu-bg' ></div> -->

    <?php
    include($_SERVER['DOCUMENT_ROOT'].'/_nav.php')
    ?>
    <!-- BEGIN CONTENT -->
    <div id='row1'>
    <?php
            include ($_SERVER['DOCUMENT_ROOT'].'_contentheader.php');
        //echo print_r($graphObject->getPropertyNames());
        ?>
        <section class='content'>

            <!-- start slipsum code -->
            <p>We want to play at your venue/space/cave/bunker/van!<br>
            The San Francisco Bay Area is best &mdash; we live in Oakland. <br>
            <a href="mailto:safetytalkband@gmail.com" target="blank">holler at us</a></p>

            </section>
        </div>
        <!-- END CONTENT -->
        <?php
            include($_SERVER['DOCUMENT_ROOT'].'/_footer_scripts.php');
        ?>
    </body>
</html>