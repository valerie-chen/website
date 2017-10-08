<!DOCTYPE html>
<html>
	<head>
		<title>Oopsies!</title>
	</head>
	<body>
		<h1>
			<strong>Oopsies!</strong>
		</h1>
		<?php
		$feed = "https://news.google.com/news/rss/?ned=us&hl=en";
		$xml = simplexml_load_file($feed);
	    $entries = array_merge($entries, $xml->xpath("//item"));
	    usort($entries, function ($feed1, $feed2) {
	        return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
	    });
	    
	    ?>
	    
	    <ul><?php
	    //Print all the entries
	    foreach($entries as $entry){
	        ?>
	        <li><a href="<?= $entry->link ?>"><?= $entry->title ?></a> (<?= parse_url($entry->link)['host'] ?>)
	        <p><?= strftime('%m/%d/%Y %I:%M %p', strtotime($entry->pubDate)) ?></p>
	        <p><?= $entry->description ?></p></li>
	        <?php
	    }
		?>
	</body>
</html>