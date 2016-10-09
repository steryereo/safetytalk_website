<?php
function parse_path() {
  $path = array();
  if (isset($_SERVER['REQUEST_URI'])) {
    $request_path = explode('?', $_SERVER['REQUEST_URI']);

    $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
    $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
    $path['call'] = utf8_decode($path['call_utf8']);
    if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
      $path['call'] = '';
    }
    $path['call_parts'] = explode('/', $path['call']);

    $path['query_utf8'] = urldecode($request_path[1]);
    $path['query'] = utf8_decode(urldecode($request_path[1]));
    $vars = explode('&', $path['query']);
    foreach ($vars as $var) {
      $t = explode('=', $var);
      $path['query_vars'][$t[0]] = $t[1];
    }
  }
return $path;
}

$path_info = parse_path();

if ($path_info['call'] == "loadmore.php") {
  include('loadmore.php');
}
if ($path_info['call'] == "get_fb.php") {
  include('get_fb.php');
}
//echo '<pre>'.print_r($path_info, true).'</pre>';
$callhtml = $path_info['call'] . ".html";
$callphp = $path_info['call'] . ".php";

if (empty($path_info['call'])) {
  include ('blog.php');
}
elseif (file_exists($callphp)) {
  include($callphp);
}
elseif (file_exists($callhtml)) {
  include($callhtml);
}
else {

  //echo '<pre>'.print_r($path_info, true).'</pre>';
  header( 'Location: http://safetytalkband.com' ) ;
  die();
}
?>