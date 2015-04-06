<!DOCTYPE html>
    <?php
        include ('_head.php')
    ?>
    <div id='preload' style = "background: url('img/loading.gif') no-repeat -9999px -9999px;"> </div>
    <body>
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Add your site or application content here -->
        <!-- <div id='menu-bg' ></div> -->


        <?php
            include ('_nav.php');
        //echo print_r($graphObject->getPropertyNames());
        ?>
        <div id='row1'>
        <!-- <div id='debug' style="position:fixed; right:10px;"></div> -->
         <?php
            include ('_contentheader.php');
        //echo print_r($graphObject->getPropertyNames());
        ?>
        <div class="content">
        <!-- <div class="contentsection"> -->

          
            <section id='posts'>
                <h2>What's Happening Now</h2>
        <?php

            // $i = 0;
            // $posts = file_get_contents("fb_feed.txt");
            // if ($posts) {
            //     $posts = unserialize($posts);
            //     for ($i=0; $i<2; ++$i) {
            //         echo $posts[$i]['html'];
            //     }
            // } else {
            //     echo "something went wrong";
            // }
        ?>
        
        </section>
<!-- <div class="fb-like-box" data-href="https://www.facebook.com/safetytalkinfinity" data-width="500" data-height="600" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="true"></div>
 -->
<div id="loadmoreajaxloader" style="display:block" ><center><img src="img/more.png" /></center></div>
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

    <script type="text/javascript">
        var loading = false;
        var noMore = false;

        function getNextPost(count) {
            if (!loading && !noMore) {
                    if(typeof(count)==='undefined') count=1;
                    loading = true;
                    $('div#loadmoreajaxloader img').attr('src','img/loading.gif');
                    //var numPosts = $('#posts .contentsection').length;

                    var lastID = $('#posts .contentsection').last().attr('id') || null;
                    var postID = lastID ? lastID.replace("post-", "") : null;
                    $.ajax({
                        url: "loadmore.php",
                        data: {n:postID, c:count},
                        success: function(html){
                            if(html){
                                $("#posts").append(html);
                            }
                            else {
                                noMore = true;
                            }
                            $('div#loadmoreajaxloader img').attr('src','img/more.png');
                            loading = false;
                        }
                    });
                }
        }
        $(function(){
            getNextPost(2);
        });
        $("#loadmoreajaxloader").click(function(){
            if (!loading) {
                getNextPost();
            }
        });
        $(window).scroll(function(){
           // $('#debug').html("window scrollTop=" + $(window).scrollTop() + "<br>document height - window height" + ($(document).height() - $(window).height()));
           if (!loading) {
            if($(window).scrollTop() >= $(document).height() - $(window).height()){
                    getNextPost();
                }
            }
        });
    </script>

</html>


