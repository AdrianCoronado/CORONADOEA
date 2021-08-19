console.log("enteee");
const menu = document.querySelector(".menu-list");
const menuBtn = document.querySelector(".menu-btn");
const cancelBtn = document.querySelector(".cancel-btn");

console.log(menu);

menuBtn.onclick = ()=>{
  menu.classList.add('active');
  menuBtn.classList.add('hide');
}

cancelBtn.onclick = ()=>{
  menu.classList.remove('active');
  menuBtn.classList.remove('hide');
}

$(document).ready(function(){



   $('.menu-list').on('click','li a', function(){

    var elem = $(this);
    var x =$('.menu-list');
    var y =$('.menu-btn');

    x.removeClass("active");
    y.removeClass("hide");
 });

});


$(document).ready(function() { //when document(DOM) loads completely
  waypoints();
});


function waypoints(){
  
/*========== WAYPOINTS ANIMATION DELAY ==========*/
//Original Resource: https://www.oxygenna.com/tutorials/scroll-animations-using-waypoints-js-animate-css
$(function () { // a self calling function
  function onScrollInit(items, trigger) { // a custom made function
      items.each(function () { //for every element in items run function
          var osElement = $(this), //set osElement to the current
              osAnimationClass = osElement.attr('data-animation'), //get value of attribute data-animation type
              osAnimationDelay = osElement.attr('data-delay'); //get value of attribute data-delay time

          osElement.css({ //change css of element
              '-webkit-animation-delay': osAnimationDelay, //for safari browsers
              '-moz-animation-delay': osAnimationDelay, //for mozilla browsers
              'animation-delay': osAnimationDelay //normal
          });

          var osTrigger = (trigger) ? trigger : osElement; //if trigger is present, set it to osTrigger. Else set osElement to osTrigger

          osTrigger.waypoint(function () { //scroll upwards and downwards
              osElement.addClass('animated').addClass(osAnimationClass); //add animated and the data-animation class to the element.
          }, {
                  triggerOnce: true, //only once this animation should happen
                  offset: '60%' // animation should happen when the element is 70% below from the top of the browser window
              });
      });
  }

  onScrollInit($('.os-animation')); //function call with only items
  onScrollInit($('.staggered-animation'), $('.staggered-animation-container')); //function call with items and trigger
});


$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop()>500){
            $('.top-scroll').fadeIn();
        }else{
            $('.top-scroll').fadeOut();
        }
    });
});


}



   












