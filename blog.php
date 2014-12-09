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
                   
            foreach($posts['data'] as $post) {
                
                $type = $post->type;
                 if ($type == 'status' || $type == 'link' || $type == 'photo'|| $type == 'video') {
                    //echo "<code>".print_r($post)."</code><br><br>";
                    
                    // open up an fb-update div
                    echo "<div class=\"contentsection\">";
                        echo "post type: ".$type."<br>";
                        // post the time
                        //echo $post->created_time;
                        
                        // check if post type is a status
                        if ($type == 'status') {
                            echo "<p>" . $post->message . "</p>";
                            echo "<p>".date("M jS, Y", (strtotime($post->created_time)))."</p>";
                        }
                        
                        // check if post type is a link
                        if ($type == 'link') {
                            if (empty($post->picture) === false) {
                               echo "<p><a href='".$post->link."' target='_blank'><img src='" . $post->picture . "'></a></p>";
                            }
                            echo "<p>" . $post->name . "</p>";
                            echo "<p>" . $post->message . "</p>";
                            echo "<p><a href=\"" . $post->link . "\" target=\"_blank\">" . $post->link . "</a></p>";
                            echo "<p>".date("M jS, Y", (strtotime($post->created_time)))."</p>";
                        }
                        
                        // check if post type is a photo
                        if ($type == 'photo') {
                            echo "<p>" . $post->message . "</p>";
                            echo "<p><a href='".$post->link."' target='_blank'><img src='" . $post->picture . "'></a></p>";
                            echo "<p>".date("M jS, Y", (strtotime($post->created_time)))."</p>";
                        }
//<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/99714677&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
                        if ($type == 'video') {
                            $youtube = $post->link;
                            $source = $post->source;
                            $embed = "embed/";
                            if (strpos($youtube, "http://www.youtube.com/") === 0){
                                $youtube = substr_replace($youtube, $embed, 23 , 0 );
                                echo $post->message;
                                echo "iframe width='200' height='110' src='". $youtube."' frameborder='0' allowfullscreen /iframe";
                            }
                            elseif(strpos($youtube, "http://youtu.be/") === 0){
                                $youtube = str_replace("http://youtu.be/","http://www.youtube.com/", $youtube);
                                $youtube = substr_replace($youtube, $embed, 23 , 0 );
                                echo "".$post->message."";
                                echo "iframe width='200' height='110' src='". $youtube."' frameborder='0' allowfullscreen /iframe";
                            }
                            elseif(strpos($source, "soundcloud") === 0){
                                echo "".$post->message."";
                                echo "<iframe> width='100%' height='166' scrolling='no' frameborder='no' src='". $source."' </iframe>";
                            }else{
                                echo "Video posted on: " . date("jS M, Y", (strtotime($post->created_time))) . "";
                                echo "".$post->message."";
                            }

                            echo "<p>".date("M jS, Y", (strtotime($post->created_time)))."</p>";
                        }
                    
                    
                    echo "</div>"; // close fb-update div
                    
                //     $i++; // add 1 to the counter if our condition for $type is met
                // }
                
                
                // //  break out of the loop if counter has reached 10
                // if ($i == 10) {
                //     break;
                }
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


