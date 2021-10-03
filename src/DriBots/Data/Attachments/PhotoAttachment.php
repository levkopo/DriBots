<?php declare(strict_types=1);


namespace DriBots\Data\Attachments;


use DriBots\Data\Attachment;
use DriBots\Data\Config;

class PhotoAttachment extends Attachment {
    private string $path;

    public function __construct(
        public string $extension
    ){}

    public function getPath(): string {
        return $this->path;
    }

    public function save(string $name): PhotoAttachment|false {
        $filename = realpath(Config::$TMP_DIR."/".$name.".".$this->extension);

        if(file_put_contents($filename, file_get_contents($this->getPath()))) {
            $attachment = new PhotoAttachment($this->extension);
            $attachment->path = $filename;
            return $attachment;
        }

        return false;
    }
}