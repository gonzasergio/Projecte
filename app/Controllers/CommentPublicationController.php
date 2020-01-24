<?php


class CommentPublicationController extends Controller {

    public function __construct() {
        $this->DAO = new CommentPublicationDAO();
    }

    public function insertComment(){
        $req = $_REQUEST;
        $comment = new Comment($req['userId'],$req['text'], $req['respId'],$req['ref']);
        $this->DAO->insertComment($comment);
    }


    public function getCommentById(){
        $id = $_REQUEST['id'];
        $comment = $this->DAO->getCommentById($id);

        echo json_encode($comment->toArray());
    }

    public function getReferenceComments(){
        $id = $_REQUEST['id'];
        $arr = [];
        $comment = $this->DAO->getAllReferenceComments($id);

        foreach ($comment as $c)
            $arr[] = $c->toArray();

        echo json_encode($arr);
    }

    public function getResponseComments(){
        $id = $_REQUEST['id'];
        $arr = [];
        $comment = $this->DAO->getComentResponse($id);

        foreach ($comment as $c)
            $arr[] = $c->toArray();

        echo json_encode($arr);
    }
}