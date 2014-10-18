<?php
include_once('get_photos.php');
$images = getImages(basename(__DIR__).'/img/photos/');
?>

<!DOCTYPE html>
<?php
    include ('_head.php')
?>
   <script src="js/vendor/masonry.pkgd.min.js"></script>
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
        <section class='content'>
        	<div id='gallery' class="js-masonry"
  					data-masonry-options='{ "columnWidth": 200, "itemSelector": ".photo" }'>
        		<?php
                echo print_r($images);
        			foreach($images as $img) {
        				echo "<img class=\"photo\" src=\"{$img['file']}\" {$img['size'][3]} alt=\"\">\n";
        			}
        		?>
        	</div>  
        </section>
        </div>




		<?php
            include ('_footer_scripts.php');
    	?>
    </body>
</html>