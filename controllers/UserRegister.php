<?php
class UserRegister extends AbstractController
{

    public function index()
    {
        if (isset($_POST['send'])) {
            $username = htmlentities($_POST['new-username']);
            $password = htmlentities($_POST['new-password']);
            $passwordRepeat = htmlentities($_POST['password-repeat']);

            if ($password === $passwordRepeat) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                User::addUser($username, $passwordHash);
            }

        }
    }
}
