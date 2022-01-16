<?php
/**
 * 
 */

 class Page {
    public $id;
    public $author;
    public $type;
    public $title;
    public $text;
    public $file_path;
    public $page_views;
    public $date_created;
    public $categories;
    private $pdo;

    /**
     * 
     */
    public function __construct($id = NULL, $user_id = NULL, $type = NULL, $title = NULL, $text = NULL, $file_path = NULL, $categories = []) {
        $this->initPDO();
        $this->id = $id;
        $this->author = (new User())->loadUser("id", $user_id);
        $this->title = trim($title);
        $this->type = $type;
        $this->text = trim($text);
        $this->file_path = $file_path;
        $this->categories = $categories;

        if(empty($this->id)) {
            $this->page_views = 0;
            $this->date_created = date("Y-m-d H:i:s", time());
        }
    }

    /**
     * 
     */
    private function initPDO() {
        include(__DIR__ . "/../config/config.php");

        $this->pdo = $pdo;
    }

    /**
     * 
     */
     public function insert() {
        if(!empty($this->id)) {
            return "Page can not be inserted.";
        }

        $resultMessage = $this->insertPage();
        $this->id = (int) $resultMessage;

        if(!empty($this->id)) {
            $this->insertCategories(); // TODO: maybe add some check if everything is OK here?

            return TRUE;
        }

        return $resultMessage;
    }

    /**
     * 
     */
    private function insertPage() {
        $query = 
            "INSERT INTO pages
                (`id`, `user_id`, `type`, `title`, `text`, `file_path`, `page_views`, `date_created`)
            VALUES
                (NULL, :user_id, :type, :title, :text, :file_path, 0, :date_created)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":user_id", $this->author->id);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":text", $this->text);
        $stmt->bindParam(":file_path", $this->file_path);
        $stmt->bindParam(":date_created", $this->date_created);

        try {
            $stmt->execute();
        }
        catch (Exception $e) {
            return "Something went very wrong.";
        }

        return $this->pdo->lastInsertId();
    }

    /**
     * 
     */
    private function insertCategories() {
        if(!empty($this->categories) && !empty($this->id)) {
            $query = 
            "INSERT INTO page_categories
                (`page_id`, `name`)
            VALUES
                (:page_id, :name)";
                
            $categoryName = "";

            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":page_id", $this->id);
            $stmt->bindParam(":name", $categoryName);

            foreach($this->categories as $categoryName) {
                $stmt->execute();
            }
        }
    }

    /**
     * 
     */
    public function loadPage() {
        if(empty($this->id)) {
            return FALSE;
        }

        $query = "SELECT * FROM pages WHERE `id` = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        $pageData = $stmt->fetchAll();

        if(!empty($pageData[0])) {
            $this->id = $pageData[0]['id'];
            $this->author = (new User())->loadUser("id", $pageData[0]['user_id']);
            $this->type = $pageData[0]['type'];
            $this->title = $pageData[0]['title'];
            $this->text = $pageData[0]['text'];
            $this->file_path = $pageData[0]['file_path'];
            $this->categories = $this->getCategories();
            $this->page_views = $pageData[0]['page_views'];
            $this->date_created = $pageData[0]['date_created'];

            return $this;
        }

        return FALSE;
    }

    /**
     * 
     */
    private function getCategories() {
        if(empty($this->id)) {
            return FALSE;
        }

        $query = "SELECT name FROM page_categories WHERE `page_id` = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        $categoryData = $stmt->fetchAll(PDO::FETCH_COLUMN); // We just need the values.

        if(!empty($categoryData)) {
            return array_values($categoryData);
        }

        return [];
    }

    /**
     * 
     */
    public function update($column) {
        if(empty($this->id)) {
            return FALSE;
        }

        $query = "UPDATE pages SET `{$column}` = :column WHERE `id` = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":column", $this->{$column});
        $stmt->bindParam(":id", $this->id);       

        $stmt->execute();

        return TRUE;
    }

    public function getEditable($name) {
        return "{$this->{$name}}<span title='Edit' class='edit-control fa fa-cog'></span>";
    }
 }