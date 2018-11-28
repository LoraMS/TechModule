<?php
class User
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $dates = [];
    /**
     * @var array
     */
    private $comments =[];

    /**
     * User constructor.
     * @param string $name
     * @param array $dates
     * @param array $comments
     */
    public function __construct(string $name, array $dates = [], array $comments = [])
    {
        $this->name = $name;
        $this->dates = $dates;
        $this->comments = $comments;
    }

    public function addDate($date){
//        $this->dates[] = date_create_from_format('d/m/Y', $date);
        $this->dates[] = $date;
    }

    public function addComment($comment){
        $this->comments[] = $comment;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getDates(): array
    {
        return $this->dates;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }
}

/**
 * @var $users User[]
 */
$users = [];

while(true){
    $input = readline();
    if($input === 'end of dates'){
        break;
    }
    $line = explode(' ', $input);
    $username = $line[0];
//    $dates = isset($line[1]) ? explode(',', $line[1]) : [];
    $filterUsersByName = array_filter($users, function ($u) use ($username) {
        return $u->getName() === $username;
    });

    if(count($filterUsersByName) < 1){
        $user = new User($username);
        $users[] = $user;
        // or $users[$username] = $user; -> then sort or search key
    }

    if(count($line) > 1){
        $dates = explode(',',$line[1]);
        foreach ($users as $user) {
            if($user->getName() === $username){
                foreach ($dates as $date) {
                    $user->addDate($date);
                }
                break;
            }
        }
    }
}

while(true){
    $input = readline();
    if($input === 'end of comments'){
        break;
    }
    $line = explode('-', $input);
    $username = $line[0];
    $comment = $line[1];
    foreach ($users as $user) {
        if($user->getName() === $username){
            $user->addComment($comment);
            break;
        }
    }
}

usort($users, function($u1, $u2){
//    return $u1->getName() <=> $u2->getName();
    setlocale (LC_COLLATE, '');
    return strcoll($u1->getName(),$u2->getName());
});

foreach ($users as $user) {
    echo $user->getName().PHP_EOL;
    echo 'Comments:'.PHP_EOL;
    foreach ($user->getComments() as $comment){
        echo "- $comment".PHP_EOL;
    }
    echo 'Dates attended:'.PHP_EOL;
    $dateArr = $user->getDates();
    asort($dateArr);
    $keys = array_keys($dateArr);
    foreach ($dateArr as $date){
//        $dateStr = date_format($date, 'd/m/Y');
        echo "-- $date".PHP_EOL;
    }
}

//function userExists($username, $users){
//    foreach ($users as $user) {
//        if($user->getName() === $username){
//            return true;
//        }
//    }
//    return false;
//}