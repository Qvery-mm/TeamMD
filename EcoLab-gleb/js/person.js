var popup = document.querySelector('.visible_form');
var block = document.querySelector('.fh5co-contact');
var close =  document.querySelector('.danger');
var eventProfile = document.querySelector('.event_fh5co');
var openeventProfile = document.querySelector('.opn');
var openPopupButton = document.querySelector('.crt');
var closePopupButton = document.querySelector('.cls');

openPopupButton.addEventListener('click', function (evt) {
  evt.preventDefault();
  popup.classList.remove('unvisible');
  block.classList.remove('displayed');
  close.classList.remove('displayed');
});

close.addEventListener('click', function (evt) {
  popup.classList.add('unvisible');
  block.classList.add('displayed');
  close.classList.add('displayed');
});

closePopupButton.addEventListener('click', function (evt) {
  popup.classList.add('unvisible');
  block.classList.add('displayed');
});

openeventProfile.addEventListener('click', function (evt) {
	evt.preventDefault();
  eventProfile.classList.remove('displayed');
  close.classList.remove('displayed');
  close.addEventListener('click', function (evt) {
  eventProfile.classList.add('displayed');
  close.classList.add('displayed');
});
});
