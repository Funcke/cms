<?php
use Core\Controller;
use Core\Request;
use Models\Chat;
use Models\Message;
use Models\User;

class ChatController extends Controller
{
    public static function create(Request &$request)
    {
        #self::render('session/new', $request, array('title' => 'Welcome to my Blog!', $request->params));
    }
    
    public static function index(Request &$request)
    {
      $chats = Chat::find(array(
        "User1" => $request->session['logedin']
      ));
      array_merge($chats, Chat::find(array("User2" => $request->session['logedin'])));
      self::render('chat/view', $request, array('title' => 'Chat', 'chats' => $chats, 'users' => User::find([])));
    }

    public static function show(Request &$request)
    {
      echo json_encode(self::messages($request->params['chat_id']));
    }

    public static function send(Request &$request)
    {
      $chat = self::find_chat($request->session['logedin'], $request->params['target']);
      if($chat == null) {
        $chat = new Chat();
        $chat->User1 = $request->session['logedin'];
        $chat->User2 = $request->params['target'];
        $chat->store();
        $chat = Chat::find(array("User1" => $request->session['logedin'], "User2" => $request->params['target']))[0];
      }
      $message = new Message();
      $message->ChatId = $chat->id;
      $message->Sender = $request->session['logedin'];
      $message->Content = $request->params['msg'];
      $message->store();
    }

    public static function recieve_update(Request &$request)
    {
      $chat = self::find_chat($request->session['logedin'], $request->params['chat_id']);
      $new_messages = self::messages($chat->id);
      $payload = [];
      if(array_key_exists('last_refresh', $request->params)) {
        foreach($new_messages as $m) {
          if($m > $request->params['last_refresh'])
            array_push($payload, $m);
        }
      } else {
        $payload = array_slice($new_messages, -50);
      }

      echo json_encode($payload);
    }

    private static function find_chat($sender, $reciever)
    {
      $chat = Chat::find(array(
        "User1" => $sender,
        "User2" => $reciever
      ))[0];
      if($chat == null)
        $chat = Chat::find(array(
          "User2" => $sender,
          "User1" => $reciever
        ))[0];
      return $chat;
    }
    
    private static function messages($chat_id)
    {
      return Message::find(array(
          "ChatId" => $chat_id
      ));
    }
}