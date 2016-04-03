<link rel = "stylesheet" href="css.css" />

<?php
	$dir = scandir('file');
	echo "<ol>";
	foreach ($dir as $file) {
		if (!($file == '.' || $file == '..')) {
			echo "<li><a href='show_file.php?file=$file'>$file</a></li>";
		}
	}
	echo "</ol>";
	if (isset($_GET['file'])) {
		$file = $_GET['file'];
		$text = preg_replace('/\[([^\[\]]*)\]/', "<$1>", file_get_contents("file/$file"));
		echo $text;
	}
?>