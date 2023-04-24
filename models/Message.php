<?php


class Message
{


    public static function addMessage(MessageEntity $messageData)
    {
        $insert = Connect::getPDO()->prepare("INSERT INTO message (message, date, username, color_message)
                                                    VALUES (:message, :date, :username, :color)");

        $date = date('Y-m-d H:i:s');

        $insert->bindValue(':message', $messageData->getMessage());
        $insert->bindValue(':username', $messageData->getUsername());
        $insert->bindValue(':color', $messageData->getColor());
        $insert->bindValue(':date', $date);
        if ($insert->execute()) {
            $messageData
                ->setMessage('')
                ->setUsername('')
                ->setColor('');
            header('location: http://localhost:8080/');

        }
    }


    public static function selectMessage()
    {
        $get = Connect::getPDO()->prepare("SELECT * FROM message order by id desc limit 50");

        if ($get->execute()) {
            $get->setFetchMode(\PDO::FETCH_ASSOC);
            return $get;
        }
    }
}