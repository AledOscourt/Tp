<?php
class offers extends database
{
    public $id;
    public $date;
    public $price;
    public $id_status;
    public $id_exclusivities;
    public $id_pops;
    public $id_users;
    protected $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }
    public function addOffer()
    {
        $query = 'INSERT INTO `s4u3u_offers`(`date`,`price`,`id_status`,id_exclusivities,`id_pops`,`id_users`) VALUES (NOW(),:price,:id_status,:id_exclusivities,:id_pops,:id_users)';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':price', $this->price, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_status', $this->id_status, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_pops', $this->id_pops, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_exclusivities', $this->id_exclusivities, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getNewUsersList()
    {
        $query = 'SELECT  pop.name,tags,reference,officialPopImageInTheBox,exclu.name,date,price,b.name AS bName,c.name AS cName
        FROM s4u3u_offers AS offer
        INNER JOIN s4u3u_pops AS pop ON id_pops = pop.id
        INNER JOIN s4u3u_exclusivities AS exclu ON id_exclusivities = exclu.id
        INNER JOIN `s4u3u_brands` AS b
        ON pop.id_brands=b.id
        INNER JOIN `s4u3u_categorybrandslink` AS cbl
        ON cbl.id_brands=b.id
        INNER JOIN `s4u3u_categories` AS c
        ON cbl.id_categories=c.id
where id_users = :id_users; ';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
}
