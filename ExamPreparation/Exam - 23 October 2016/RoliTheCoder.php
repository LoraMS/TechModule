<?php

class Event
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $participants = [];

    /**
     * Event constructor.
     * @param string $name
     * @param array $participants
     */
    public function __construct(string $name, array $participants)
    {
        $this->name = $name;
        $this->participants = $participants;
    }

    public function addNewParticipant($participant)
    {
        $this->participants[] = $participant;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @param array $participants
     */
    public function setParticipants(array $participants): void
    {
        $this->participants = $participants;
    }
}

$events = [];
$pattern = '/(?<id>\d+)\s+#(?<eventName>\w+)\s*(?<participants>(?:@[A-Za-z0-9\-\']+\s*)*)/';
while (true) {
    $input = readline();
    if ($input === 'Time for Code') {
        break;
    }
    if (preg_match_all($pattern, $input, $matches)) {
        $id = intval($matches['id'][0]);
        $eventName = $matches['eventName'][0];
        $participants = [];
        if (strpos($input, '@') !== false) {
            $participantsList = substr($input, strpos($input, '@') + 1);
            $participants = explode(' @', $participantsList);
        }

        if (!key_exists($id, $events)) {
            $event = new Event($eventName, $participants);
            $events[$id] = $event;
        } else {
            if ($events[$id]->getName() === $eventName) {
                foreach ($participants as $participant) {
                    $events[$id]->addNewParticipant($participant);
                }
            }

        }

    }
}

uksort($events, function ($e1, $e2) use ($events) {
    if (count($events[$e2]->getParticipants()) === count($events[$e1]->getParticipants())) {
        return strcmp($events[$e1]->getName(), $events[$e2]->getName());
    }
    return count($events[$e2]->getParticipants()) <=> count($events[$e1]->getParticipants());
});

foreach ($events as $event=>$data) {
    $participants = $data->getParticipants();
    $participants = array_unique($participants);
    natcasesort($participants);
    echo "{$data->getName()} - " . count($participants) . PHP_EOL;
    foreach ($participants as $p => $name) {
        echo "@$name" . PHP_EOL;
    }
}
