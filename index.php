<!DOCTYPE html>
    <?php
        include ('_head.php')
    ?>
    <script src="js/main.js"></script>
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
            <div class="middlecol">
                <div id='coverphoto'>
                    <img id='animation' src='img/st_sequence_slower.gif'>
                    <div id='gifctrl'>
                        <input type="checkbox" id='playstop' >
                        <label for="playstop"><span></span></label>
                    </div>
                </div>
            </div>
            <div class='col-divider'></div>
            <div class='rightcol' id='links'>
                <a href='http://www.facebook.com/safetytalkinfinity' target='blank'><img src='img/blah.png' /></a>
            </div>
        </div>
        
        <?php
            include ('_footer_scripts.php');
        ?>
    </body>
</html>