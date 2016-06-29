<?php
/**
 * Created by PhpStorm.
 * User: Bob
 * Date: 28-6-2016
 * Time: 13:26
 */
class Pages extends Model
{
    public $id;
    public $pages_title;
    public $child_pages;
    public $menu_item;
    public $submenu_item;
    public $header;
    public $active;
    public $footer;
    public $meta;
    public $tags;
    public $content;
    public $dbh;

    public function __construct($id = null)
    {
        parent::__construct();
        if(!is_null($id)){
            $this->getAllPagesById($id);
        }
    }

    // alle pagina's inladen bij het is
    public function getAllPagesById($id = null)
    {
        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try
        {
            $query = "SELECT PageID FROM pages WHERE PageID = :id";
            $sth = $this->dbh->prepare($query);
            $sth->bindValue(':id', $id);
            $sth->execute();

            // alle pagina's ophalen met een count 1 en hoger. Ze worden weergegeven met de pagina titel.
            if($sth->rowCount() >= 1)
            {
                $row = $sth->fetch(PDO::FETCH_OBJ);
                $this->pages_title = $row->page_title;
                $this->id = $row->id;

                return $row;
            }
            else
            {
                return 'Het ophalen van de pagina is mislukt.';
            }
        }
        catch(Exception $e)
        {
            return 'Het ophalen van de pagina is niet gelukt! ' . $e;
        }

    }

    // alle pagina's ophalen die in de database staan. Alleen de pagina's ophalen die active op 1 hebben staan met een limiet van 9
    public function getAllPages()
    {
        $query = "SELECT * FROM users WHERE Active = 1 LIMIT 9";
        $sth = $this->dbh->prepare($query);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    // pagina ophalen met het page id.
    public function getPageById($id)
    {
        $query = "SELECT * FROM pages WHERE PageID=:id";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam(':id', $id);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    // het aanmaken van een nieuwe pagina
    public function createPages($pages_title, $child_pages, $tags, $content, $menu_item)
    {
        try
        {
            // insertion query met prepare en execute statements
            $query = "INSERT INTO pages (`PageID`, `Pages_title`, `Child_pages`, `Tags`, `Content`,
                `Menu_item`) VALUES (:id, :pages_title, :child_pages, :tags, :content, :menu_item)";

            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':pages_title', $pages_title);
            $sth->bindParam(':child_pages', $child_pages);
            $sth->bindParam(':tags', $tags);
            $sth->bindParam(':content', $content);
            $sth->bindParam(':menu_item', $menu_item);
            $sth->execute();
            return true;
        } catch(Exception $e)
        {
            return 'Er is iets fout gegaan met het aanmaken van de pagina! ' . $e->getMessage();
        }
    }

    // het aanpassen van bestaande pagina's
    public function editPages($id, $pages_title, $child_pages, $tags, $content, $menu_item)
    {
        try
        {
            // Updaten van de database, tabel pages
            $query = "UPDATE pages SET (`PageID`, `Pages_title`, `Child_pages`, `Tags`, `Content`,
                `Menu_item`) VALUES (:id, :pages_title, :child_pages, :tags, :content, :menu_item) WHERE PageID=:id";

            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':firstname', $pages_title);
            $sth->bindParam(':insertion', $child_pages);
            $sth->bindParam(':lastname', $tags);
            $sth->bindParam(':username', $content);
            $sth->bindParam(':password', $menu_item);
            $sth->bindParam(':id', $id);
            $sth->execute();
            return true;
        } catch(Exception $e)
        {
            return 'Hier is iets fout gegaan met het updaten van de pagina! ' . $e->getMessage();
        }
    }

    // het verwijderen van bestaande pagina's
    public function deletePages($id, $active = 0)
    {
        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try {
            $query = "UPDATE pages SET Active=:active WHERE PageID=:id";
            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':active', $active);
            $sth->bindParam(':id', $id);
            $sth->execute();
            return true;
        }
        catch(Exception $e)
        {
            return 'De pagina is niet verwijderd! ' . $e->getMessage();
        }
    }

    // het aanmaken van een menu item
    public function createMenuItem()
    {

    }

    // het aanpassen van een betaande menu item
    public function editMenuItem()
    {

    }

    // het verwijderen van een menu item
    public function deleteMenuItem()
    {

    }

    // het aanpassen van de header. Hier kunnen ook meta teksten mee worden gegeven en steekwoorden meegegeven worden.
    public function editHeader()
    {

    }

    // het aanpassen van de footer. Hier kan alleen tekst op dit moment worden geüpdate.
    public function editFooter()
    {

    }
}