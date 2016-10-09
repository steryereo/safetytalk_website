<?php

$posts = file_get_contents("fb_feed.txt");
if ($posts) {
    $posts = unserialize($posts);
	$last_id = $_REQUEST["n"];
	$c = $_REQUEST["c"];
	$starting_index = 0;
	$result = "";
	if (empty($c)) $c = 1;
	if (!empty($last_id)) {
		$i = 0;
		foreach ($posts as $post) {
			if ($post['id'] == $last_id) {
				$starting_index = $i+1;
				break;
			}
			++$i;
		}
		//echo $posts[$last_id];
	}
	for ($x = 0; $x < $c; ++$x) {
		if (!empty($posts[$starting_index+$x])){
			$result .= $posts[$starting_index+$x]['html'];
		}
	}
	echo $result;
} else {
    echo "something went wrong";
}


?>