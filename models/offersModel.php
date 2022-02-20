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
        $query = 'INSERT INTO `s4u3u_opinions`(`date`,`price`,`id_status`,id_exclusivities,`id_pops`,`id_users`) VALUES (NOW(),`:price`,`:id_status`,:id_exclusivities,:id_pops,:id_users)';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':price', $this->reviewGrade, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_status', $this->reviewGrade, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_pops', $this->id_pops, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_exclusivities',$this->id_exclusivities, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    
}