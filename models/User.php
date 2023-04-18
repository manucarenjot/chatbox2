<?php
class User
{

    public static function addUser($username, $password) {
        $add = Connect::getPDO()->prepare("INSERT INTO user (username, password, connected)
                                                    VALUES (:username, :password, :connected)");

        $add->bindValue(':username', $username);
        $add->bindValue(':password', $password);
        $add->bindValue(':connected', 0);

        if ($add->execute()) {
            header("Location: http://localhost:8080/log");
        }
    }

}
