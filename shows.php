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
            8/23/2015: <a href="http://www.storkcluboakland.com/" target="blank">Stork Club, Oakland, CA</a> &nbsp with <a href="https://www.facebook.com/JesseRBerlin" target="blank">Jesse R Berlin</a>
        </p>
         <p class="show-listing">
             9/25/2015: <a href="https://www.facebook.com/events/1404972913166751/" target="blank">50 Mason Socail House</a>, San Francisco &nbsp<a href="https://www.facebook.com/events/1404972913166751/" target="blank"><img src="img/fb_white_29.png"></a><span style="color:red">  Cancelled due to venue closure</span>
            </p>
            <p class="show-listing" id="book-us">
                <a href="./booking">book us</a> for your next show.
            </p>
            <br><br>
            <h2>Past Shows</h2>
            <p class="show-listing">
                8/15/2015: <a href="http://runoak.com/" target="blank">The Town's Half Marathon</a> playing at the Lake Merritt Gazebo in Oakland, CA, 8:00-10:00am
            </p>
             <p class="show-listing">
                5/5/2015: Cinco de Mayo Psychedelic Fiesta At <a href="http://www.hotelutah.com/" target="blank">Hotel Utah</a>, San Francisco &nbsp<a href="https://www.facebook.com/events/903455486379926/" target="blank"><img src="img/fb_white_29.png"></a>
            </p>
            <p class="show-listing">
                4/4/2015: New Sun Company with Safety Talk + Dave Deporis + Jeremy Lyon at the <a href="http://www.awakencafe.com/" target="blank">Awaken Cafe</a>, Oakland &nbsp<a href="https://www.facebook.com/events/1040234489323261/" target="blank"><img src="img/fb_white_29.png"></a>
            </p>
            <p class="show-listing">
             3/29/2015: <a href="https://www.facebook.com/events/699407943512707/" target="blank">Stork Club, Oakland, CA</a> &nbsp<a href="https://www.facebook.com/events/699407943512707/" target="blank"><img src="img/fb_white_29.png"></a>
            </p>
            <p class="show-listing">
             3/21/2015: <a href="https://www.facebook.com/events/1427922270840519/" target="blank">Horror Cave Beach Show,</a> &nbsp Sutro Baths, San Francisco, CA
            </p>
            <p class="show-listing">
             3/10/2015: Psychomagic at&nbsp<a href="http://elismilehigh.com/" target="blank">Eli's Mile High Club, Oakland, CA</a> &nbsp<a href="https://www.facebook.com/events/401535143362298/" target="blank"><img src="img/fb_white_29.png"></a>
            </p>
            <p class="show-listing">
                3/7/2015: <a href="https://www.facebook.com/events/1586746001566414/" target="blank">Safety Talk and Friends presents: Generator Jamz in the Park!,</a> &nbsp Golden Gate Park / Baker Beach, San Francisco, CA
            </p>
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