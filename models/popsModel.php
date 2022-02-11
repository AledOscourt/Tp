<?php
class pops extends database
{
    public $id;
    public $name;
    public $tags;
    public $reference;
    public $officialPopImageInTheBox;
    public $officialPopImageOutBox;
    public $id_exclusivities;
    public $id_brands;
    protected $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }
    public function addPop()
    {
        $query = 'INSERT INTO `s4u3u_pops`(`name`,`tags`,`reference`,`officialPopImageInTheBox`,`officialPopImageOutBox`,`id_exclusivities`,`id_brands`) 
        VALUES (:name,:tags,:reference,:officialPopImageInTheBox,:officialPopImageOutBox,:id_exclusivities,:id_brands';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':tags', $this->tags, PDO::PARAM_INT);
        $queryPrepare->bindValue(':reference', $this->reference, PDO::PARAM_INT);
        $queryPrepare->bindValue(':officialPopImageInTheBox', $this->officialPopImageInTheBox, PDO::PARAM_STR);
        $queryPrepare->bindValue(':officialPopImageOutBox', $this->officialPopImageOutBox, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_exclusivities', $this->id_exclusivities, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_brands', $this->id_brands, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getPops()
    {
        $query = '';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
}