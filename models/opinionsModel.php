<?php
class opinions extends database
{
    public $id;
    public $reviewGrade;
    public $content;
    public $reviewDate;
    public $id_users;
    protected $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }
    public function addOpinion()
    {
        $query = 'INSERT INTO `s4u3u_opinions`(`reviewGrade`,`content`,`reviewDate`,`id_users`) VALUES (:reviewGrade,:content,NOW(),:id_users)';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':reviewGrade', $this->reviewGrade, PDO::PARAM_INT);
        $queryPrepare->bindValue(':content', $this->content, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    public function getUsersOpinions()
    {
        $query = '';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
}