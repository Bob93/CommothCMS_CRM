<?php

class Model {

    public $dbh = null;

    public function getDbh()
    {
        return $this->dbh;
    }

    public function setDbh($dbh)
    {
        $this->dbh = $dbh;
    }

    /*
     *
     * Nieuwe connectie maken met de database.
     *
     * */
    protected function CreateConnection()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=commoth', 'username', 'password');

        return $this->dbh;
    }

    /*
     *  De connectie sluiten.
     * */
    protected function CloseConnecton()
    {

    }

    protected function query()
    {
        $query = "SELECT * FROM Users";

        $sth = $this->CreateConnection()->prepare($query);
        $sth->execute();


        if($sth->rowCount() >= 1)
        {

            //Kost veel memory
            foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row)
            {
                $row->Username;
            }

            //Kost iets minder
            while($row = $sth->fetch(PDO::FETCH_OBJ))
            {
                $row->Username;
            }
        }else
        {
            //Geen resultaten gevonden
        }

        $query2 = "SELECT * FROM Users WHERE username = :username and password = :password";
        $username = $_POST['user'];
        $sth = $this->dbh->prepare($query2);
        $sth->bindValue(':username',$username);
        $sth->bindValue(':password',"HelloWorld");
        $sth->execute();
    }


}