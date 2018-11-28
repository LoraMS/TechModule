<?php
class Article
{
    private $title;
    private $content;
    private $author;

    public function __construct($title, $content, $author)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    public function __toString()
    {
        return "{$this->title} - {$this->content}: {$this->author}";
    }
}


$n = intval(readline());
$articles = [];

for($i = 0; $i < $n; $i++){
    $info = explode(', ', readline());
    $title = $info[0];
    $content = $info[1];
    $author = $info[2];

    $articles[] = new Article($title, $content, $author);
}

$criteria = readline();

if($criteria === 'title'){
    usort($articles, function(Article $article1, Article $article2){
        return $article1->getTitle() <=> $article2->getTitle();
    });
} elseif($criteria === 'content'){
    usort($articles, function(Article $article1, Article $article2){
        return $article1->getContent() <=> $article2->getContent();
    });
} elseif($criteria === 'author'){
    usort($articles, function(Article $article1, Article $article2){
        return $article1->getAuthor() <=> $article2->getAuthor();
    });
}

foreach ($articles as $article){
    echo $article.PHP_EOL;
}