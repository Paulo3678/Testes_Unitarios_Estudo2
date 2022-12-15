<?php

namespace App;

class Article
{
    public $title;    

    public function getSlug()
    {
        $slug = $this->title;

        $slug = preg_replace("/[^\w]+/", "_", $slug); // Troca todo e qualqeru carater especial por "" usando regex
        $slug = preg_replace("/\s+/", "_", $slug); // Troca todo e qualquer caracter espaço por "_" usando regex
        $slug = trim($slug, "_");

        return $slug;
    }
}
