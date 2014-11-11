<?PHP
	//FIX THIS IT"S BAD@!@!!@!!
	$imagetypes = array("jpeg", "gif", "png", "jpg");


// Original PHP code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.
function getImages($dir) { 

	global $imagetypes;
	
	// array to hold return value
	$retval = array();

	// add trailing slash if missing
	if(substr($dir, -1) != "/") $dir .= "/";

	// full server path to directory
	$fulldir = "{$_SERVER['DOCUMENT_ROOT']}/$dir";
	//print_r($fulldir);
	$d = dir($fulldir) or die("getImages: Failed opening directory $dir for reading".print_r(error_get_last()));
	while(false !== ($entry = $d->read())) {
	// skip hidden files
		if($entry[0] == ".") continue;
		// check for image files
		$f = escapeshellarg("$fulldir$entry");
		$mimetype = pathinfo($f)['extension'];
		foreach($imagetypes as $valid_type) {
			if(preg_match("@^{$valid_type}@", $mimetype)) {
				$retval[] = array(
					'file' => "./$dir$entry",
					'size' => getimagesize("$fulldir$entry")
				);
				//print_r($retval);
				break;
			}
		}
	}
	$d->close();
	return $retval;
}
?>