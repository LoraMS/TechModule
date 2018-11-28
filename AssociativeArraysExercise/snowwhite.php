<?php

$dwarfs = [];
while (true) {
    $input = readline();
    if ($input === 'Once upon a time') {
        break;
    }
    $line = explode(' <:> ', $input);
    $name = $line[0];
    $hatColor = $line[1];
    $physics = intval($line[2]);

    $findByName = current(array_filter($dwarfs, function($dwarf) use ($name) {
                return isset($dwarf['name']) && $name == $dwarf['name'];
            }));

    $findByHatColor = current(array_filter($dwarfs, function($dwarf) use ($hatColor) {
                return $hatColor == $dwarf['hatColor'];
            }));

    $found = current(array_filter($dwarfs, function($dwarf) use ($name, $hatColor) {
                return $name == $dwarf['name'] && $hatColor == $dwarf['hatColor'];
            }));

    if (!$findByName) {
        $dwarfs[] = ['hatColor' => $hatColor, 'name' => $name, 'physics' => $physics, 'colorCounter' => 0];
    } elseif (!$findByHatColor) {
        $dwarfs[] = ['hatColor' => $hatColor, 'name' => $name, 'physics' => $physics, 'colorCounter' => 0];
    } else {
        
        if ($found) {
            if ($found['physics'] < $physics) {
                $index = array_keys($dwarfs, $found);
                $dwarfs[$index[0]]['physics'] = $physics;
            }
        }
    }
}

$counts = array_count_values(array_column($dwarfs, 'hatColor'));
foreach ($dwarfs as &$dwarf) {
    $hC = $dwarf['hatColor'];
    foreach ($counts as $color=>$number) {
        $c = $color;
        if($hC === $c){
            $dwarf['colorCounter'] = $number;
        }
    }
}

usort($dwarfs, function ($d1, $d2) use ($dwarfs) {
    $d1Phys = $d1['physics'];
    $d2Phys = $d2['physics'];
    if ($d1Phys === $d2Phys) {
        return $d2['colorCounter'] <=> $d1['colorCounter'];
    }
    return $d2['physics'] <=> $d1['physics'];
});

//$phys = [];
//foreach ($dwarfs as $dwarf => $row) {
//    $phys[] = $row['physics'];
//}
//
//$counts = array_count_values(array_column($dwarfs, 'hatColor'));
//
//array_multisort($phys, SORT_DESC, $dwarfs);

foreach ($dwarfs as $d) {
    echo "(" . $d['hatColor'] . ") " . $d['name'] . " <-> " . $d['physics'] . PHP_EOL;
}





////search for subarray by specific key
//
//$foo = array(
//    array('value' => 5680, 'text' => 'Red'), 
//    array('value' => 7899, 'text' => 'Green'), 
//    array('value' => 9968, 'text' => 'Blue'), 
//    array('value' => 4038, 'text' => 'Yellow'),
//);
//
//$found = current(array_filter($foo, function($item) {
//    return isset($item['value']) && 7899 == $item['value'];
//}));
//
//print_r($found);
/*
Array
(
    [value] => 7899
    [text] => Green
)
 */


////search for subarray in array
//
//$testArray = array( 
//    array("a" => "10", "b" => "20"), 
//    array("a" => "10", "b" => "21"), 
//    array("a" => "10", "b" => "21"), 
//    array("a" => "11", "b" => "20"), 
//    array("a" => "11", "b" => "21") 
//);  
//$key =  array_keys($testArray, array("a" => "10", "b" => "21")); 
//print_r($key);
/*
Array
(
    [0] => 1
    [1] => 2
)
 */




////SECOND SOLUTION 40 / 100
//$dwarfs = [];
//while (true) {
//    $input = readline();
//    if ($input === 'Once upon a time') {
//        break;
//    }
//    $line = explode(' <:> ', $input);
//    $name = $line[0];
//    $hatColor = $line[1];
//    $physics = intval($line[2]);
//
//    if (!key_exists($hatColor, $dwarfs)) {
//        $dwarfs[$hatColor][$name] = $physics;
//    } elseif (!key_exists($name, $dwarfs[$hatColor])) {
//        $dwarfs[$hatColor][$name] = [];
//        $dwarfs[$hatColor][$name] = $physics;
//    }
//    if ($dwarfs[$hatColor][$name] < $physics) {
//        $dwarfs[$hatColor][$name] = $physics;
//    }
//}
//
//// sort by physics descending
//$phys = [];
//foreach ($dwarfs as $colors => $names) {
//    foreach ($names as $name) {
//        $phys[$colors] = $name;
//    }
//}
//
////sort by count descending
//$counts = array_map(function($c) { return count($c);}, $dwarfs);
//
//// sort by 1.physics, 2.count, 3.keys(hatColors)
//array_multisort($phys, SORT_DESC, $counts, SORT_DESC, $dwarfs);
//
//foreach ($dwarfs as $colors => $names) {
//    ksort($names);
//    foreach ($names as $name => $phys) {
//        echo "($colors) $name <-> $phys" . PHP_EOL;
//    }
//}



