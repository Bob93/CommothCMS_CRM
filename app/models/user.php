<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 25-5-2016
 * Time: 12:07
 */

class User extends Model{

    public $id;
    public $name;
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

    /**
     * User constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        parent::__construct();
        if(!is_null($id)){
            $this->getAllUserById($id);
        }
    }

    public function PushInfoTest() {
        return 'yes';
    }

    /**
     * Alle users ophalen met het id.
     *
     * @param null $id
     * @return mixed|string
     */
    public function getAllUserById($id = null)
    {
        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try
        {
            $query = "SELECT UserID FROM Users WHERE UserID = :id";
            $sth = $this->dbh->prepare($query);
            $sth->bindValue(':id', $id);
            $sth->execute();

            // alle gebruikers ophalen met een count 1 en hoger. Ze worden weergegeven met de voornaam, achternaam en username.
            if($sth->rowCount() >= 1)
            {
                $row = $sth->fetch(PDO::FETCH_OBJ);
                $this->name = $row->firstname . ' ' . $row->lastname;
                $this->username = $row->username;
                $this->id = $row->id;

                return $row;
            }
            else
            {
                return 'Het ophalen van de gebruiker is mislukt.';
            }
        }
        catch(Exception $e)
        {
            return 'Het ophalen van de gebruiker is niet gelukt! ' . $e;
        }

    }

