<?php
/**
 * @file
 *  Category entity API main file.
 */

 class CategoryAPI extends API {

    public function __construct(PDO $pdo, string $method, array $input = NULL) {
        parent::__construct($pdo, $method, $input);
        $this->table = "page_categories";
    }

    /**
     * 
     */
    protected function isPOSTDataValid(array $data) {
        return FALSE;
    }
    /**
     * 
     */
    public function insert() {
        return FALSE;
    }

    /**
     * 
     */
    protected function getItemsCondition($value, $field = "page_id") {
        if($value !== NULL) {
            return " WHERE {$field} = :id";
        }

        return '';
    }
 }