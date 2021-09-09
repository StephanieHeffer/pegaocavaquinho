$(document).ready(function(){

  $("p:contains(perg:)").addClass("nsk_perg");
  $("p:contains(op:)").addClass("nsk_op");

function replace(element, from, to) {
    if (element.childNodes.length) {
        element.childNodes.forEach(child => replace(child, from, to));
    } else {
        const cont = element.textContent;
        if (cont) element.textContent = cont.replace(from, to);
    }
};



replace(document.body, new RegExp("perg:", "g"), "");
replace(document.body, new RegExp("op:", "g"), "");

$('.nsk_perg').each(function() {

 $(this).replaceWith($('<div class="pergunta">' +this.innerHTML +'</div>'));
 
});


var count = 1;
$('.pergunta').each(function(){
	var pai = this;
	var filhos  = $(this).first().nextUntil(".pergunta");
	var valor = 1; 

	filhos.each(function(){
		var filhooficial = this.classList.contains('nsk_op');
		if (filhooficial){
			$(this).replaceWith($('<div class="form-check"><input class="form-check-input quiz-nicotina" type="radio" name="pergunta'+ count+ '" id="'+ valor + '" value="'+ valor +'">' +'<label class="form-check-label" for="'+ valor + '">' +this.innerHTML +'</label></div>'));
		valor += 1;
		}
	});

	count++;
});

var qtPrg = $('.pergunta').length;
//console.log(qtPrg);

var div = document.querySelector('div');

 // Executa o cálculo e exibe a mensagem
    $('#btn-calc').on('click', function () {
        var total = 0;
       var mensagem = 'mensagem';
        $('.quiz-nicotina:checked').each(function () {
            total += parseInt($(this).val());
       });
  //     console.log(total);
   //    console.log(div.classList.contains(total));
	console.log(total);
 	//total = Math.round(total);
	//console.log(total);
	total = (Math.round(total / qtPrg)) * qtPrg;
	//console.log(outroValor)	
	$('.resultado-quiz').each(function(){
		if (this.classList.contains(total)){
			console.log(this);
	//		this.style.backgroundColor = "red";
			this.style.display = "block";
		}
		else{
			this.style.display = "none";
		}
	
	});

//      $('#result-calc').html(total + ' pontos<br />' + mensagem);
//var msg = 'somestring='+lc_jqpost_info.somestring;
 // alert( msg );
    });


});




