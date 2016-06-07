<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 25-5-2016
 * Time: 12:07
 */

class User extends Model{

    public $name = 'siisy';
    public $username;
    public $id;

    public function __construct($id = null)
    {
        if(!is_null($id)){
            $this->getUserById($id);
        }
    }

    public function getUserById($id = null){
        $query = "SE:ECT * FROM Users where id = :id";
        $sth = $this->dbh->prepare($query);
        $sth->bindValue(':id',$id);
        $sth->execute();

        if($sth->rowCount() == 1){
            $row = $sth->fetch(PDO::FETCH_OBJ);
            $this->name = $row->firstname . ' ' . $row->lastname;
            $this->username = $row->username;
            $this->id = $row->id;
        }
    }
}