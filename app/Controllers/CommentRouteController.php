<?php


class CommentRouteController extends CommentController {


    protected function setDAO() {
        return new CommentDAO('id_excursio', 'comentari_perfil_excursio');
    }
}