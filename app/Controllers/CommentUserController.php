<?php


class CommentUserController extends CommentController {


    protected function setDAO() {
        return new CommentDAO('id_perfil_comentat', 'comenta_perfil');
    }
}
