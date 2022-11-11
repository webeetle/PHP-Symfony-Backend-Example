<?php

namespace App\Core\Entities;

class Todo
{
    private $id;
    private $title;
    private $description;
    private $done;
    private $createdAt;
    private $updatedAt;
    private $userId;

    public function __construct($id, $title, $description, $done, $createdAt, $updatedAt, $userId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->done = $done;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->userId = $userId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function isDone()
    {
        return $this->done;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function makeDone()
    {
        if (!$this->done) {
            $this->done = true;
        } else {
            throw new Exception('Todo is already done');
        }
    }

}