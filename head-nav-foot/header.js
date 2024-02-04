var prevScrollPos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollPos > currentScrollPos) {
    document.querySelector('.sticky-header').style.top = '0';
  } else {
    document.querySelector('.sticky-header').style.top = '-100%';
  }
  prevScrollPos = currentScrollPos;
};