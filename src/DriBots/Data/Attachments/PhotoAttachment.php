<?php


namespace DriBots\Data\Attachments;


use DriBots\Data\Attachment;
use DriBots\Data\Config;
use JetBrains\PhpStorm\Language;

class PhotoAttachment implements Attachment {
    public string $path;
    public string $extension;

    public function __construct(
        #[Language("file-reference")] string $path,
        string $extension
    ){
        $this->path = $path;
        $this->extension = $extension;
    }


    public function save(string $name): PhotoAttachment|false {
        $filename = realpath(Config::$TMP_DIR."/".$name.".".$this->extension);

        if(file_put_contents($filename, file_get_contents($this->path))) {
            return new PhotoAttachment($filename, $this->extension);
        }

        return false;
    }
}