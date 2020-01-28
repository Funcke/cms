<ul>
  <?php foreach($params['users'] as $u): ?>
    <? if($u->id !== $request->session['logedin']): ?>
      <li><?= $u->Email ?> <button type="button" class="btn btn-primary" onclick="setInfo(<?= $u->id ?>);loadMessages()" data-toggle="modal" data-target="#chatModal">
      Send Message
      </button></li>
    <? endif; ?>
  <?php endforeach; ?>
</ul>

<div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="chatModalLabel">Chat Now!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul id="chatTarget">
        </ul>
      </div>
      <div class="modal-footer">
        <input type="text" id="newMessage"/>
        <button type="button" onclick="sendMessage()" />
        <button type="button" class="btn btn-warning" onclick="loadMessages()">Load</button>
      </div>
    </div>
  </div>
</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
let partner = null;

function setInfo(id) {
  partner = id;
  console.log(id);
}

function loadMessages() {
  axios.get('chat/refresh?chat_id=' + partner).then(function(data) {
    let messages = data.data;
    $('#chatTarget').empty();
    messages.forEach(function(element){
      console.log(element);
      $('#chatTarget').append("<li class='message " + 
      (element.Sender === "<?= $request->session['logedin'] ?>"? 'self' : 'partner')
       + "'>" + element.Content + "<span>" + element.CreatedAt + "</span></li>");
    })
  });
}

function sendMessage() {
  var msg = $('#newMessage').val();
  $('#newMessage').empty();
  axios.post('chat', {target: partner, msg: msg}).then(loadMessages());
}
</script>

<style>
  ul {
    list-style-type: none;
  }
  li span {
    padding-right: 1em;
    float: right;
  }
  .message {
    margin-bottom: 1vh;
  }
  .self {
    background-color: #9ccc65;
    border-radius: 50px;
    padding-left: 1em;
    width: 80%;
    float: left;
  }
  .partner {
    background-color: #e4f0f5;
    border-radius: 50px;
    padding-left: 1em;
    width: 80%;
    float: right;
  }
</style>