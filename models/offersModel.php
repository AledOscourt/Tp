<?php
class offers extends database
{
    public $id;
    public $date;
    public $price;
    public $nbrClick;
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
        $query = 'INSERT INTO `s4u3u_offers`(`date`,`price`,`id_status`,id_exclusivities,`id_pops`,`id_users`,nbrClick) VALUES (NOW(),:price,:id_status,:id_exclusivities,:id_pops,:id_users,0)';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':price', $this->price, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_status', $this->id_status, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_pops', $this->id_pops, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_exclusivities', $this->id_exclusivities, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getUserOfferList()
    {
        $query = 'SELECT offer.id as id,pop.name as name,tags,reference,officialPopImageInTheBox,exclu.name as excluName,date,price,b.name AS bName,c.name AS cName,nbrClick
        FROM s4u3u_offers AS offer
        INNER JOIN s4u3u_pops AS pop ON id_pops = pop.id
        INNER JOIN s4u3u_exclusivities AS exclu ON id_exclusivities = exclu.id
        INNER JOIN `s4u3u_brands` AS b
        ON pop.id_brands=b.id
        INNER JOIN `s4u3u_categorybrandslink` AS cbl
        ON cbl.id_brands=b.id
        INNER JOIN `s4u3u_categories` AS c
        ON cbl.id_categories=c.id
        where offer.id_users = :id_users
        ORDER BY offer.id
        LIMIT :limit OFFSET :offset ;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->bindValue(':offset', $this->offset, PDO::PARAM_INT);
        $queryPrepare->bindValue(':limit', $this->limit, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
    public function deleteOfferById()
    {
        $query = 'DELETE FROM s4u3u_offers WHERE id=:id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function updateOffer()
    {
        $query = 'UPDATE `s4u3u_offers` SET `price`=:price,id_exclusivities=:id_exclusivities WHERE id=:id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':price', $this->price, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_exclusivities', $this->id_exclusivities, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getOfferList()
    {
        $query = 'SELECT offer.id as id,pop.name as name,price,officialPopImageInTheBox
        FROM s4u3u_offers AS offer
        INNER JOIN s4u3u_pops AS pop ON id_pops = pop.id
        ORDER BY nbrClick desc
        LIMIT :limit OFFSET :offset';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':offset', $this->offset, PDO::PARAM_INT);
        $queryPrepare->bindValue(':limit', $this->limit, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
    public function countOffersPages()
    {
        $query = 'SELECT count(id) as cpt
        FROM s4u3u_offers';
        $queryPrepare = $this->db->query($query);
        $queryresult = $queryPrepare->fetch(PDO::FETCH_OBJ);
        return $queryresult->cpt;
    }
    public function countOffersUsersPages()
    {
        $query = 'SELECT count(id) as cpt
        FROM s4u3u_offers
        where id_users = :id_users';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->execute();
        $queryresult = $queryPrepare->fetch(PDO::FETCH_OBJ);
        return $queryresult->cpt;
    }
    public function getNewOfferList()
    {
        $query = 'SELECT offer.id as id,pop.name as name,price,officialPopImageInTheBox
        FROM s4u3u_offers AS offer
        INNER JOIN s4u3u_pops AS pop ON id_pops = pop.id
        ORDER BY offer.id desc
        LIMIT 3; ';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
    public function getPopularOfferList()
    {
        $query = 'SELECT offer.id as id,pop.name as name,price,officialPopImageInTheBox
        FROM s4u3u_offers AS offer
        INNER JOIN s4u3u_pops AS pop ON id_pops = pop.id
        ORDER BY nbrClick desc
        LIMIT 3;';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
    public function getOfferByIdForUpdate()
    {
        $query = 'SELECT `price`,`id_status`,id_exclusivities
        FROM s4u3u_offers AS offer 
        WHERE id=:id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
    public function getOfferByIdForSupprStatus()
    {
        $query = 'SELECT id_status
        FROM s4u3u_offers AS offer 
        WHERE id=:id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
    public function getOfferById()
    {
        $query = 'SELECT offer.id as id,pop.name as name,tags,reference,officialPopImageInTheBox,officialPopImageOutBox,exclu.name as excluName,date,price,b.name AS bName,c.name AS cName,nbrClick,stat.name as statName,description
        FROM s4u3u_offers AS offer 
        INNER JOIN s4u3u_pops AS pop ON id_pops = pop.id
        INNER JOIN s4u3u_status AS stat ON id_status = stat.id
        INNER JOIN s4u3u_exclusivities AS exclu ON id_exclusivities = exclu.id
        INNER JOIN `s4u3u_brands` AS b
        ON pop.id_brands=b.id
        INNER JOIN `s4u3u_categorybrandslink` AS cbl
        ON cbl.id_brands=b.id
        INNER JOIN `s4u3u_categories` AS c
        ON cbl.id_categories=c.id
        WHERE offer.id=:id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
    public function updateOfferNbrclick()
    {
        $query = 'UPDATE `s4u3u_offers` 
        SET nbrClick=:nbrClick
        WHERE id=:id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':nbrClick', $this->nbrClick, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getOfferListAdmin()
    {
        $query = 'SELECT offer.id as id,pop.name as name,tags,reference,exclu.name as excluName,date,price,b.name AS bName,c.name AS cName,nbrClick,userName
        FROM s4u3u_offers AS offer
        INNER JOIN s4u3u_pops AS pop ON id_pops = pop.id
        INNER JOIN s4u3u_users ON offer.id_users = s4u3u_users.id
        INNER JOIN s4u3u_exclusivities AS exclu ON id_exclusivities = exclu.id
        INNER JOIN `s4u3u_brands` AS b
        ON pop.id_brands=b.id
        INNER JOIN `s4u3u_categorybrandslink` AS cbl
        ON cbl.id_brands=b.id
        INNER JOIN `s4u3u_categories` AS c
        ON cbl.id_categories=c.id;';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
}
