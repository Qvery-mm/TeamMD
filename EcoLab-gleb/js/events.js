var list = document.querySelector('.event_content');
var items = list.children;
var newItemForm = document.querySelector('.chat-form');
var newMessage = document.querySelector('.chat-form');
var messageTemplate = document.querySelector('#events-template').content;
var newMessageTemplate = messageTemplate.querySelector('.col-half');

newMessage.addEventListener('submit', function (evt) {
  evt.preventDefault();
  var task = newMessageTemplate.cloneNode(true);
  list.appendChild(task);
});

