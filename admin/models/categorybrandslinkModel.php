<?php
class categoriesBrandsLink extends database
{
    public $id_brands;
    public $id_categories;

    protected $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }
   
    public function addBrandsLink()
    {
        $query = 'INSERT INTO `s4u3u_categorybrandslink`(`id_brands`,`id_categories`) VALUES (:id_brands,:id_categories);';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_brands', $this->id_brands, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function updateBrandLink()
    {
        $query = 'UPDATE `s4u3u_categorybrandslink` SET `id_categories` = :id_categories WHERE id_brands=:id_brands;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_brands', $this->id_brands, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function deleteBrandLink()
    {
        $query = 'DELETE FROM `s4u3u_categorybrandslink` WHERE id_brands=:id_brands;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_brands', $this->id_brands, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function deleteCategoryLink()
    {
        $query = 'DELETE FROM `s4u3u_categorybrandslink` WHERE id_categories=:id_categories;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getIDBrand()
    {
        $query = 'SELECT b.id AS bID
        FROM `s4u3u_categorybrandslink` AS cbl
        INNER JOIN `s4u3u_brands` AS b
        ON b.id = cbl.id_brands
        WHERE id_categories=:id_categories;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchALL(PDO::FETCH_OBJ);
    }
    public function getCategoriesIdByBrandsId()
    {
        $query = 'SELECT c.id AS cID,c.name AS cName
        FROM `s4u3u_categorybrandslink` AS cbl
        INNER JOIN `s4u3u_categories` AS c
        ON c.id = cbl.id_categories
        WHERE id_brands=:id_brands;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_brands', $this->id_brands, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
    
}