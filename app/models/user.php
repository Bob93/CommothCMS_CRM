<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 25-5-2016
 * Time: 12:07
 */

class User extends Model{

    public $id;
    public $name = 'siisy';
    public $firstname;
    public $insertion;
    public $lastname;
    public $username;
    public $password;
    public $phone;
    public $address;
    public $country;
    public $email;
    public $rights;
    public $active;
    public $ip;
    public $registrationIP;
    public $datesignedup;
    public $lastlogin;
    public $lastlocation;

    public function __construct($id = null)
    {
        if(!is_null($id)){
            $this->getAllUserById($id);
        }
    }

    // alle gebruikers inladen bij het is
    public function getAllUserById($id = null)
    {
        $query = "SELECT UserID FROM Users WHERE UserID = :id";
        $sth = $this->dbh->prepare($query);
        $sth->bindValue(':id',$id);
        $sth->execute();

        // alle gebruikers ophalen met een count 1 en hoger. Ze worden weergegeven met de voornaam, achternaam en username.
        if($sth->rowCount() >= 1)
        {
            $row = $sth->fetch(PDO::FETCH_OBJ);
            $this->name = $row->firstname . ' ' . $row->lastname;
            $this->username = $row->username;
            $this->id = $row->id;
        }
    }

    // een gebruiker toevoegen aan de database (registratie van de gebruiker/admin)
    public function createUser($firstname, $insertion, $lastname, $username, $password, $phone, $address, $country, $email,
        $registrationip, $lastlocation)
    {
        $rights = 0;
        $active = 1;

        // hashen van het password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // client ip adres opvragen
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // insertion query met prepare en execute statments
        $query = "INSERT INTO users (`Firstname`, `Insertion`, `Lastname`, `Username`, `Password`, `Phone`, `Address`,
          `Country`, `Email`, `Rights`, `Active`, `IP`, `RegistrationIP`, `DateSignedUp`, `LastLogin`, `LastLocation`) VALUES (`$firstname`,
          `$insertion`, `$lastname`, `$username`, `$hashed_password`, `$phone`, `$address`, `$country`, `$email`, `$rights`,
          `$active`, `$ip`, `$registrationip`, NOW(), NOW(), `$lastlocation`)";
        $sth = $this->dbh->prepare($query);
        $sth->execute();
    }

    // aanpassingen van een gebruiker
    public function updateUser($id, $firstname, $insertion, $lastname, $username, $password, $phone, $address, $country, $email, $rights,
                               $active, $lastlocation)
    {
        // get het id van de gebruiker
        $this->getAllUserById($id);

        // het nieuwe of aangepaste wachtwoord opnieuw hashen voor het wordt opgeslagen.
        $new_hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // client ip adres opvragen
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // Updaten van de database, tabel users
        $query = "UPDATE users SET `Firstname`=`$firstname`, `Insertion`=`$insertion`, `Lastname`=`$lastname`, `Username`=`$username`,
           `Password`=`$new_hashed_password`, `Phone`=`$phone`, `Address`=`$address`, `Country`=`$country`, `Email`=`$email`,
           `Rights`=`$rights`, `Active`=`$active`, `IP`=`$ip`, `LastLogin`=`NOW()`, `LastLocation`=`$lastlocation`";
        $sth = $this->dbh->prepare($query);
        $sth->execute();
    }


    public function deleteUser($id)
    {

    }


}