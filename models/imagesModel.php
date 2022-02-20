<?php
class images extends database
{
    public $id;
    public $image;
    public $id_offers;
    protected $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }
    public function addImage()
    {
        $query = 'INSERT INTO `s4u3u_opinions`(`image`,`id_offers`) VALUES (:image,:id_offers)';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':image', $this->content, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_offers', $this->id_pops, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    
}