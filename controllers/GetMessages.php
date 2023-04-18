<?php
class GetMessages extends AbstractController {



    public function index()
    {
        $model = new Message();
        $sql = $model->selectMessage();

        echo json_encode($sql->fetchAll());
    }


}


