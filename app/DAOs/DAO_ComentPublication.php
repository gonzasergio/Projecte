<?php


interface DAO_ComentPublication {

    public function insertComment(Comment $comment);

    public function getCommentById($id);

    public function getAllReferenceComments();

    public function getComentResponse($commentId);

}