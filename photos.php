<?php
include_once('get_photos.php');
$images = getImages(basename(__DIR__).'/img/photos/small/');
shuffle($images);
?>

<!DOCTYPE html>
<?php
    include ('_head.php')
?>
   <script src="js/vendor/masonry.pkgd.min.js"></script>
   <script src="js/vendor/imagesLoaded.pkgd.min.js"></script>

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
        <!-- <section class='content'> -->
        	<div id='gallery' class="content" >
        		<?php
        			foreach($images as $img) {
        				echo "<div class=\"photo\"><img src=\"{$img['file']}\" {$img['size'][3]} alt=\"\"></div>\n";
        			}
        		?>
        	</div>  
        <!-- </section> -->
        </div>




		<?php
            include ('_footer_scripts.php');
    	?>
          <script>
var container = document.querySelector('#gallery');
var msnry = new Masonry( container, {
  // options
  itemSelector: '.photo',
  isFitWidth:true
});
imagesLoaded( container, function() {
  msnry.layout();
});
   </script>
    </body>
</html>