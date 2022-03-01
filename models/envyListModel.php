<?php
class envylists extends database
{
    public $id;
    public $id_users;
    public $id_offers;
    protected $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }
    public function addInEnvylist()
    {
        $query = 'INSERT INTO `s4u3u_envylists`(`id_users`,`id_offers`) VALUES (:id_users,:id_offers)';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_offers', $this->id_offers, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function deleteEnvy()
    {
        $query = 'DELETE FROM `s4u3u_envylists` WHERE id_offers=:id_offers AND id_users=:id_users';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_offers', $this->id_offers, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function envyExist()
    {
        $query = 'SELECT   COUNT(id) AS envyCount
        FROM    s4u3u_envylists
        WHERE id_offers=:id_offers AND id_users=:id_users';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_offers', $this->id_offers, PDO::PARAM_INT);
        $queryPrepare->execute();
        $queryresult = $queryPrepare->fetch(PDO::FETCH_OBJ);
        return $queryresult->envyCount;
    }
    public function getenvyListUser()
    {
        $query = 'SELECT offer.id as id,pop.name as name,tags,reference,officialPopImageInTheBox,exclu.name as excluName,date,price,b.name AS bName,c.name AS cName,userName
        FROM s4u3u_envylists as envy
        INNER JOIN s4u3u_offers AS offer ON id_offers = offer.id
        INNER JOIN s4u3u_pops AS pop ON id_pops = pop.id
        INNER JOIN s4u3u_exclusivities AS exclu ON id_exclusivities = exclu.id
        INNER JOIN `s4u3u_brands` AS b ON pop.id_brands=b.id
        INNER JOIN `s4u3u_categorybrandslink` AS cbl ON cbl.id_brands=b.id
        INNER JOIN `s4u3u_categories` AS c ON cbl.id_categories=c.id
        INNER JOIN `s4u3u_users` ON offer.id_users=s4u3u_users.id
        WHERE envy.id_users=:id_users
        ORDER BY offer.id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchALL(PDO::FETCH_OBJ);
    }
}