<?php
include_once('get_photos.php');
$images = getImages(basename(__DIR__).'/img/photos/small/');
shuffle($images);
?>

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
        <!-- <section class='content'> -->
        	<div id='gallery' class="content" >
        		<?php
        			foreach($images as $img) {
                        $path_large = preg_replace("/([\W]small)/", "", $img['file']);
                        echo "<a href=\"{$path_large}\"><div class=\"photo\"> <img src=\"{$img['file']}\" {$img['size'][3]} alt=\"\"></div></a>\n";
        			}
        		?>
        	</div>  
        <!-- </section> -->
        </div>

            <div id="lightbox" style="display:none;">
                <div id="lightbox-content">
                </div>  
            </div>


		<?php
            include ('_footer_scripts.php');
    	?>

   <script src="js/vendor/masonry.pkgd.min.js"></script>
   <script src="js/vendor/imagesloaded.pkgd.min.js"></script>
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
$('#lightbox-content').imagesLoaded().progress( function() {
    $('#lightbox-content').removeClass('is-loading');
           $('#lightbox-content img').fadeIn();
 
} );

    $('#lightbox').click(function() {
        $('#lightbox').fadeOut();
    });
$('.photo img').click(function(e) {
        
        //prevent default action (hyperlink)
        e.preventDefault();
        
        //Get clicked link href
        var image_href = $(this).closest("a").attr("href");
        
        /*  
        If the lightbox window HTML already exists in document, 
        change the img src to to match the href of whatever link was clicked
        
        If the lightbox window HTML doesn't exists, create it and insert it.
        (This will only happen the first time around)
        */
        
        if ($('#lightbox').length > 0) { // #lightbox exists
            
            //place href as img src value
            $('#lightbox-content').html('<img src="' + image_href + '" style = "max-height:'+ $(window).height()*.9 +'px;"/>');
    
        $('#lightbox-content').addClass('is-loading');
        $('#lightbox-content img').fadeOut();
        
            //show lightbox window - you could use .show('fast') for a transition
            $('#lightbox').fadeIn();
        }
        
        else { //#lightbox does not exist - create and insert (runs 1st time only)
            
            //create HTML markup for lightbox window
            var lightbox = 
            '<div id="lightbox">' +
                '<div id="lightbox-content">' + //insert clicked link's href into img src
                    '<img src="' + image_href +'" style = "max-height:'+ $(window).height()*.9 +'px;"/>' +
                '</div>' +  
            '</div>';
                
            //insert lightbox HTML into page
            $('body').append(lightbox);

            $('#lightbox').fadeIn();
                //Click anywhere on the page to get rid of lightbox window

        }
        
    });
    


$('.photo img').click(function() {
    var path = $(this).attr('src');
    newPath = path.replace('small/', '');
    newPath = newPath.replace('-small', '');
});
   </script>
    </body>
</html>