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
        $query = 'INSERT INTO `s4u3u_images`(`image`,`id_offers`) VALUES (:image,:id_offers)';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':image', $this->image, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_offers', $this->id_offers, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getImagesByOffer()
    {
        $query = 'SELECT `image`
        FROM s4u3u_images 
        WHERE id_offers=:id_offers';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_offers', $this->id_offers, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchALL(PDO::FETCH_OBJ);
    }
}