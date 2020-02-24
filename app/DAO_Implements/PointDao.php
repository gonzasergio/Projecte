<?php


class PointDao extends DAO implements DAO_Point{

    public function getFirstZoneOfAllRoutes() {
        $points = [];

        $select = 'select cordenada_x, cordenada_y, id_nivell, punts.id 
        from excursio, zona, punts
        where excursio.id = id_excursio
        and zona.id = id_zona
        group by excursio.id, zona.id';

        $stmt = $this->executeQuery($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $points[] = new Point($row[0], $row[1], $row[2], $row[3]);
        }

        return $points;
    }

    public function getRoutesZone($id) {
        $points = [];

        $select = $this->
        connection->prepare('select cordenada_x, cordenada_y, id_nivell, punts.id
        from punts, zona 
        where id_zona = zona.id
        and id_excursio = :id');

        $select->bindParam(':id', $id);
        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_NUM)) {
            $points[] = new Point($row[0], $row[1], $row[2], $row[3]);
        }

        return $points;
    }
}