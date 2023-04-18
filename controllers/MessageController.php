<?php

class MessageController extends AbstractController
{


    public function index()
    {
        // TODO: Implement index() method.
        if (isset($_POST['send'])) {
            $username = htmlentities($_POST['usernameMessage']);
            $message = strip_tags($_POST['message']);

            echo "send recu " . $message . " de " . $username;

            $messageData = new MessageEntity();

            $messageData
                ->setUsername($username)
                ->setMessage($message);
            Message::addMessage($messageData);

        }


    }


    public function getMessages()
    {
        require_once(dirname(__DIR__) . '/models/Message.php');

        $model = new Message();
        $sql = $model->selectMessage();

        echo json_encode($sql->fetchAll());
    }








//    public function newMessage()
//    {
//        echo "Fonction new message appelé";
//        if (isset($_GET['send'])) {
//
//            $username = htmlentities($_GET['username']);
//            $message = htmlentities($_GET['message']);
//
//            echo "send recu " . $message ." de ". $username;
//
//            $messageData = new MessageEntity();
//
//            $messageData
//                ->setUsername($username)
//                ->setMessage($message);
//            Message::addMessage($messageData);
//        }
//    }
}


?>