 var count=1;
function change(){
  setTimeout('change()',3000);
  var img1=document.getElementById("img1").src="../img/"+count+".jpg";
  var a=count+1;
  var img2=document.getElementById("img2").src="../img/"+a+".jpg";
  
   var img3=document.getElementById("img3").src="../img/"+a+".jpg";
  var img4=document.getElementById("img4").src="../img/"+count+".jpg";
     count++;
   if(count>3)
    count=1;
}

 
 