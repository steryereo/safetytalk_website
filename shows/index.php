<!DOCTYPE html>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/_head.php');
?>
<body>
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Add your site or application content here -->
    <!-- <div id='menu-bg' ></div> -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT'].'/_contentheader.php');
    ?>
    <!-- BEGIN CONTENT -->
    <div id='row1'>
    <?php
        include ('_contentheader.php');
        //echo print_r($graphObject->getPropertyNames());
        ?>
        <section class='content'>
            <h2>Upcoming Shows</h2> 

            <p class="show-listing" id="book-us">
                <a href="./booking">book us</a> for your next show.
            </p>
            <br><br>
            <h2>Past Shows</h2>
             <p class="show-listing">
                11/22/2015: <a href="https://www.facebook.com/events/987419364650991/" target="blank">Beach Party</a>&nbsp at Panther Beach <a href="https://www.facebook.com/events/987419364650991/" target="blank"><img src="/img/fb_white_29.png"></a>
            </p>
            <script type="application/ld+json">
            {
              "@context": "http://schema.org",
              "@type": "MusicEvent",
              "name": "Panther Beach Generator Jam",
              "startDate" : "2015-11-22T14:00",
              "url" : "https://www.facebook.com/events/987419364650991/",
              "location" : {
                "@type" : "MusicVenue",
                "name" : "Panther Beach",
                "address" : "California 1, Seaside, CA 95060"
              }
            }
            </script>
            <p class="show-listing">
                10/8/2015: <a href="http://www.milksf.com/" target="blank">Milk Bar</a>&nbsp in San Francisco <a href="https://www.facebook.com/events/798166790297250/" target="blank"><img src="/img/fb_white_29.png"></a>
            </p>
            <script type="application/ld+json">
            {
              "@context": "http://schema.org",
              "@type": "MusicEvent",
              "name": "Milk Bar, SF",
              "startDate" : "2015-10-08T19:00",
              "url" : "https://www.facebook.com/events/798166790297250/",
              "location" : {
                "@type" : "MusicVenue",
                "sameAs" : "http://www.milksf.com/",
                "name" : "The Milk Bar",
                "address" : "1840 Haight St, San Francisco, California 94117"
              }
            }
            </script>
            <p class="show-listing">
                9/22/2015: <a href="https://www.facebook.com/events/512350942252466/" target="blank">THEE INDIAN SUMMER FESTIVAL</a>, Oakland, CA &nbsp<a href="https://www.facebook.com/events/512350942252466/" target="blank"><img src="/img/fb_white_29.png"></a>
            </p>
            <p class="show-listing">
                9/13/2015: <a href="http://clubleos.com" target="blank">Leo's Music Club</a>&nbsp in Oakland, CA <a href="https://www.facebook.com/events/1629068504043314/" target="blank"><img src="/img/fb_white_29.png"></a>
            </p>
            <p class="show-listing">
                8/30/2015: <a href="https://www.facebook.com/events/841081185977259/" target="blank">Freak Folk & More </a>&nbsp at<a href="https://www.facebook.com/pages/Trees/258681097485179" target="blank">&nbsp TREES,</a> Oakland, CA &nbsp<a href="https://www.facebook.com/events/41081185977259/" target="blank"><img src="/img/fb_white_29.png"></a>
            </p>
            <p class="show-listing">
                8/23/2015: <a href="http://www.storkcluboakland.com/" target="blank">Stork Club, Oakland, CA</a> &nbsp with <a href="https://www.facebook.com/JesseRBerlin" target="blank">Jesse R Berlin</a>
            </p>
            <p class="show-listing">
                8/15/2015: <a href="http://runoak.com/" target="blank">The Town's Half Marathon</a> playing at the Lake Merritt Gazebo in Oakland, CA, 8:00-10:00am
            </p>
             <p class="show-listing">
                5/5/2015: Cinco de Mayo Psychedelic Fiesta At <a href="http://www.hotelutah.com/" target="blank">Hotel Utah</a>, San Francisco &nbsp<a href="https://www.facebook.com/events/903455486379926/" target="blank"><img src="/img/fb_white_29.png"></a>
            </p>
            <p class="show-listing">
                4/4/2015: New Sun Company with Safety Talk + Dave Deporis + Jeremy Lyon at the <a href="http://www.awakencafe.com/" target="blank">Awaken Cafe</a>, Oakland &nbsp<a href="https://www.facebook.com/events/1040234489323261/" target="blank"><img src="/img/fb_white_29.png"></a>
            </p>
            <p class="show-listing">
             3/29/2015: <a href="https://www.facebook.com/events/699407943512707/" target="blank">Stork Club, Oakland, CA</a> &nbsp<a href="https://www.facebook.com/events/699407943512707/" target="blank"><img src="/img/fb_white_29.png"></a>
            </p>
            <p class="show-listing">
             3/21/2015: <a href="https://www.facebook.com/events/1427922270840519/" target="blank">Horror Cave Beach Show,</a> &nbsp Sutro Baths, San Francisco, CA
            </p>
            <p class="show-listing">
             3/10/2015: Psychomagic at&nbsp<a href="http://elismilehigh.com/" target="blank">Eli's Mile High Club, Oakland, CA</a> &nbsp<a href="https://www.facebook.com/events/401535143362298/" target="blank"><img src="/img/fb_white_29.png"></a>
            </p>
            <p class="show-listing">
                3/7/2015: <a href="https://www.facebook.com/events/1586746001566414/" target="blank">Safety Talk and Friends presents: Generator Jamz in the Park!,</a> &nbsp Golden Gate Park / Baker Beach, San Francisco, CA
            </p>
            <p class="show-listing">
                9/25/2014: <a href="http://publicsf.com/exhibitions/hanna-quevedo-11353" target="blank">Hanna Quevedo Photo Gallery Opening </a> at Public Works SF Roll Up Gallery &nbsp<a href="https://www.facebook.com/events/733163130087603/" target="blank"><img src="/img/fb_white_29.png"></a>
            </p>
        </section>
    </div>
    <!-- END CONTENT -->
    <?
            include($_SERVER['DOCUMENT_ROOT'].'/_footer_scripts.php');
    ?>
</body>
</html>