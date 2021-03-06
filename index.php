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
        ?>
        <div id='row1'>
         <?php
            include ('_contentheader.php');
        ?>
        <div class="content clearfix">

            <section id='posts' >
                <h2>What's Happening Now</h2>

        </section>
        <div id="loadmoreajaxloader"><div class="center"></div></div>
        </div>
    </div>
        <?php
            include ('_footer_scripts.php');
        ?>
    </body>

    <script type="text/javascript">
        var loading = false;
        var noMore = false;
        var scrollDebounce = Date.now();


        function getNextPost(count) {
            if (!loading && !noMore) {
                    if(typeof(count)==='undefined') count=1;
                    loading = true;
                    $('div#loadmoreajaxloader .center').addClass('loading');
                    //var numPosts = $('#posts .contentsection').length;

                    var lastID = $('#posts .contentsection').last().attr('id') || null;
                    var postID = lastID ? lastID.replace("post-", "") : null;
                    $.ajax({
                        url: "loadmore.php",
                        data: {n:postID, c:count},
                        success: function(html){
                            if(html){
                                $("#posts").append(html);
                                $('#loadmoreajaxloader .center').removeClass('loading');
                            }
                            else {
                                noMore = true;
                                $('#loadmoreajaxloader').remove();
                            }
                            loading = false;
                        }
                    });
                }
        }
        window.onload = function(){
            getNextPost(5);
        };
        document.querySelector('#loadmoreajaxloader').addEventListener('click', function(){
            if (!loading) {
                getNextPost(5);
            }
        });
        window.addEventListener('scroll', function(){
          var now = Date.now();
          if (!loading && ((now - scrollDebounce) > 50)) {
            scrollDebounce = now;
            if(window.pageYOffset >= (document.body.clientHeight - window.outerHeight - 10)) {
                    getNextPost(3);
                }
            }
        });
    </script>
</html>


