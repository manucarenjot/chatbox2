<?php
class ConnectUser extends AbstractController {

    public function index()
    {
        $data = json_decode(file_get_contents("php://input"));
        $request = $data->request;
        if($request == 1){
            $username = $data->username;
            $password = $data->password;

            $model = new User();
            $sql = $model->ConnectUser($username, $password);

            echo json_encode($sql);

            exit;
        }



        if (isset($_POST['send'])) {
            $username = htmlentities($_POST['username']);
            $password = htmlentities($_POST['password']);


            User::ConnectUser($username, $password);
        }
    }
}
