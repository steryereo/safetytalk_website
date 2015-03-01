 <?
date_default_timezone_set('America/Los_Angeles');

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


    $soundcloud_client_id = '177728306652b5a89c88b51094345326';

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
            $posts_output = array();
            // $output .= "<div class=\"fb-feed\">";
            
            // set counter to 0, because we only want to display 10 posts
            $i = 0;
            $posts = $graphObject->asArray();
            


            foreach($posts['data'] as $post) {
                $output = "";
                $type = $post->type;
               // $output .= "<code>".print_r($post)."</code><br><br>";
                $link = $post->link;
                $source = $post->source;

                $has_message = !empty($post->message); 
                $has_picture = !empty($post->picture);
                $has_youtube = strpos($link, "youtube") != FALSE || strpos($link, "youtu.be") != FALSE;
                $has_soundcloud_source = strpos($source, "soundcloud") != FALSE;
                $has_soundcloud_link = strpos($link, "soundcloud") != FALSE;
                $has_fb_video = $type === 'video' && strpos($link, "facebook") != FALSE;
                $has_event = $type === 'link' && strpos($link, "event") != FALSE;
              
                
                // check if post type is a status
                if ($has_message || $has_soundcloud || $has_youtube || $has_picture || $has_fb_video)  {
                    $content_obj=null;
                    if (empty($post->object_id) == FALSE) {
                        try {
                            $content_obj = (new FacebookRequest($session, "GET", "/".$post->object_id))->execute()->getGraphObject()->asArray();
                        } catch(FacebookRequestException $e) {
                            // $output .= "Exception occured, code: " . $e->getCode();
                            // $output .= " with message: " . $e->getMessage();
                        }   

                        // $output .= "<p>";
                        // $output .= print_r($content_obj['embed_html']);
                        // $output .= "</p>";
                     }
                    $output .= "<div class='contentsection clearfix' id='post-{$post->id}'>";
                    $output .= "<header class='post-header'>";
                    if (!empty($post->name)) {
                        $output .= "<h3>".$post->name."</h3>";
                    }   
                    $output .= "<span class='post-date'>".date("M jS, Y", (strtotime($post->created_time)))."</span>";
                    $output .= "</header>";
                    if ($has_soundcloud_source){
                        preg_match("/url=(.*)&/", $source, $source_stripped);
                        $output .= "<div class='post-media'><iframe width='100%' height='166' scrolling='no' frameborder='no' src='https://w.soundcloud.com/player/?url=". $source_stripped[1]."' ></iframe></div>";
                    }
                    elseif ($has_soundcloud_link){
                        $encoded_url = urlencode($link);
                        $call_url = "https://api.soundcloud.com/resolve.json?url=".$encoded_url."&client_id=".$soundcloud_client_id;
                        $id = json_decode(file_get_contents($call_url))->id;
                        //echo $id;
                        $output .= "<div class='post-media'><iframe width='100%' height='166' scrolling='no' frameborder='no' src='https://w.soundcloud.com/player/?url=https://api.soundcloud.com/tracks/".$id."&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false'></iframe></div>";

                        //$output .= "<div class='post-media'><iframe width='100%' height='166' scrolling='no' frameborder='no' src='https://w.soundcloud.com/player/?url=". $source_stripped[1]."' ></iframe></div>";
                    }
                    elseif ($has_youtube){
                        parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
                        $youtube_id = $my_array_of_vars['v'];
                        $output .= "<div class='post-media'><div class='video-wrapper'><iframe width='100%' src='http://www.youtube.com/embed/". $youtube_id. "' frameborder='0' ></iframe></div></div>";
                    }
                    elseif ($has_fb_video){
                        parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
                        $video_id = $my_array_of_vars['v'];    
                        $output .= "<div class ='post-media'><div class='video-wrapper'><iframe width='100%' frameborder='0' style='overflow:hidden;' src='http://www.facebook.com/video/embed?video_id=".$video_id."' ></iframe></div>";
                        //$output .= "<div class='post-media'><div class='video-wrapper'>".$content_obj['embed_html']."</div></div>";
                        $output .= "<div><span class='caption'>click above to play video</span></div>";
                        $output .= "</div>";
                    }
                    elseif ($has_picture) {
                        if ($type === 'photo') {
                            $img_url = $content_obj['source'];
                        } 
                        if (empty($img_url)) {
                            $img_url = $post->picture;
                        }
                        $output .= "<div class='post-media'><a href='".$post->link."' target='_blank'><img src='" . $img_url . "'></a></div>";
                    }
                    elseif ($has_event) {
                        preg_match("/\/events\/(.*)\//", $link, $event_id);
                        //$output .= "event_id=".print_r($event_id);
                        try {
                            $event_obj = (new FacebookRequest($session, "GET", "/".$event_id[1]."/photos"))->execute()->getGraphObject()->asArray()['data'];                    
                            $last_photo = array_pop($event_obj)->images[0]->source;
                        //$output .= "event".print_r($last_photo);
                        } catch(FacebookRequestException $e) {
                            // $output .= "Exception occured, code: " . $e->getCode();
                            // $output .= " with message: " . $e->getMessage();
                            $last_photo = $post->picture;
                        } 
                        $output .= "<div class='post-media'><a href='".$post->link."' target='_blank'><img src='".$last_photo."'></a></div>";
                    }
                    $output .= "<div class='post-content'>";
                    if ($has_message) {
                        $output .= "<p>" . $post->message . "</p>";
                        //$output .= "<p><a href=\"" . $post->link . "\" target=\"_blank\">" . $post->link . "</a></p>";
                    }
                    
                    $output .= "</div></div>\n"; //contentsection

                $posts_output[] = array('id'=>$post->id, 'html'=>$output);
                }
            } // end the foreach statement
            $string_data = serialize($posts_output);
            if (file_put_contents("fb_feed.txt", $string_data)) {
                echo "successfully wrote facebook feed to file ".date("Y-m-d h:i:sa");
            } else {
                echo "failed to write facebook feed to file";
            }
        ?>




