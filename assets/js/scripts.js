const accordion = document.getElementsByClassName('accordion-box');

for (i=0; i<accordion.length; i++) {
  accordion[i].addEventListener('click', function () {
    this.classList.toggle('active');
    // accordion-title
    if ( this.childNodes[1].style.backgroundColor == '') {
      this.childNodes[1].style.backgroundColor = this.getAttribute('color')=== null ? this.getAttribute('color') : "#75B7A0";

    }else{
      this.childNodes[1].style.backgroundColor = '';
    }
    // change icon
    if ( this.childNodes[1].childNodes[3].classList.contains('fa-angle-down')) {
      this.childNodes[1].childNodes[3].classList.remove('fa-angle-down');
      this.childNodes[1].childNodes[3].classList.add('fa-angle-up');

    }else{
      this.childNodes[1].childNodes[3].classList.remove('fa-angle-up');
      this.childNodes[1].childNodes[3].classList.add('fa-angle-down');
    }
    if(this.getAttribute('after') !== null){
      this.classList.toggle(this.getAttribute('after'));
      
    }

    // accordion-content
    this.childNodes[3].classList.toggle('px-11');
    this.childNodes[3].classList.toggle('py-10');
    // this.style.backgroundColor = "blue";

     
  })
}
var swiper = new Swiper(".swiper", {
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    renderBullet: function (index, className) {
      return '<div class="' + className + '"></div>';
    },
  },
});
