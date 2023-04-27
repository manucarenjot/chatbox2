<?php


class Message
{


    public static function addMessage(MessageEntity $messageData)
    {
        $insert = Connect::getPDO()->prepare("INSERT INTO message (message, date, hours,username, color_message)
                                                    VALUES (:message, :date, :hours,:username, :color)");
        date_default_timezone_set('Europe/Brussels');
        $date = date("Y.m.d");
        $hours = date("H:i:s");

        $insert->bindValue(':message', $messageData->getMessage());
        $insert->bindValue(':username', $messageData->getUsername());
        $insert->bindValue(':color', $messageData->getColor());
        $insert->bindValue(':date', $date);
        $insert->bindValue(':hours', $hours);
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

        $date = date("Y.m.d");
        $get = Connect::getPDO()->prepare("SELECT * FROM message WHERE date = :date order by id desc limit 15");
        $get->bindValue(':date', $date);

        if ($get->execute()) {

            $get->setFetchMode(\PDO::FETCH_ASSOC);
            return $get;
        }
    }
}