<?php
/**
 * @file
 *  Main file for the Page api class.
 */

 /**
  * Class PageAPI
  */
 class PageAPI extends API {

    public function __construct(PDO $pdo, string $method, array $input = NULL) {
        parent::__construct($pdo, $method, $input);
        $this->table = "pages";
    }

    /**
     * 
     */
    protected function isPOSTDataValid(array $data) {
        return (!empty($data) &&
                !empty($data['title']) &&
                !empty($data['user_id'])
            );
    }

    /**
     * 
     */
    public function insert() {
        if($this->method == "POST" && !empty($this->input)) {
            $page = new Page(
                @$this->input['id'],
                $this->input['user_id'],
                $this->input['type'],
                $this->input['title'],
                $this->input['text'],
                "file.path", // TODO: set sensible default
                @$this->input['categories']);

            // Insert the user and fetch error message if somehting is not right.
            $error = $page->insert();
            if(!empty($page->id) && $error === TRUE) {
                $this->setData((array)$page);
            }
            else {
                $this->setError($error);
            }
        }
        else {
            $this->setError("Invalid method or data issued.");
        }

        return $this;
    }
 }