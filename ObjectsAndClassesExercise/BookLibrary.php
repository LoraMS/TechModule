<?php
class Book
{
    private $title;
    private $author;
    private $publisher;
    private $releaseDate;
    private $isbn;
    private $price;

    public function __construct($title, $author, $publisher, $releaseDate, $isbn, $price)
    {
        $this->title = $title;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->releaseDate = $releaseDate;
        $this->isbn = $isbn;
        $this->price = $price;
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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }
}

class Library
{
    private $name;
    private $books = [];

    public function __construct($name, array $books)
    {
        $this->name = $name;
        $this->books = $books;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getBooks(): array
    {
        return $this->books;
    }
}

$n = intval(readline());
$books = [];
while($n > 0){
    $data = explode(' ', readline());
    $title = $data[0];
    $author = $data[1];
    $publisher = $data[2];
    $releaseDate = $data[3];
    $isbn = $data[4];
    $price = floatval($data[5]);
    $book = new Book($title, $author, $publisher, $releaseDate, $isbn, $price);
    $books[] = $book;
    $n--;
}

$authors = [];

foreach ($books as $book){
    $author = $book->getAuthor();
    $price = $book->getPrice();

    if(!key_exists($author, $authors)){
        $authors[$author] = $price;
    } else {
        $authors[$author] += $price;
    }
}

uksort($authors, function($author1, $author2) use ($authors){
    if($authors[$author2] === $authors[$author1]){
        return $author1 <=> $author2;
    }
    return $authors[$author2] <=> $authors[$author1];
});

foreach ($authors as $author=>$price){
    echo "$author -> ".sprintf('%0.2f', $price).PHP_EOL;
}

