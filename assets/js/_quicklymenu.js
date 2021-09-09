$(document).ready(function(){
var elements = $("h4");

for (var i = 0; i < elements.length; i++) {
     $(elements[i]).attr('id',i);
     var aElement = document.createElement("a");
     var element = elements[i].textContent;
     aElement.innerText = element;
     aElement.setAttribute('href', "#"+i);
     document.getElementById("sumario-doencas").appendChild(aElement);
}

});

