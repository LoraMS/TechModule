<?php

$materials = [
    'motes' => 0,
    'fragments' => 0,
    'shards' => 0
];
$junk = [];
$legendaryObtained = false;
$legendaryObtainedMaterial = '';
while (!$legendaryObtained) {
    $line = explode(' ', readline());

    for ($i = 1; $i < count($line); $i += 2) {
        $material = strtolower($line[$i]);
        $value = intval($line[$i - 1]);
        if (!key_exists($material, $materials)) {
            if (!key_exists($material, $junk)) {
                $junk[$material] = $value;
            } else {
                $junk[$material] += $value;
            }
        } else {
            $materials[$material] += $value;
            if ($materials[$material] >= 250) {
                $legendaryObtainedMaterial = $material;
                $materials[$material] -= 250;
                $legendaryObtained = true;
                break;
            }
        }
    }
}

switch ($legendaryObtainedMaterial) {
    case 'motes': echo 'Dragonwrath obtained!' . PHP_EOL;
        break;
    case 'fragments': echo 'Valanyr obtained!' . PHP_EOL;
        break;
    case 'shards': echo 'Shadowmourne obtained!' . PHP_EOL;
        break;
}

array_multisort(array_values($materials), SORT_DESC, array_keys($materials), SORT_ASC, $materials);

foreach ($materials as $key => $value) {
    echo "$key: $value" . PHP_EOL;
}

ksort($junk);
foreach ($junk as $key => $value) {
    echo "$key: $value" . PHP_EOL;
}