var list = document.querySelector('.more_container');
var items = list.children;
var newItemForm = document.querySelector('.chat-form');
var newMessage = document.querySelector('.chat-form');
var messageTemplate = document.querySelector('#project-template').content;
var newMessageTemplate = messageTemplate.querySelector('.row');

newMessage.addEventListener('submit', function (evt) {
  evt.preventDefault();
  var task = newMessageTemplate.cloneNode(true);
  list.appendChild(task);
});

