<?php
	$music = file('songs/190MMix.txt', FILE_IGNORE_NEW_LINES);
	$txt = glob("songs/*.txt");
	$tt = basename("txt");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">
			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>
		<div id="listarea">
			<ul id="musiclist">
				<?php if(!isset($_REQUEST["playlist"])){ ?>
					<?php foreach ($music as $key => $song) {
						
						$fileSize = filesize("songs/".$song);
						if ($fileSize < 1024) {
							$fileSize = $fileSize . " B";
						}
						else if($fileSize > 1024 && $fileSize <10486575){
							$fileSize = round($fileSize/1000, 0 , PHP_ROUND_HALF_EVEN)." Kb";
						}
						else if($fileSize >= 10486575){
							$fileSize = round($fileSize / 100000, 0, PHP_ROUND_HALF_EVEN) ." Mb";
						}
					?>

						
						<li class="mp3item">
							<a href="songs/<?= $song ?>"><?= $song ?></a>
							
							<span>(<?= $fileSize ?>)</span>
						</li>
					<?php } ?>
					<?php foreach($txt as $txtFile => $t) { ?>
						<li class="playlistitem">
							<a href="music.php?playlist=mypicks.txt"><?= str_replace("songs/", "", $t) ?></a>
						</li>
					<?php } ?>
				<?php } ?>
				<?php if(isset($_REQUEST["playlist"])) { ?>
					<a href="music.php">Go back</a>
							<h1 style="margin: 5px;">Playlist songs</h1>
					<?php
					$music = file('songs/mypicks.txt');
					foreach ($music as $key => $song) { ?>
							<li class="mp3item">
								<a href="songs/<?= $song ?>"><?= $song ?></a>
							</li>
					<?php } ?>
				<?php } ?>
			</ul>
		</div>
	</body>
</html>
