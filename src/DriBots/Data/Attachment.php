<?php declare(strict_types=1);


namespace DriBots\Data;


abstract class Attachment {
    public abstract function save(string $name): Attachment|false;
    public function getFileId(): string { return ""; }
}