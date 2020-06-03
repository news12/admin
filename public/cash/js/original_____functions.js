
var selectmenu=document.getElementById("selectMenu");
selectmenu.onchange=function(){ //run some code when "onchange" event fires
   var chosenoption=this.options[this.selectedIndex] //this refers to "selectmenu"
   if (chosenoption.value!="0"){
     location.href="?item="+chosenoption.value;
   }
 }
