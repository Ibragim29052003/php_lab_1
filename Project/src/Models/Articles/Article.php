<?php

namespace src\Models\Articles;
use src\Models\ActiveRecordEntity;
use src\Models\Users\User;

class Article extends ActiveRecordEntity{
    // private $title;
    // private $author;
    // private $id;
    private $name;
    private $text;
    private $authorId;
    private $createdAt;


    public function getName(){
        return $this->name;
    }
    public function getText(){
        return $this->text;
    }
    public function getAuthorId(): User
    {
        return User::getById($this->authorId);
    }
    protected static function getTableName(): string
    {
        return 'articles';
    }

}




        // public function __set($name, $value)
    // {
    //     $camelCaseName = $this->underscoreToCamelcase($name);
    //     $this->$camelCaseName = $value;

    // }

    // private function underscoreToCamelcase(string $name): string
    // {
    //     return lcfirst(str_replace('_','',ucwords($name, '_')));
    // }

    // public function getId(){
    //     return $this->id;

    // }






    // public function __construct(string $title, string $text, User $author)
    // {
    //     $this->title = $title;
    //     $this->text = $text;
    //     $this->author = $author;
    // }

    // public function setTitle(string $title){
    //     $this->title = $title;
    // }
    // public function setText(string $text){
    //     $this->text = $text;
    // }
    // public function setAuthor(User $author){
    //     $this->author = $author;
    // }

    // public function getTitle(): string
    // {
    //     return $this->title;
    // }
    // public function getText(): string
    // {
    //     return $this->text;
    // }
    // public function getAuthor(): User
    // {
    //     return $this->author;
    // }
