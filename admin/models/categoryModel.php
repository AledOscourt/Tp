<?php
class category extends database
{
    public $id;
    public $name;

    protected $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }
    public function addCategory()
    {
        $query = 'INSERT INTO `s4u3u_categories`(`name`) VALUES (UPPER(:name));';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        return $queryPrepare->execute();
    }
    public function getCategory()
    {
        $query = 'SELECT c.id AS cID,c.name AS cName, count(b.name) AS bName
        FROM `s4u3u_categories` AS c
        LEFT JOIN `s4u3u_categorybrandslink` AS cbl
        ON c.id = cbl.id_categories
        LEFT JOIN `s4u3u_brands` AS b
        ON c.id = cbl.id_categories AND cbl.id_brands = b.id 
        GROUP BY c.id;';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    public function deleteCategory()
    {
        $query = 'DELETE FROM `s4u3u_categories` WHERE id=:id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getCategoryforUpdate()
    {
        $query = 'SELECT id,name
        FROM `s4u3u_categories`
        where id=:id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
    public function updateCategory()
    {
        $query = 'UPDATE `s4u3u_categories`
         SET `name` = UPPER(:name)  
         WHERE id=:id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    
}