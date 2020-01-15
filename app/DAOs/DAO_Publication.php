<?php


interface DAO_Publication {

    public function insert(Publication $publication);

    public function getPublicationById($id);

    public function deletePublicationById($id);

    public function getAllPublicationsFromUser($userId);

    public function getAllPublicationsFromRoute($routeId);

    public function updatePublication($id, $colName, $newValue);

    public function getFollowsPublications($id);
}