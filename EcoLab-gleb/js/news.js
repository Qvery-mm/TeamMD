var list = document.querySelector('.more_container');
var items = list.children;
var newMessage = document.querySelector('.chat-form');
var messageTemplate = document.querySelector('#news-template').content;
var newMessageTemplate = messageTemplate.querySelector('.col-xs-12');

newMessage.addEventListener('submit', function (evt) {
  evt.preventDefault();
  var task = newMessageTemplate.cloneNode(true);
  list.appendChild(task);
});

