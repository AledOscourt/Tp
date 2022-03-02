<?php
class opinions extends database
{
    public $id;
    public $reviewGrade;
    public $content;
    public $reviewDate;
    public $id_users;
    public $id_offers;
    protected $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }
    public function addOpinion()
    {
        $query = 'INSERT INTO `s4u3u_opinions`(`content`,`reviewDate`,`id_users`,id_offers) VALUES (:content,NOW(),:id_users,:id_offers)';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':content', $this->content, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_offers', $this->id_offers, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getOpinionByOffer()
    {
        $query = 'SELECT opinion.id,content,DATE_FORMAT(reviewDate, "%d/%m/%Y %Hh%m") AS reviewDate,id_users,userName
        FROM s4u3u_opinions AS opinion 
        INNER JOIN s4u3u_users ON opinion.id_users = s4u3u_users.id
        WHERE id_offers=:id_offers
        ORDER BY opinion.id desc';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_offers', $this->id_offers, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchALL(PDO::FETCH_OBJ);
    }
    public function deleteOpinionById()
    {
        $query = 'DELETE FROM s4u3u_opinions WHERE id=:id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getOpinionByUser()
    {
        $query = 'SELECT opinion.id,content,DATE_FORMAT(reviewDate, "%d/%m/%Y %Hh%m") AS reviewDate,opinion.id_users,userName,name,tags,offer.id
        FROM s4u3u_opinions AS opinion 
        INNER JOIN s4u3u_users ON opinion.id_users = s4u3u_users.id
        INNER JOIN s4u3u_offers as offer ON opinion.id_offers = offer.id
        INNER JOIN s4u3u_pops AS pop ON offer.id_pops = pop.id
        WHERE opinion.id_users=:id_users
        ORDER BY opinion.id desc';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchALL(PDO::FETCH_OBJ);
    }
    public function getOpinionForAdmin()
    {
        $query = 'SELECT opinion.id as id,content,DATE_FORMAT(reviewDate, "%d/%m/%Y %Hh%m") AS reviewDate,userName,name,tags,offer.id as offId
        FROM s4u3u_opinions AS opinion 
        INNER JOIN s4u3u_users ON opinion.id_users = s4u3u_users.id
        INNER JOIN s4u3u_offers as offer ON opinion.id_offers = offer.id
        INNER JOIN s4u3u_pops AS pop ON offer.id_pops = pop.id
        ORDER BY opinion.id desc';
        $queryPrepare = $this->db->query($query); 
        return $queryPrepare->fetchALL(PDO::FETCH_OBJ);
    }
}