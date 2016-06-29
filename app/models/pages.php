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
    public $header_content;
    public $active;
    public $footer_content;
    public $meta;
    public $tags;
    public $content;
    public $dbh;

    /**
     * Pages constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        parent::__construct();
        if(!is_null($id)){
            $this->getAllPagesById($id);
        }
    }

    //  Hier wordt alles aangemaakt voor de pagina's aangemaakt.
    //  In dit gedeelte komen ook alleen maar functies aangemaakt voor pages.

    /**
     * Functie om alle pagina's op te halen met het id.
     *
     * @param null $id
     * @return string
     */
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

    /**
     * In deze functie worden ale pages opgehaald die nog actief zijn.
     * Data wordt opgehaald met een limiet van 9.
     *
     * @return mixed
     */
    public function getAllPages()
    {
        $query = "SELECT * FROM pages WHERE Active = 1 LIMIT 9";
        $sth = $this->dbh->prepare($query);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Een pagina ophalen met het id.
     *
     * @param $id
     * @return mixed
     */
    public function getPageById($id)
    {
        $query = "SELECT * FROM pages WHERE PageID=:id";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam(':id', $id);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Functie voor het aanmaken van een nieuwe pagina.
     *
     * @param $pages_title
     * @param $child_pages
     * @param $tags
     * @param $content
     * @param $menu_item
     * @return bool|string
     */
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

    /**
     * Aanpassen van bestaande pagina's die in de database staan.
     *
     * @param $id
     * @param $pages_title
     * @param $child_pages
     * @param $tags
     * @param $content
     * @param $menu_item
     * @return bool|string
     */
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

    /**
     * Een pagina verwijderen, de active wordt dan op 0 gezet zodat de pagina nog wel aanwezig is in de database.
     *
     * @param $id
     * @param int $active
     * @return bool|string
     */
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

    // In dit gedeelte wordt alles aangemaakt voor de menu-items.
    // Alles wat te maken heeft met de menu-items moeten hier worden geplaatst.

    /**
     * Haal 1 menu-item op met het id.
     *
     * @param $id
     * @return mixed
     */
    public function getMenuItemById($id)
    {
        $query = "SELECT * FROM menu WHERE MenuItemID=:id";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam(':id', $id);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Alle menu-items ophalen uit de database.
     *
     * @return mixed
     */
    public function getAllMenuItems()
    {
        $query = "SELECT * FROM menu WHERE Active = 1 LIMIT 9";
        $sth = $this->dbh->prepare($query);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Aanmaken van een nieuw menu-item.
     *
     * @param $menu_item
     * @param $submenu_item
     * @param int $active
     * @return bool|string
     */
    public function createMenuItem($menu_item, $submenu_item, $active = 1)
    {
        // insertion query met prepare en execute statements
        try
        {
            $query = "INSERT INTO menu (`MenuItemID`, `MenuTitel`, `SubMenuItem`, `Active`)
              VALUES (:id, :menu_title, :submenu_item, :active)";

            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':menu_title', $menu_item);
            $sth->bindParam(':submenu_item', $submenu_item);
            $sth->bindParam(':active', $active);
            $sth->execute();
            return true;
        } catch(Exception $e)
        {
            return 'Er is iets fout gegaan met het aanmaken van het menu item! ' . $e->getMessage();
        }
    }

    /**
     * Het aanpassen van een bestaand menu-item die voor komt in de database.
     *
     * @param $id
     * @param $menu_item
     * @param $submenu_item
     * @param $active
     * @return bool|string
     */
    public function editMenuItem($id, $menu_item, $submenu_item, $active)
    {
        try
        {
            // Updaten van de database, tabel pages
            $query = "UPDATE menu SET (`MenuItemID`, `MenuTitel`, `SubMenuItem`, `Acitive`)
              VALUES (:id, :menu_title, :submenu_item, :active) WHERE MenuItemID=:id";

            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':id', $id);
            $sth->bindParam(':menu_title', $menu_item);
            $sth->bindParam(':submenu_item', $submenu_item);
            $sth->bindParam(':active', $active);
            $sth->execute();
            return true;
        } catch(Exception $e)
        {
            return 'Hier is iets fout gegaan met het updaten van het menu item! ' . $e->getMessage();
        }
    }

    /**
     * Het verwijderen van een menu-item. Active wordt op 0 gezet en blijft wel in de database.
     *
     * @param $id
     * @param int $active
     * @return bool|string
     */
    public function deleteMenuItem($id, $active = 0)
    {
        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try {
            $query = "UPDATE menu SET Active=:active WHERE MenuItemID=:id";
            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':active', $active);
            $sth->bindParam(':id', $id);
            $sth->execute();
            return true;
        }
        catch(Exception $e)
        {
            return 'Het menu item is niet verwijderd! ' . $e->getMessage();
        }
    }

     // In dit gedeelte komen de header en de footer voor.
     // De header en de footer kunnen alleen maar worden aangepast en niet aangemaakt of verwijderd worden.

    /**
     * De header aanpassen.
     *
     * @param $id
     * @param $header_content
     * @param $meta
     * @param $tags
     * @return bool|string
     */
    public function editHeader($id, $header_content, $meta, $tags)
    {
        try
        {
            // Updaten van de database, tabel pages
            $query = "UPDATE header SET (`HeaderID`, `HeaderContent`, `HeaderMeta`, `HeaderTags`)
              VALUES (:id, :header_content, :header_meta, :header_tags) WHERE HeaderID=:id";

            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':id', $id);
            $sth->bindParam(':header_content', $header_content);
            $sth->bindParam(':header_meta', $meta);
            $sth->bindParam(':header_tags', $tags);
            $sth->execute();
            return true;
        } catch(Exception $e)
        {
            return 'Hier is iets fout gegaan met het updaten van de header! ' . $e->getMessage();
        }
    }

    /**
     * De footer aanpassen.
     *
     * @param $id
     * @param $footer_content
     * @param $tags
     * @return bool|string
     */
    public function editFooter($id, $footer_content, $tags)
    {
        try
        {
            // Updaten van de database, tabel pages
            $query = "UPDATE header SET (`FooterID`, `FooterContent`, `Tags`)
              VALUES (:id, :footer_content, :footer_tags) WHERE FooterID=:id";

            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':id', $id);
            $sth->bindParam(':header_content', $footer_content);
            $sth->bindParam(':header_tags', $tags);
            $sth->execute();
            return true;
        } catch(Exception $e)
        {
            return 'Hier is iets fout gegaan met het updaten van de header! ' . $e->getMessage();
        }
    }
}