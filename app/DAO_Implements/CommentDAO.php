<?php


class CommentDAO extends DAO implements DAO_ComentPublication {
    use FormatSQL;
    private $refereneTable;
    private $tableName;


    public function __construct($refereneTable, $tableName) {
        parent::__construct();
        $this->refereneTable = $refereneTable;
        $this->tableName = $tableName;
    }


    public function insertComment(Comment $comment) {
        $arr = [];

        foreach ($comment->toArray() as $a)
            $arr[] = ($a != null ) ? $a : null;

        $insert = $this->connection->
        prepare("INSERT INTO $this->tableName (`id_perfil`,`$this->refereneTable`,`texte`,`id_resposta`)
        VALUES(:idPerfil, :idPublicacio, :text, :idResposta)");


        $insert->bindParam(':idPerfil', $arr[1]);
        $insert->bindParam(':idPublicacio', $arr[2]);
        $insert->bindParam(':text', $arr[3]);
        $insert->bindParam(':idResposta', $arr[4]);

        $insert->execute();

    }

    public function getCommentById($id) {
        $comment = null;
        $select = $this->connection->prepare("select * from $this->tableName where id = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $comment = new Comment($row[1], $row[3], $row[4], $row[2], $row[0]);
        }

        return $comment;
    }

    public function getAllReferenceComments($id) {
        $comment = [];

        $select = $this->connection->prepare(
            "select $this->tableName.id, userName, $this->refereneTable, texte, id_resposta
                      from $this->tableName, perfil
                      where id_perfil = perfil.id and $this->refereneTable = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_NUM)) {
            $comment[] = new Comment($row[1], $row[3], $row[4], $row[2], $row[0]);
        }

        return $comment;
    }

    public function getComentResponse($id) {
        $comment = [];
        $select = "select * from $this->tableName where id_resposta = $id";

        $select = $this->connection->prepare("select * from $this->tableName where id_resposta = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_NUM)) {
            $comment[] = new Comment($row[1], $row[3], $row[4], $row[2], $row[0]);
        }

        return $comment;
    }

}