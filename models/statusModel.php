<?php
class status extends database
{
    public $id;
    public $name;
    public $description;
    protected $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }
    public function addStatus()
    {
        $query = 'INSERT INTO `s4u3u_status`(`name`,`description`) VALUES (:name,:description)';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':description', $this->description, PDO::PARAM_STR);
        return $queryPrepare->execute();
    }
    public function updateStatus()
    {
        $query = 'UPDATE `s4u3u_status` SET name=:name,description=:description WHERE id=:id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getStatusById()
    {
        $query = 'SELECT `name`,`description` 
        FROM `s4u3u_status` 
        WHERE id=:id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
    public function deleteOfferById()
    {
        $query = 'DELETE FROM s4u3u_status WHERE id=:id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
}