/*
// Solution Slavi Kapsalov
 
$lines = [];
while (true) {
    $inpLine = readline();
    if ($inpLine === 'Once upon a time') {
        break;
    }
    array_push($lines, $inpLine);
}
 
$allHats = [];
foreach ($lines as $line) {
    $splDwarf = explode(' <:> ', $line);
    array_push($allHats, $splDwarf[1]);
}
 
$hatCount = array_count_values($allHats);
 
$allDwarfs = [];
foreach ($lines as $line) {
    $splDwarf = explode(' <:> ', $line);
    $dwarfAssoc = array('name' => $splDwarf[0], 'hat' => $splDwarf[1], 'physics' => intval($splDwarf[2]), 'sameHat' => $hatCount[$splDwarf[1]]);
    $contains = false;
    for ($i = 0; $i < count($allDwarfs); $i++) {
        if ($allDwarfs[$i]['name'] == $dwarfAssoc['name'] && $allDwarfs[$i]['hat'] == $dwarfAssoc['hat']) {
            if ($allDwarfs[$i]['physics'] < $dwarfAssoc['physics']) {
                $allDwarfs[$i]['physics'] = $dwarfAssoc['physics'];
            }
            $allDwarfs[$i]['sameHat']--;
            $contains = true;
        }
    }
    if (!$contains) {
        array_push($allDwarfs, $dwarfAssoc);
    }
}
uksort($allDwarfs, function ($key1, $key2) use ($allDwarfs) {
    $orderDwarfsByPhysics = $allDwarfs[$key1]['physics'] <=> $allDwarfs[$key2]['physics'];
    if ($orderDwarfsByPhysics === 0)
        return $allDwarfs[$key2]['sameHat'] <=> $allDwarfs[$key1]['sameHat'];
 
    return $allDwarfs[$key2]['physics'] <=> $allDwarfs[$key1]['physics'];
});
 
foreach ($allDwarfs as $d) {
    echo "(" . $d['hat'] . ") " . $d['name'] . " <-> " . $d['physics'] . PHP_EOL;
}
 */
 
 
 /*
 Solution Java
 
 import java.util.*;
 
 
public class Main {
 
    static class Dwarf {
        private String name;
        private String color;
        private int physics;
 
        public Dwarf(String name, String color, int physics) {
            this.name = name;
            this.color = color;
            this.physics = physics;
        }
 
        public void setPhysics(int physics) {
            this.physics = Math.max(physics, this.getPhysics());
        }
 
        public String getName() {
            return name;
        }
 
        public String getColor() {
            return color;
        }
 
        public int getPhysics() {
            return physics;
        }
    }
 
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
 
        List<Dwarf> dwarves = new ArrayList<>();
        Map<String, Integer> countsByColor = new HashMap<>();
 
        String line = sc.nextLine();
 
        while (!line.equals("Once upon a time")) {
            String[] tokens = line.split(" <:> ");
            String name = tokens[0];
            String color = tokens[1];
            int physics = Integer.parseInt(tokens[2]);
 
            Optional<Dwarf> dwarfCandidate = dwarves.stream().filter(dwarf -> dwarf.getName().equals(name) && dwarf.getColor().equals(color))
                    .findFirst();
 
            if (dwarfCandidate.isPresent()) {
                Dwarf dwarf = dwarfCandidate.get();
                dwarf.setPhysics(physics);
            } else {
                Dwarf dwarf = new Dwarf(name, color, physics);
                countsByColor.putIfAbsent(color, 0);
                countsByColor.put(color, countsByColor.get(color) + 1);
                dwarves.add(dwarf);
            }
 
            line = sc.nextLine();
        }
 
        dwarves.sort((dwarf1, dwarf2) -> {
            int physics2 = dwarf2.getPhysics();
            int physics1 = dwarf1.getPhysics();
            if (physics1 == physics2) {
                return countsByColor.get(dwarf2.getColor()).compareTo(
                        countsByColor.get(dwarf1.getColor())
                );
            }
            return Integer.compare(physics2, physics1);
        });
 
        dwarves.forEach(dwarf -> System.out.printf("(%s) %s <-> %d%n", dwarf.getColor(), dwarf.getName(), dwarf.getPhysics()));
    }
}
 
 */