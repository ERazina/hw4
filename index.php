<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel = "stylesheet" href="css.css" />
<script type="text/javascript" src="jquery.js"></script>
    
<script>
function insertTag(text, tagStart, tagEnd) { 
    var edit = document.getElementsByName(text).item(0);
    
    if (document.getSelection) {
        edit.value = edit.value.substring(0, edit.selectionStart) +
        tagStart +
        edit.value.substring(edit.selectionStart, edit.selectionEnd) +
        tagEnd +
        edit.value.substring(edit.selectionEnd, edit.value.length);
    }
    
    console.log(edit);
}    
</script>
    
</head>


<body>
    <h1>Онлайн текстовый редактор</h1>


<form method="post" name="form">
    <div id = "filename">Введите название файла <input type="text" name="name"></div>
    <h2>Введите текст</h2>
    <div id = "buttons">
        <input type="button" value="b" onclick="insertTag('text','[b]','[/b]')"> 
        <input type="button" value="i" onclick="insertTag('text','[i]','[/i]')"> 
        <input type="button" value="u" onclick="insertTag('text','[u]','[/u]')"><br> 
    </div>
    <textarea rows="15" cols="100" name="text" id="textarea"></textarea></br>
    <input type="submit" value="Сохранить" class = "button"></br>


    <a href="show_file.php" id = "link">Список файлов</a>
</form>

<?php
header("Content-Type: text/html; charset=utf-8");

	if (!empty($_POST)) {
		$name = $_POST['name'];
		$text = htmlentities($_POST['text']);
		
		$fp = fopen("file/$name.txt", 'w');
		fwrite($fp, $text, mb_strlen($text, 'UTF8'));
		fclose($fp);
        
        
	}
?>
</body>