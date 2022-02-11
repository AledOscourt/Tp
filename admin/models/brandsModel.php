<?php
class brands extends database
{
    public $id;
    public $name;

    protected $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }
    public function addBrands()
    {
        $query = 'INSERT INTO `s4u3u_brands`(`name`) VALUES (:name)';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        return $queryPrepare->execute();
    }
    
    public function getBrands()
    {
        $query = 'SELECT b.id AS bID,b.name AS bName,c.name AS cName
        FROM `s4u3u_brands` AS b
        LEFT JOIN `s4u3u_categorybrandslink` AS cbl
        ON b.id = cbl.id_brands 
        LEFT JOIN `s4u3u_categories` AS c
        ON b.id = cbl.id_brands  AND cbl.id_categories = c.id';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    public function getLastBrand()
    {
        $query = 'SELECT max(b.id) AS bLastID
        FROM `s4u3u_brands` AS b';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    public function updateBrand()
    {
        $query = 'UPDATE `s4u3u_brands` SET `name` = :name  WHERE id=:id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function deleteBrand()
    {
        $query = 'DELETE FROM `s4u3u_brands` WHERE id=:id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getBrand()
    {
        $query = 'SELECT `name`
        FROM `s4u3u_brands` 
        where id=:id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
    public function getBrandIdByName()
    {
        $query = 'SELECT `id`
        FROM `s4u3u_brands` 
        where name=:name;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
    public function getBrandsList()
    {
        $query = 'SELECT name AS bName
        FROM `s4u3u_brands`;';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    public function brandsExist()
    {
        $query = 'SELECT   COUNT(id) AS idCount
         FROM `s4u3u_brands` 
        where name=:name;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->execute();
        $result = $queryPrepare->fetch(PDO::FETCH_OBJ);
        return $result->idCount;
    }
}