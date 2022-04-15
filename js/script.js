//Cambiar el color del select - funciona
/*const select = document.querySelector("select");
select.childNodes.forEach(option => {
  if (option.value === select.className)
    option.selected = true
})
*/
//Cambiar al color de la nota
function changeColor(element){
  console.log(element);
  element.className = element.value;
}

function colorText(element){
  element.style.color = "rgb(124, 133, 136)";
}

function normalColor(element){
  element.style.color = "#26c2ff";
}

function colorTitleOver(element){
  element.style.color = "#0000004f";
}

function colorTitleOut(element){
  element.style.color = "fff";
  
}

function bigImg(element){
  element.style.height="19px";
  element.style.width = "19px";
}

function normalImg(element){
  element.style.height="14.3px";
  element.style.width = "14.3px";
}

function SaveOver(element){
  element.style.height = "44px";
  element.style.width = " 97.5px";
  element.style.background = "#03388C";
}

function SaveOut(element){
  element.style.height = "40px";
  element.style.width = "93.5px";
  element.style.background = "#155ED0";
}
/*
setTimeout(function(){
  document.querySelector('.see-note').style.display='inline-block';

},1000);

*/



