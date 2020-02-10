<?php


abstract class CommentController extends Controller {

    public function __construct() {
        $this->DAO = $this->setDAO();
    }

    public function insertComment($param){
        $req = $_REQUEST;
        $comment = new Comment($req['userId'],$req['text'], $req['respId'],$param['id']);
        $this->DAO->insertComment($comment);
    }


    public function getCommentById($param){
        $id = $param['idCom'];
        $comment = $this->DAO->getCommentById($id);

        echo json_encode($comment->toArray());
    }

    public function getReferenceComments($param){
        $id = $param['id'];
        $arr = [];
        $comment = $this->DAO->getAllReferenceComments($id);

        foreach ($comment as $c)
            $arr[] = $c->toArray();

        echo json_encode($arr);
    }

    public function getResponseComments($param){
        $id = $param['id'];
        $arr = [];
        $comment = $this->DAO->getComentResponse($id);

        foreach ($comment as $c)
            $arr[] = $c->toArray();

        echo json_encode($arr);
    }

    protected abstract function setDAO();

}