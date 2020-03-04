<?php


class PublicationDAO implements DAO_Publication {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Publication $publication) {
        $img = $publication->getImg();
        $text = $publication->getText();
        $user = $publication->getUser();
        $route = $publication->getRoute();

        $insert = $this->connection->prepare("INSERT INTO `publicacio`
        (`imatge`,`texte`,`id_perfil_propietari`,`id_excursio`)
        VALUES (:img, :text, :user, :route)");

        $insert->bindParam(':img', $img);
        $insert->bindParam(':text', $text);
        $insert->bindParam(':user', $user);
        $insert->bindParam(':route', $route);

        $insert->execute();
    }

    public function getPublicationById($id) {
        $publication = null;
        $select = $this->connection->prepare("SELECT * FROM publicacio WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $publication = new Publication($row[1], $row[2], $row[3], $row[4], $row[0]);
        }

        return $publication;
    }

    public function deletePublicationById($id) {
        $select = $this->connection->prepare("DELETE FROM publicacio WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
    }

    public function getAllPublicationsFromUser($userId) {
        $publication = [];
        $select = $this->connection->prepare("SELECT * FROM publicacio WHERE id_perfil_propietari = :userId");
        $select->bindParam(':userId', $userId);

        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_NUM)) {
            $publication[] = new Publication($row[1], $row[2], $row[3], $row[4], $row[0]);
        }

        return $publication;
    }

    public function getAllPublicationsFromRoute($routeId) {
        $publication = [];
        $select = $this->connection->prepare("SELECT * FROM publicacio WHERE id_excursio = :routeId");
        $select->bindParam(':routeId', $routeId);

        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_NUM)) {
            $publication[] = new Publication($row[1], $row[2], $row[3], $row[4], $row[0]);
        }

        return $publication;
    }

    public function updatePublication($id, $colName, $newValue) {
        $update = $this->connection->prepare("UPDATE publicacio SET :colName = :newValue WHERE id = :id");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();;
    }

    public function getFollowsPublications($id){
        $publications = [];
        $select = $this->connection->prepare("select publicacio.id, imatge, publicacio.texte, id_perfil_propietari, id_excursio,
        (select count(likes.id_publicacio) num
        from likes
        where likes.id_publicacio = publicacio.id) as likes,
        (select count(comenta_publicacio.id) num
        from comenta_publicacio
        where comenta_publicacio.id_publicacio = publicacio.id) as comenari
        from publicacio, seguir
        where id_perfil_propietari = seguir.id_perfil_seguit
        or id_perfil_propietari = :id
        and seguir.id_perfil = :id
        group by publicacio.id order by publicacio.id desc ");
        $select->bindParam(':id', $id);

        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_NUM)) {

            $userName = $this->connection->prepare('SELECT userName FROM perfil where id = :id;');
            $userName->bindParam(':id', $row[3]);

            $userName->execute();

            $userName = $userName->fetch(PDO::FETCH_NUM);
            $userName = $userName[0];

            $publication = new Publication($row[1], $row[2], $userName, $row[4], $row[0]);
            $publication->setLikeNum($row[5]);
            $publication->setCommentNum($row[6]);

            $publications[] = $publication;
        }

        return $publications;
    }


    public function getMaxId($id) {
        $maxId = 0;
        $select = $this->connection->prepare("select IFNULL(max(id), 0) from publicacio where id_perfil_propietari = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $maxId = $row[0];
        }

        return $maxId;
    }

}