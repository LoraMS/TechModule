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

    public function editContent($newContent){
        $this->content = $newContent;
    }

    public function changeAuthor($newAuthor){
        $this->author = $newAuthor;
    }

    public function renameTitle($newTitle){
        $this->title = $newTitle;
    }

    public function __toString()
    {
        return "{$this->title} - {$this->content}: {$this->author}";
    }
}

$info = explode(', ', readline());
$title = $info[0];
$content = $info[1];
$author = $info[2];
$article = new Article($title, $content, $author);

$n = intval(readline());
for($i = 0; $i < $n; $i++){
    $line = explode(': ', readline());
    $command = $line[0];
    $data = $line[1];
    if($command === 'Edit'){
        $article->editContent($data);
    } elseif($command === 'ChangeAuthor'){
        $article->changeAuthor($data);
    } elseif ($command === 'Rename'){
        $article->renameTitle($data);
    }
}

echo $article;