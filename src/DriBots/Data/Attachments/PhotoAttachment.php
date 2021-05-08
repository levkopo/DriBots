<?php


namespace DriBots\Data\Attachments;


use DriBots\Data\Attachment;
use DriBots\Data\Config;
use JetBrains\PhpStorm\Language;

class PhotoAttachment implements Attachment {
    public string $path;

    public function __construct(
        #[Language("file-reference")] string $path
    ){
        $this->path = $path;
    }


    public function save(string $name): PhotoAttachment|false {
        $data = explode(".", $this->path);

        $filename = Config::$TMP_DIR."/".$name.".".end($data);

        if(file_put_contents($filename, file_get_contents($this->path))) {
            return new PhotoAttachment($filename);
        }

        return false;
    }
}