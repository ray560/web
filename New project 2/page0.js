//variables
let sliderImages = document.querySelectorAll('.slide');
let arrowRight = document.querySelector('#arrow-right');
let arrowLeft = document.querySelector('#arrow-left');
let current = 0;

//clear all images
function reset(){
  for (let i = 0; i < sliderImages.length; i++) {
    sliderImages[i].style.display = 'none';
  }
}
//initializes the slider
function startSlide(){
  reset();
  sliderImages[0].style.display = 'block';
}

//show prev
function slideLeft() {
  reset();
  sliderImages[current - 1].style.display = 'block';
  current--;
}

//show next
function slideRight() {
  reset();
  sliderImages[current + 1].style.display = 'block';
  current++
}

//right arrow click
arrowRight.addEventListener('click', function() {
  if (current == sliderImages.length -1) {
    current = -1
  }
  slideRight();
})


//left arrow click
arrowLeft.addEventListener('click', function() {
  if (current == 0) {
    current = sliderImages.length;
  }
  slideLeft();
});


startSlide();



//smooth scrolling from css-tricks.com
//select all links with hashtags
//remove the links that dont actually link to anything
/*$('a[href*="#"]')
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function(event){
        //on-page links
        if(
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        //figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        //if a scroll target exits, only prevent default if animation i actually gonna happen
        if(target.length){
          event.preventDefault();
          $('html, body').animate({
            scrollTop:target.offset().top
          }, 1000, function(){
            //callback after animation
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) {
              return false;
            }else{
              //adding tabindex for elements not focusable
              $target.attr('tabindex', '-1');
              $target.focus();
            };
          });
        };
      }
    });
*/
