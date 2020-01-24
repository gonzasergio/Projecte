<?php


class Comment extends Model {
    private $id;
    private $userId;
    private $text;
    private $responseId;
    private $referenceId;

    /**
     * Comment constructor.
     * @param $userId
     * @param $text
     * @param $responseId
     * @param $id
     */
    public function __construct($userId, $text, $responseId, $referenceId,$id = null) {
        $this->id = $id;
        $this->userId = $userId;
        $this->text = $text;
        $this->responseId = $responseId;
        $this->referenceId = $referenceId;
    }


    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getText() {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getResponseId() {
        return $this->responseId;
    }

    /**
     * @param mixed $responseId
     */
    public function setResponseId($responseId): void {
        $this->responseId = $responseId;
    }

    /**
     * @return mixed
     */
    public function getReferenceId() {
        return $this->referenceId;
    }

    /**
     * @param mixed $referenceId
     */
    public function setReferenceId($referenceId): void {
        $this->referenceId = $referenceId;
    }




    public function toArray() {
        return [
          'id' => $this->id,
          'userId' => $this->userId,
          'referenceId' => $this->referenceId,
          'text' => $this->text,
          'responseId' => $this->responseId
        ];
    }
}