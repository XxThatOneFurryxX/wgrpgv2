<?php include_once "header.php"; ?>
	<div class='mainWindow'>
		<div class='content'>
			<?php
				$objXML = simplexml_load_file('http://www.weightgaming.com/forum/index.php?action=.xml;sa=news;board=18.0');
				foreach($objXML->article as $thread){
					echo "<table class='blogPost'><tr><td><div class='blogHeader'><a href='" . $thread->link . "'>" . $thread->subject . "</a></div>";
					echo "<i> - Posted by " . $thread->poster->name . " " . $thread->time . "</i></td></tr>";
					echo "<tr><td><div class='blogPostContents' id='blogPost" . $thread->id . "'>" . $thread->body . "</div></td></tr></table><hr/>";
				}	
			?>
		</div>
	</div>
<?php include_once "footer.php"; ?>