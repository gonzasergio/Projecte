<?php


class CommentPublicationController extends CommentController {


    protected function setDAO() {
        return new CommentDAO('id_publicacio', 'comenta_publicacio');
    }
}