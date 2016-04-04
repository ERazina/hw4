<head>
<link rel = "stylesheet" href="css.css" />
    
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
    <textarea rows="25" cols="100" name="text" id="textarea">
        <?php
        if(isset($_GET['file'])){
            $name = $_GET['file'];
            $edit = file_get_contents("file/$name");
            echo $edit;
        }

	
?>
    </textarea></br>
    <input type="submit" value="Сохранить">


    <a href="show_file.php">Список статей</a>
</form>


</body>