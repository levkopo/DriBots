<?php


namespace DriBots\Data\Attachments;


use DriBots\Data\Attachment;
use JetBrains\PhpStorm\Language;

class PhotoAttachment extends Attachment {
    public string $path;

    public function __construct(
        #[Language("file-reference")] string $path
    ){
        $this->path = $path;
    }
}