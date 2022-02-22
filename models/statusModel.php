<?php
class status extends database
{
    public $id;
    public $name;
    public $description;
    protected $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }
    public function addStatus()
    {
        $query = 'INSERT INTO `s4u3u_status`(`name`,`description`) VALUES (:name,:description)';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':description', $this->description, PDO::PARAM_STR);
        return $queryPrepare->execute();
    }
    
}