    /**
     * Het login van de gebruiker.
     *
     * @param $username
     * @param $password
     * @return array|bool
     */
    public function userLogin($username, $password) {
        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try
        {
            $query = "SELECT Username, UserID, Password FROM Users WHERE Username = :username AND Rights=2";
            $sth = $this->dbh->prepare($query);
            $sth->bindValue(':username', $username);
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            // alle gebruikers ophalen met een count 1 en hoger. Ze worden weergegeven met de voornaam, achternaam en username.
            if(password_verify($password, $result['Password']))
            {
                $row = $sth->fetch(PDO::FETCH_OBJ);
                $this->id = $result['UserID'];
                $returndata = array(
                    'userid' => $result['UserID'],
                    'username' => $result['Username'],
                    'hash' => $result['Password']
                );
                return $returndata;
            }
            else
            {
                return false;
            }
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    /**
     * Alle users ophalen waar active 1 is en met een limiet van 9.
     *
     * @param int $offset
     * @return array
     */
    public function getAllUsers($offset = 0)
    {
        $offset = $offset * 10;
        $query = "SELECT * FROM users WHERE Active = 1 LIMIT 9 OFFSET :offset";
        $sth = $this->dbh->prepare($query);
        $sth->bindValue(':offset',(int) $offset, PDO::PARAM_INT );
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

//    public function joost($a, $b)
//    {
//        $result = $this->dataHandler->prepare("INSERT INTO joost(a, b) VALUES(?, ?)");
//        $result->execute(array($a, $b));
//    }

    /**
     * Het zoeken van een gebruiker in de database.
     *
     * @param null $term
     * @return array
     */
    public function searchUsers($term = null) {
        $term = "%$term%";
        $query = "SELECT * FROM `users` WHERE Lastname LIKE :term OR FirstName LIKE :term OR Username LIKE :term";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam(':term', $term);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Alle rijen tellen die gevuld zijn in de database.
     *
     * @return int
     */
    public function countAllUsers() {
        $query = "SELECT * FROM users WHERE Active = 1";
        $sth = $this->dbh->prepare($query);
        $sth->execute();

        return $sth->rowCount();
    }

    /**
     * Alle gebruikers ophalen uit de database met het user id.
     *
     * @param $id
     * @return array
     */
    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE UserID=:id";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam(':id', $id);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Een check of de gebruikersnaam al in gebruik is.
     *
     * @param $username
     * @return bool
     */
    public function checkUsername($username)
    {
        $query = "SELECT Username FROM users WHERE Username=:username";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam(':username', $username);
        $sth->execute();

        if($sth->rowCount() >= 1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * Een check op het wachtwoord om te kijken of die met elkaar overeenkomen.
     *
     * @param $password
     * @param $password_redo
     * @return bool
     */
    public function checkPassword($password, $password_redo)
    {
        if($password == $password_redo)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Gebruiker toevoegen aan de database. (registratie van een gebruiker/admin)
     *
     * @param $firstname
     * @param $insertion
     * @param $lastname
     * @param $username
     * @param $password
     * @param $phone
     * @param $address
     * @param $country
     * @param $email
     * @param $rights
     * @param $active
     * @return bool|string
     */
    public function createUser($firstname, $insertion, $lastname, $username, $password, $phone, $address, $country, $email, $rights, $active)
    {
        // hashen van het password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // client ip adres opvragen
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try
        {
            // insertion query met prepare en execute statments
            $query = "INSERT INTO users (`FirstName`, `Insertion`, `Lastname`, `Username`, `Password`,
                `Phone`, `Address`, `Country`, `Email`, `Rights`, `Active`, `IP`, `RegistrationIP`, `DateSignedUp`,
                `LastLogin`, `LastLocation`) VALUES (:firstname, :insertion, :lastname, :username, :password,
                :phone, :address, :country, :email, :rights, :active, :ip, :ip2, NOW(), NULL, NULL )";


            //tijdelijk
            //$regip = "127.0.0.1";


            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':firstname', $firstname);
            $sth->bindParam(':insertion', $insertion);
            $sth->bindParam(':lastname', $lastname);
            $sth->bindParam(':username', $username);
            $sth->bindParam(':password', $hashed_password);
            $sth->bindParam(':phone', $phone);
            $sth->bindParam(':address', $address);
            $sth->bindParam(':country', $country);
            $sth->bindParam(':email', $email);
            $sth->bindParam(':rights', $rights);
            $sth->bindParam(':active', $active);
            $sth->bindParam(':ip', $ip);
            $sth->bindParam(':ip2', $ip);
            $sth->execute();
            return true;
        }
        catch(Exception $e)
        {
            return 'Het nieuwe account is niet aangemaakt! ' . $e->getMessage();
        }
    }

    /**
     * Aanpassen van een gebruiker.
     *
     * @param $id
     * @param $firstname
     * @param $insertion
     * @param $lastname
     * @param $username
     * @param $password
     * @param $phone
     * @param $address
     * @param $country
     * @param $email
     * @param $rights
     * @param $active
     * @return bool|string
     */
    public function updateUser($id, $firstname, $insertion, $lastname, $username, $password, $phone, $address, $country, $email, $rights,
                               $active)
    {
        // het nieuwe of aangepaste wachtwoord opnieuw hashen voor het wordt opgeslagen.
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

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

        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try
        {
            // Updaten van de database, tabel users
            $query = "UPDATE users SET FirstName=:firstname, Insertion=:insertion, Lastname=:lastname,
                Username=:username, Password=:password, Phone=:phone, Address=:address,
                Country=:country, Email=:email, Rights=:rights, Active=:active, IP=:ip, RegistrationIP=:ip,
                DateSignedUp=NOW(), LastLogin=NOW(), LastLocation=NULL WHERE UserID=:id";

            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':firstname', $firstname);
            $sth->bindParam(':insertion', $insertion);
            $sth->bindParam(':lastname', $lastname);
            $sth->bindParam(':username', $username);
            $sth->bindParam(':password', $hashed_password);
            $sth->bindParam(':phone', $phone);
            $sth->bindParam(':address', $address);
            $sth->bindParam(':country', $country);
            $sth->bindParam(':email', $email);
            $sth->bindParam(':rights', $rights);
            $sth->bindParam(':active', $active);
            $sth->bindParam(':ip', $ip);
            $sth->bindParam(':id', $id);
            $sth->execute();
            return true;
        }
        catch(Exception $e)
        {
            return 'Er is iets fout gegaan in de verwerking! ' . $e->getMessage();
        }
    }

    /**
     * Hier wordt de gebruiker verwijderd. Hij is niet meer zichtbaar maar wel nog in de database waar active op 0 is gezet.
     * Als active weer op 1 wordt gezet in de database dan is gebruiker weer actief.
     *
     * @param $id
     * @param int $active
     * @return bool|string
     */
    public function deleteUser($id, $active = 0)
    {
        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try {
            $query = "UPDATE users SET Active=:active WHERE UserId=:id";
            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':active', $active);
            $sth->bindParam(':id', $id);
            $sth->execute();
            return true;
        }
        catch(Exception $e)
        {
            return 'De gebruiker is niet verwijderd! ' . $e->getMessage();
        }
    }

    /**
     * Check of een gebruiker non-actief is.
     *
     * @param $id
     * @return bool
     */
    public function checkIfUserSuspended($id)
    {
        if(!$id == null)
        {
            $query = "SELECT BanDuration FROM bans WHERE UserID=:id, Active=1";
            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':id', $id);
            $sth->execute();

            if($sth->rowCount() >= 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        } else
        {
            return false;
        }
    }

    /**
     * De ban datums ophalen uit de database.
     *
     * @param $id
     * @return array
     */
    public function getBanData($id)
    {
        $query = "SELECT * FROM bans WHERE UserID = :id AND Active=1";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam(':id', $id);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Gebruiker op non-actief zetten.
     *
     * @param $id
     * @param $reason
     * @param $bantime
     * @param int $ipban
     * @param null $bannedip
     * @return bool|string
     */
    public function suspendUser($id, $reason, $bantime, $ipban = 0, $bannedip = null)
    {
        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try {
            if(!$id == null)
            {
               if ($ipban == false)
               {
                    $query = "UPDATE users SET RegularBan=:regularban WHERE UserId=:id";
               }
               else
               {
                    $query = "UPDATE users SET IPBanned=:ipban WHERE UserId=:id";
               }

               $sth = $this->dbh->prepare($query);

               if ($ipban == false)
               {
                    $regularban = true;
                    $sth->bindParam(':regularban', $regularban);
               }
               else
               {
                    $ipban = true;
                    $sth->bindParam(':ipban', $ipban);
               }
               $sth->bindParam(':id', $id);
               $sth->execute();

               $bannedip = "127.0.0.1";
               $active = 1;

               $query = "INSERT INTO `bans` (`UserID`, `BanTime`, `BanReason`, `BanDuration`, `IPBan`, `BannedIPAddress`, `Active`)
                 VALUES (:id, NOW(), :reason, :bantime, :ipban, :bannedip, :active)";
               $sth = $this->dbh->prepare($query);
               $sth->bindParam(':id', $id);
               $sth->bindParam(':reason', $reason);
               $sth->bindParam(':ipban', $ipban);
               $sth->bindParam(':bantime', $bantime);
               $sth->bindParam(':bannedip', $bannedip);
               $sth->bindParam(':active', $active);
               $sth->execute();
               return true;
            }
        }
        catch(Exception $e)
        {
            return 'De gebruiker is niet verbannen! ' . $e->getMessage();
        }
    }

    /**
     * Het aanpassen van de non-actief stelling.
     *
     * @param $id
     * @param $reason
     * @param $bantime
     * @param int $ipban
     * @param int $regularban
     * @param null $bannedip
     * @return bool|string
     */
    public function updateSespension($id, $reason, $bantime, $ipban = 0, $regularban = 0, $bannedip = null)
    {
        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try
        {
            if(!$id == null)
            {

                if($ipban == 1)
                {
                    $ipban = 1;
                    $active = 1;
                }
                elseif($regularban == 1)
                {
                    $regularban = 1;
                    $active = 1;
                }
                else
                {
                    $regularban = false;
                    $ipban = false;
                    $active = 0;
                }


                $query = "UPDATE users SET RegularBan=:regularban, IPBanned=:ipban WHERE UserId=:id";

                    $sth = $this->dbh->prepare($query);

                    $sth->bindParam(':regularban', $regularban);
                    $sth->bindParam(':ipban', $ipban);
                    $sth->bindParam(':id', $id);
                    $sth->execute();

                    $bannedip = "127.0.0.1";
//                $format = 'Y-m-!d H:i:s';
//                $banduration = DateTime::createFromFormat($format, $bantime);
//                var_dump($banduration);

                    $query = "UPDATE `bans` SET UserID=:id, BanReason=:reason, BanDuration=:bantime, IPBan=:ipban, BannedIPAddress=:bannedip, Active=:active WHERE UserID=:id";
                    $sth = $this->dbh->prepare($query);
                    $sth->bindParam(':id', $id);
                    $sth->bindParam(':reason', $reason);
                    $sth->bindParam(':bantime', $bantime);
                    $sth->bindParam(':ipban', $ipban);
                    $sth->bindParam(':bannedip', $bannedip);
                    $sth->bindParam(':active', $active);
                    $sth->bindParam(':id', $id);
                    $sth->execute();
                    return true;
            }
        }
        catch(Exception $e)
        {
            return 'De gebruiker is niet verbannen! ' . $e->getMessage();
        }
    }

    /**
     * Updaten van de ban die er is ingesteld op de gebruiker.
     *
     * @param $id
     * @param $banID
     * @param $reason
     * @param $bantime
     * @param int $ipban
     * @param null $bannedip
     */
    public function updateBan($id, $banID, $reason, $bantime, $ipban = 0, $bannedip = null) {
        if(!$id == null) {

        }

    }


}