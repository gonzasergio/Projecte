<?php


class CommentCursController extends CommentController {


    protected function setDAO() {
        return new CommentDAO('id_curs', 'comentari_perfil_curs');
    }
}