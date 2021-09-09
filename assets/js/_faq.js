$(document).ready(function(){
  $("p:contains(perg:)").addClass("nsk_pergunta");
  $("p:contains(resp:)").addClass("nsk_resposta");

  document.body.innerHTML = document.body.innerHTML.replace(/perg:/g, " ");
  document.body.innerHTML = document.body.innerHTML.replace(/resp:/g, " ");
  document.body.innerHTML;

  $('.nsk_resposta').hide(); // Hide all DDs inside .faqs
    $('.nsk_pergunta').hover(function(){$(this).addClass('hover')},function(){$(this).removeClass('hover')}).click(function(){
        // Add class "hover" on dt when hover
        $(this).next().slideToggle(150); // Toggle dd when the respective dt is clicked
    });
});

