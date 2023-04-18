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

    public static function ConnectUser($username, $password) {
        $get = Connect::getPDO()->prepare("SELECT * FROM user WHERE username = :username");
        $get->bindValue(':username', $username);
        if ($get->execute()) {
            $datas = $get->fetchAll();
            foreach ($datas as $data) {
                if (password_verify($password, $data['password'])) {
                    $update = Connect::getPDO()->prepare("UPDATE user SET connected = :connected WHERE id = :id");
                    $update->bindValue(':id', $data['id']);
                    $update->bindValue(':connected', 1);
                    if ($update->execute()) {
                        if($username==$data['username']){
                            $response[] = array('status'=>1);
                        }else{
                            $response[] = array('status'=>0);
                        }
                        return $data['username'];
                    }
                }
            }
        }
    }

}
