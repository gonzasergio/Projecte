<?php


class HistoryDAO implements DAO_History {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insertHistory(History $history) {
        $img = $history->getImage();
        $idUser = $history->getIdUser();

        $insert = $this->connection->prepare("INSERT INTO historia
        (`imatge`, `id_perfil_propietari`, `dia`, `hora`)values (:img, :idUser, current_date(), current_time())");
        $insert->bindParam(':img', $img);
        $insert->bindParam(':idUser', $idUser);

        $insert->execute();
    }

    public function getHistoryByIdPropietari($id) {
        $historys = [];

        $select = $this->connection->prepare("SELECT * FROM historia WHERE id_perfil_propietari = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_NUM)) {
            $historys[] = new History($row[1], $row[2], $row[3], $row[4], $row[0]);
        }

        return $historys;
    }

    public function deleteHistoryById($id) {
        $delete = $this->connection->prepare("DELETE FROM historia WHERE id = :id");
        $delete->bindParam(':id', $id);

        $delete->execute();
    }
}