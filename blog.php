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
    <?
    session_start();
    // include the facebook sdk
    require_once('vendor/autoload.php');


use Facebook\FacebookSession;
//use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

    FacebookSession::setDefaultApplication('833602023371005', '41e1ccf2c920aba7ca18a7b7c5224a66');
    $session = new FacebookSession('833602023371005|Wat1iKW1QXWjyfFCw9q7gr0W2fM');
    if ($session) {
        // Logged in
        /* PHP SDK v4.0.0 */
        /* make the API call */

        // set page id
        $pageid = "1508307422732791";
        $request = new FacebookRequest(
          $session,
          'GET',
          '/1508307422732791/posts'
        );
        $response = $request->execute();
        $graphObject = $response->getGraphObject();
    }
    
?>

        <?php
            include ('_nav.php');

        //echo print_r($graphObject->getPropertyNames());
        ?>
        <div id='row1'>
            <div class="content">
            <div class="contentsection">

                 <?php
            
            echo "<div class=\"fb-feed\">";
            
            // set counter to 0, because we only want to display 10 posts
            $i = 0;
                $posts = $graphObject->asArray();
                      // echo print_r($posts['data']);
                foreach($posts['data'] as $post) {
                  
                echo print_r($post)."<br><br>";

                // if ($post['type'] == 'status' || $post['type'] == 'link' || $post['type'] == 'photo') {
                
                    
                //     // open up an fb-update div
                //     echo "<div class=\"fb-update\">";
                        
                //         // post the time
                        
                        
                //         // check if post type is a status
                //         if ($post['type'] == 'status') {
                //             echo "<h2>Status updated: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                //             if (empty($post['story']) === false) {
                //                 echo "<p>" . $post['story'] . "</p>";
                //             } elseif (empty($post['message']) === false) {
                //                 echo "<p>" . $post['message'] . "</p>";
                //             }
                //         }
                        
                //         // check if post type is a link
                //         if ($post['type'] == 'link') {
                //             echo "<h2>Link posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                //             echo "<p>" . $post['name'] . "</p>";
                //             echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\">" . $post['link'] . "</a></p>";
                //         }
                        
                //         // check if post type is a photo
                //         if ($post['type'] == 'photo') {
                //             echo "<h2>Photo posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                //             if (empty($post['story']) === false) {
                //                 echo "<p>" . $post['story'] . "</p>";
                //             } elseif (empty($post['message']) === false) {
                //                 echo "<p>" . $post['message'] . "</p>";
                //             }
                //             echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\">View photo &rarr;</a></p>";
                //         }
                    
                    
                //     echo "</div>"; // close fb-update div
                    
                //     $i++; // add 1 to the counter if our condition for $post['type'] is met
                // }
                
                
                // //  break out of the loop if counter has reached 10
                // if ($i == 10) {
                //     break;
                // }
            } // end the foreach statement
            
            echo "</div>";
            
        ?>
<!-- <div class="fb-like-box" data-href="https://www.facebook.com/safetytalkinfinity" data-width="500" data-height="600" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="true"></div>
 -->
            <div id='links'>
                <a href='http://www.facebook.com/safetytalkinfinity' target='blank'><img src='img/blah.png' /></a>
                <a href='http://soundcloud.com/safety-talk' target='blank'><img src='img/soundcloud.png' /></a>
                <a href='http://safetytalk.bandcamp.com' target='blank'><img src='img/bandcamp.png' /></a>
            </div>
        </div>
        </div>
    </div>
        

        <?php
            include ('_footer_scripts.php');
        ?>
        <script type="text/javascript">
        
        </script>
        
    </body>
</html>


