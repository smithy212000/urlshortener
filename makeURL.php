<?php
	include("config.php"); // Load the variables from the configuration file.
	
	$random = substr(md5(rand(0, 1000000)), 0, $length); // Generates random MD5 sum with length specified in config.
	$urlArg1 = htmlspecialchars($_GET["nopost"]); // Sets $urlArg1 to whatever ?nopost is in the URL.
	
	if($urlArg1 == "true") {
		$urlArg2 = htmlspecialchars($_GET["url"]); // Sets $urlArg2 to whatever ?url is in the URL.
		if(empty($urlArg2)) { // Checks if $urlArg2 is empty.
			die("No URL specified."); // Stops the script if $urlArg2 is empty.
		} else {
			$origURL = $urlArg2; // Set $origURL to $urlArg2.
			$origURL = preg_replace('#^https?://#', '', $origURL); // Remove http:// or https:// from the URL.
			$origURL = "http://" . $origURL; // Put http:// on. Probably a better way to do this.
		}
	} else {
		$origURL = $_POST["url"]; // Get the form data from the index.html.
		if(empty($origURL)) { // Checks if $origURL is empty.
			die("Please type a URL in the box."); // If it is, kill the script.
		} else {
			$origURL = preg_replace('#^https?://#', '', $origURL); // Remove HTTP, or HTTPS from the URL.
			$origURL = "http://" . $origURL; // Add HTTP to the URL. Probably a more efficient way of doing this.
		}
	}
		mkdir($random); // Make a directory that's name is the random sequence.
		
		if($htmlRedirect == true) {
			$shortIndex = fopen(($random . "/index.html"), "w"); // Create and open index.html.
			fwrite($shortIndex, ('<html><head><meta http-equiv="refresh" content="' . $redirectLength . '; url=' . $origURL . '" /></head></html>')); // Put HTML redirect code into index.html.
		} elseif($htmlRedirect == false) {
			$shortIndex = fopen(($random . "/index.php"), "w"); // Create and open index.php.
			fwrite($shortIndex, ("<?php header('Location: " . $origURL . "'); ?>")); // Write PHP redirect script to index.php.
		} else {
			echo("Error in config. $htmlRedirect is not a valid boolean. Using PHP redirect as default.");
			$shortIndex = fopen(($random . "/index.php"), "w"); // Create and open index.php.
			fwrite($shortIndex, ("<?php header('Location: " . $origURL . "'); ?>")); // Write PHP redirect script to index.php.
		}
		
		fclose($shortIndex); // Close the file.
		echo '<a href="' . $domain .  '/' . $random . '">' . $domain . '/' . $random . '</a>'; // Print the short URL.
?>
