<?php
	$view_urls = array("viewFFO", "viewFF4", "viewFF5", "viewFF6", 
					   "viewFF7", "viewFF8", "viewFF8r", "viewFF9", 
					   "viewFFX", "viewFFX2", "viewFFXI", "viewFFXII", 
					   "viewFFXIII", "viewFFT", "viewCT", "viewDL", 
					   "viewFFDQ", "viewFFS3", "viewFFS5", "viewFFXG",
					   "viewSE", "questcards");
	$dom = new DOMDocument();
    $base_url = "http://ttadvance.ca/";
	$local_base_url = "/static/finalfantasy/images/";
	$count = 0;
	$skipped_count = 0;
	if(isset($_POST['start']))
	{
		foreach($view_urls as $view)
		{
			$web_url = "http://ttadvance.ca/" . $view . ".php";
			echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=<br />";
			echo "Extracting images from: ";
			echo $web_url . "<br />";
			echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=<br />";
			@$dom->loadHTMLFile($web_url);
			foreach ($dom->getElementsByTagName('img') as $img)
			{
				$image_url = $base_url . $img->getAttribute('src');
				$local_path = $local_base_url . $img->getAttribute('src');
				if(!file_exists($local_path))
				{
					echo "Downloading Image: " . $image_url . "<br />";
				    // file_put_contents($local_path, file_get_contents($image_url));
					$count++;
				}
				else
				{
					echo $local_path . " already exists! Skipping...<br />";
					$skipped_count++;
				}
				$hover_image_url = $base_url . $img->getAttribute('hsrc');
				$local_path = $local_base_url . $img->getAttribute('hsrc');
				if(!file_exists($local_path))
				{
					echo "Downloading Hover Image: " . $hover_image_url . "<br />";
				    // file_put_contents($local_path, file_get_contents($hover_image_url));
					$count++;
				}
				else
				{
					echo $local_path . " already exists! Skipping... <br />";
					$skipped_count++;
				}
			}
		}
		echo $count . " items downloaded.<br />";
		echo $skipped_count . " items skipped.<br />";
	}
	else {
?>
	<p style="color: red;">ERROR: POST WAS INCORRECT!</p>
<?php
	}
?>