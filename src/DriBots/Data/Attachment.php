<?php


namespace DriBots\Data;


interface Attachment {
    public function save(string $name): Attachment|false;
}