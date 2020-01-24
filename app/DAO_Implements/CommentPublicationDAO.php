<?php


class CommentPublicationDAO extends DAO implements DAO_ComentPublication {
    use FormatSQL;

    public function insertComment(Comment $comment) {
        $arr = [];

        foreach ($comment->toArray() as $a)
            $arr[] = ($a != null ) ? $this->packUp($a) : 'null';


        $insert = "INSERT INTO `comenta_publicacio`
        (`id_perfil`,
        `id_publicacio`,
        `texte`,
        `id_resposta`)
        VALUES
        ($arr[1],
        $arr[2],
        $arr[3],
        $arr[4]);";

       $this->connection->prepare($insert)->execute();
    }

    public function getCommentById($id) {
        $comment = null;
        $select = "select * from comenta_publicacio where id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $comment = new Comment($row[1], $row[3], $row[4], $row[2], $row[0]);
        }

        return $comment;
    }

    public function getAllReferenceComments($id) {
        $comment = [];
        $select = "select * from comenta_publicacio where id_publicacio = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $comment[] = new Comment($row[1], $row[3], $row[4], $row[2], $row[0]);
        }

        return $comment;
    }

    public function getComentResponse($id) {
        $comment = [];
        $select = "select * from comenta_publicacio where id_resposta = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $comment[] = new Comment($row[1], $row[3], $row[4], $row[2], $row[0]);
        }

        return $comment;
    }
}