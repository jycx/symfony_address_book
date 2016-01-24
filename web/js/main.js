 var count=1;
function change(){
  setTimeout('change()',3000);
  var img=document.getElementById("img").src="../img/"+count+".jpg";
     count++;
   if(count>3)
    count=1;
}

 
 