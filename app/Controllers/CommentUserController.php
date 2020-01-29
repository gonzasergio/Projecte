<?php


class CommentUserController extends CommentController {


    protected function setDAO() {
        return new CommentDAO('id_perfil', 'comenta_perfil');
    }
}