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
        <!-- <div class="contentsection"> -->

        <?php
            
            // echo "<div class=\"fb-feed\">";
            
            // set counter to 0, because we only want to display 10 posts
            $i = 0;
            $posts = $graphObject->asArray();
                   
            foreach($posts['data'] as $post) {
                $type = $post->type;
                //echo "<code>".print_r($post)."</code><br><br>";
                $link = $post->link;
                $source = $post->source;

                $has_message = !empty($post->message); 
                $has_picture = !empty($post->picture);
                $has_youtube = strpos($link, "youtube") != FALSE || strpos($link, "youtu.be") != FALSE;
                $has_soundcloud = strpos($source, "soundcloud") != FALSE;
                $has_fb_video = $type === 'video' && strpos($link, "facebook") != FALSE;
                // echo "has message:".print_r($has_message);
                // echo "message:" .$post->message."<br>";

                // echo "has picture:".$has_picture."<br>";
                // echo "has youtube:".$has_youtube."<br>";
                // echo "has soundcloud:".$has_soundcloud."<br>";
                
                // check if post type is a status
                if ($has_message || $has_soundcloud || $has_youtube || $has_picture || $has_fb_video)  {

                    echo "<div class='contentsection clearfix'>";
                    if ($has_soundcloud){
                        preg_match("/url=(.*)&/", $source, $source_stripped);
                        echo "<iframe width='100%' height='166' scrolling='no' frameborder='no' src='https://w.soundcloud.com/player/?url=". $source_stripped[1]."' ></iframe>";
                    }
                    elseif ($has_youtube){
                        parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
                        $youtube_id = $my_array_of_vars['v'];
                        echo "<div class ='post-media'><iframe width='200' height='110' src='http://www.youtube.com/embed/". $youtube_id. "' frameborder='0' ></iframe></div>";
                    }
                    elseif ($has_fb_video){
                        parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
                        $video_id = $my_array_of_vars['v'];    
                        echo "<div class ='post-media'><iframe src='http://www.facebook.com/video/embed?video_id=".$video_id." width='100%' frameborder='0'></iframe>";
                       // echo "<div class='playbutton'></div>";
                        echo "<div><span class='caption'>click above to play video</span></div>";
                        echo "</div>";
                    }
                    elseif ($has_picture) {
                        echo "<div class ='post-media'><a href='".$post->link."' target='_blank'><img src='" . $post->picture . "'></a></div>";
                    }
                    
                    echo "<div class='post-content'>";
                    if ($has_message) {
                        echo "<p>" . $post->message . "</p>";
                        //echo "<p><a href=\"" . $post->link . "\" target=\"_blank\">" . $post->link . "</a></p>";
                    }
                    echo "<span class='post-date'>".date("M jS, Y", (strtotime($post->created_time)))."</span>";
                    echo "</div></div>\n"; //contentsection
                }
                
                    
                    
                    
                //     $i++; // add 1 to the counter if our condition for $type is met
                // }
                
                
                // //  break out of the loop if counter has reached 10
                // if ($i == 10) {
                //     break;
                // }
            } // end the foreach statement
            
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


        

        <?php
            include ('_footer_scripts.php');
        ?>
        <script type="text/javascript">
            // $(document).on('click', '.playbutton', function() {
            //     $(this).siblings('.playbutton').hide();
            // });        
        </script>
        
    </body>
</html>


