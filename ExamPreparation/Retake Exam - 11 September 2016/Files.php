<?php
$num = intval(readline());
$files = [];
//$pattern = "/(?<root>[A-Za-z0-9-:_.]+)\\\\((?<path>[\\\\A-Za-z0-9-_. ]+)\\\\)?(?<fileName>[A-Za-z0-9. -_]+)\.(?<extension>[a-z]+);(?<fileSize>\d+)/";
$pattern = "/(?<root>.+?)\\\\(?<path>.+?\\\\)+(?<fileName>.+)\.(?<extension>.+);(?<fileSize>\d+)/";
for($i = 0; $i < $num; $i++){
    $fileInfo = readline();
    preg_match($pattern, $fileInfo, $match);
        $root = $match['root'];
        $fileName = $match['fileName'];
        $extension = $match['extension'];
        $fileSize = $match['fileSize'];
        $file = $fileName .'.'. $extension;
        $files[$root][$file] = $fileSize;
}

$query = explode(' ', readline());
$queryExtension = $query[0];
$queryRoot = $query[2];
$result = [];

if(key_exists($queryRoot, $files)){
    $searched = $files[$queryRoot];
    foreach ($searched as $file=>$size){
        if(strpos($file, $queryExtension) !== false){
            $result[$file] = $size;
        }
    }
}

if(count($result) > 0) {
    uksort($result, function ($f1, $f2) use ($result) {
        if ($result[$f2] === $result[$f1]) {
            return strcmp($f1, $f2);
        }
        return $result[$f2] <=> $result[$f1];
    });

    foreach ($result as $file=>$size) {
        echo "$file - $size KB" . PHP_EOL;
    }
} else {
    echo 'No'.PHP_EOL;
}