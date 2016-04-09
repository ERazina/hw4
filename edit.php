<head>
<link rel = "stylesheet" href="css.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
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
<?php
	if (!empty($_POST)) {
        $name = $_POST['name']; 
		$edit = $_POST['text'];
		$edit = htmlentities($edit);
        
        $new = fopen("file/$name", 'w');
		fwrite($new, $edit, mb_strlen($edit, 'UTF8'));
		fclose($new);
        
		/*$fp = fopen("file/$name.txt", 'a+');
		fwrite($fp, $edit, mb_strlen($edit, 'UTF8'));
		fclose($fp);*/
        
        
	}
                if(isset($_GET['file'])){
                    $name = $_GET['file'];
                    $edit = file_get_contents("file/$name");
                    
                }	
?>

<body>
    <h1>Онлайн текстовый редактор</h1>


    <form method="post" name="form">
        <div id = "filename">Введите название файла <input type="text" name="name" value='<?php echo $name; ?>'>     
        </div>
        <h2>Введите текст</h2>
        <div id = "buttons">
            <input type="button" value="b" onclick="insertTag('text','[b]','[/b]')"> 
            <input type="button" value="i" onclick="insertTag('text','[i]','[/i]')"> 
            <input type="button" value="u" onclick="insertTag('text','[u]','[/u]')"><br> 
        </div>
        <textarea rows="15" cols="100" name="text" id="textarea"><?php echo $edit; ?></textarea></br>
        <input type="submit" value="Сохранить" class = "button"></br>
        <a href="show_file.php" id = "link">Список файлов</a>
    </form>
</body>

