<?php

class Team
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $creator;
    /**
     * @var array
     */
    private $users = [];

    /**
     * Team constructor.
     * @param string $name
     * @param string $creator
     * @param array $users
     */
    public function __construct(string $name, string $creator, array $users = [])
    {
        $this->name = $name;
        $this->creator = $creator;
        $this->users = $users;
    }

    public function addUser($user)
    {
        array_push($this->users, $user);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCreator(): string
    {
        return $this->creator;
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->users;
    }
}

$teamsCount = intval(readline());
$teams = [];
for ($i = 0; $i < $teamsCount; $i++) {
    list($userName, $teamName) = explode('-', readline());

    $filterTeamByName = array_filter($teams, function ($t) use ($teamName) {
        return $t->getName() === $teamName;
    });

    $filterTeamByCreator = array_filter($teams, function ($t) use ($userName) {
        return $t->getCreator() === $userName;
    });

    if (count($filterTeamByName) < 1) {
        if (count($filterTeamByCreator) < 1) {
            $teams[] = new Team($teamName, $userName);
            echo "Team $teamName has been created by $userName!" . PHP_EOL;
        } else {
            echo "$userName cannot create another team!" . PHP_EOL;
        }
    } else {
        echo "Team $teamName was already created!" . PHP_EOL;
    }
}

while (true) {
    $input = readline();
    if ($input === 'end of assignment') {
        break;
    }
    list($userName, $teamName) = explode('->', $input);

    $filterTeamByName = array_filter($teams, function ($t) use ($teamName) {
        return $t->getName() === $teamName;
    });

    $filterTeamByCreator = array_filter($teams, function ($t) use ($userName) {
        return (in_array($userName, $t->getUsers())) || ($t->getCreator() === $userName);
    });

    if (count($filterTeamByName) < 1) {
        echo "Team $teamName does not exist!" . PHP_EOL;
    } elseif (count($filterTeamByCreator) > 0) {
        echo "Member $userName cannot join team $teamName!" . PHP_EOL;
    } else {
        foreach ($teams as $team) {
            if ($team->getName() === $teamName) {
                $team->addUser($userName);
                break;
            }
        }
    }

}

usort($teams, function ($team1, $team2) {
    if (count($team2->getUsers()) === count($team1->getUsers())) {
        return $team1->getName() <=> $team2->getName();
    }
    return count($team2->getUsers()) <=> count($team1->getUsers());
});

foreach ($teams as $team) {
    if (count($team->getUsers()) > 0) {
        echo $team->getName() . PHP_EOL;
        echo '- ' . $team->getCreator() . PHP_EOL;
        $usersArr = $team->getUsers();
        sort($usersArr);
        foreach ($usersArr as $user => $name) {
            echo "-- $name" . PHP_EOL;
        }
    }
}

echo 'Teams to disband:' . PHP_EOL;
foreach ($teams as $team) {
    $usersArr = $team->getUsers();
    sort($usersArr);
    if (count($usersArr) < 1) {
        echo $team->getName() . PHP_EOL;
    }
}