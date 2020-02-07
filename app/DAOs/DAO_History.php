<?php


interface DAO_History {

    public function insertHistory(History $history);

    public function getHistoryByIdPropietari($id);

    public function deleteHistoryById($id);

}