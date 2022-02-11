<?php
class pops extends database
{
    public $id;
    public $name;
    public $tags;
    public $reference;
    public $officialPopImageInTheBox;
    public $officialPopImageOutBox;
    public $id_brands;
    protected $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }
    public function addPop()
    {
        $query = 'INSERT INTO `s4u3u_pops`(`name`,`tags`,`reference`,`officialPopImageInTheBox`,`officialPopImageOutBox`,`id_brands`) 
        VALUES (:name,:tags,:reference,:officialPopImageInTheBox,:officialPopImageOutBox,:id_brands);';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':tags', $this->tags, PDO::PARAM_INT);
        $queryPrepare->bindValue(':reference', $this->reference, PDO::PARAM_INT);
        $queryPrepare->bindValue(':officialPopImageInTheBox', $this->officialPopImageInTheBox, PDO::PARAM_STR);
        $queryPrepare->bindValue(':officialPopImageOutBox', $this->officialPopImageOutBox, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_brands', $this->id_brands, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getPopsList()
    {
        $query = 'SELECT p.id AS id,p.name AS name,`tags`,`reference`,b.name As bName,c.name As cName
        FROM `s4u3u_pops` AS p
        INNER JOIN `s4u3u_brands` AS b
        ON p.id_brands=b.id
        INNER JOIN `s4u3u_categorybrandslink` AS cbl
        ON cbl.id_brands=b.id
        INNER JOIN `s4u3u_categories` AS c
        ON cbl.id_categories=c.id
        ORDER BY p.id;';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    public function getPop()
    {
        $query = 'SELECT p.name AS name,`tags`,`reference`,b.name As bName
        FROM `s4u3u_pops` AS p
        INNER JOIN `s4u3u_brands` AS b
        ON p.id_brands=b.id
        where p.id=:id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
    public function updatePop()
    {
        $query = 'UPDATE `s4u3u_pops` 
        SET `name`=:name,`tags`=:tags,`reference`=:reference,`officialPopImageInTheBox`=:officialPopImageInTheBox,
        `officialPopImageOutBox`=:officialPopImageOutBox,`id_brands`=:id_brands
        WHERE id=:id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':tags', $this->tags, PDO::PARAM_INT);
        $queryPrepare->bindValue(':reference', $this->reference, PDO::PARAM_INT);
        $queryPrepare->bindValue(':officialPopImageInTheBox', $this->officialPopImageInTheBox, PDO::PARAM_STR);
        $queryPrepare->bindValue(':officialPopImageOutBox', $this->officialPopImageOutBox, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_brands', $this->id_brands, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function deletePops()
    {
        $query = 'DELETE FROM `s4u3u_pops` WHERE id=:id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getPopWithImg()
    {
        $query = 'SELECT p.name AS name,`tags`,`reference`,`officialPopImageInTheBox`,`officialPopImageOutBox`,b.name As bName,c.name As cName
        FROM `s4u3u_pops` AS p
        INNER JOIN `s4u3u_brands` AS b
        ON p.id_brands=b.id
        INNER JOIN `s4u3u_categorybrandslink` AS cbl
        ON cbl.id_brands=b.id
        INNER JOIN `s4u3u_categories` AS c
        ON cbl.id_categories=c.id
        where p.id=:id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
}
