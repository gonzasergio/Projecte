<?php


class CommentRouteController extends CommentController {


    protected function setDAO() {
        return new CommentDAO('id_excurcio', 'comenta_perfil_excursio');
    }
}