<?php

$posts = file_get_contents("fb_feed.txt");
if ($posts) {
    $posts = unserialize($posts);
	$n = $_REQUEST["n"];
	if (!empty($n) && $n < count($posts)) {
		echo $posts[$n];   	
	}
} else {
    echo "something went wrong";
}


?>