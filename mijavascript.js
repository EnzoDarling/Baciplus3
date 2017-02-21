$(document).ready(main);
var contador = 1;
function main(){
  $('.menu-bar').click(function(){
      // $('.Menu').toggle();
      if(contador == 1){
        $('.Menu').animate({
          left: '0'
        });
      } else {
         $('.Menu').animate({
          left: '-100%'
        });
      }
  });
};