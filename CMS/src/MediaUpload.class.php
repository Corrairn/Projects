<?php
/**
 * @file
 *  MediaUplaod class file
 */

class MediaUpload {
    public $name;
    public $fullPath;
    public $mimeType;
    public $size;
    public $url;
    public $status = FALSE; // FALSE - not saved, TRUE - saved.

    /**
     * 
     */
    public function __construct($filesDataArray) {
        $this->name = $filesDataArray['name'];
        $this->mimeType = $filesDataArray['type'];
        $this->fullPath = $filesDataArray['tmp_name'];
        $this->size = $filesDataArray['size'];
    }

    /**
     * 
     */
    public function isMIMETypeValid($allowedTypes) {
        if(in_array($allowedTypes)) {
            return TRUE;
        }

        return FALSE;
    }

    /**
     * 
     */
    public function saveFile($destination) {
        $duplicates = $this->checkForDuplicates($destination);
        if(!empty($duplicates)) {
            if(count($duplicates) == 1) {
                $this->addIndexToName(1);
            }
            else {
                sort($duplicates);
                $this->setNextSuffix(end($duplicates));
            }
        }

        if(move_uploaded_file($this->fullPath, $destination . $this->name)) {
            $this->fullPath = $destination . $this->name;
            $this->url = "/" . str_replace("\\", "/", $this->fullPath);

            return TRUE;
        }

        return "The file can not be saved.";
    }

    /**
     * 
     */
    public function checkForDuplicates($destination) {
        if(!file_exists(__DIR__ . "/../{$destination}")) {
            return FALSE;
        }

        $name = $parts = explode(".", $this->name);
        $name = $parts[count($parts) - 2];
        $duplicates = [];

        $dir = opendir($destination);
        while($file = readdir($dir)) {
            if(strpos($file, $name) === FALSE) {
                continue;
            }

            $duplicates[] = $file;
        }
        closedir($dir);

        return $duplicates;
    }

    public function addIndexToName($index) {
        $parts = explode(".", $this->name);
        $parts[count($parts) - 2] = $parts[count($parts) - 2] . "_{$index}";

        $this->name = implode(".", $parts);
    }

    public function setNextSuffix($item) {
        $parts = explode(".", $item);
        $nameParts = explode("_", $parts[count($parts) - 2]);
        $nameParts[count($nameParts) - 1] = $nameParts[count($nameParts) - 1] + 1;

        $parts[count($parts) - 2] = implode("_", $nameParts);
        $this->name = implode(".", $parts);
    }
}