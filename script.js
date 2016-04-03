function getSelectionText() {
  var txt = '';
  if (txt = window.getSelection) // Не IE, используем метод getSelection
    txt = window.getSelection().toString();
  
else { // IE, используем объект selection
    txt = document.selection.createRange().text;
}
  console.log (txt);
}
//$(document).ready(function getSelection() { (alert 'работает!')});
//$(function() { /* code here */ });

//Window.onload.addEventListener ("click", getSelection(){alert ('Работает')});
//var getSelectedText = getSelection 