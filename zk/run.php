<?php

// $myfile = fopen("hello.txt", "r") or die("Unable to open file!");
// $files[] = fread($myfile,filesize("hello.txt"));

// $keyword = 'Chapter ';

// while($line = fgets("hello.txt")) {

//     if (substr_compare($line, $keyword, 0) === 0) { 
//         $value[] = $line;
//     }
// }
// print_r($value);
//fclose($myfile);


$filename = "hello.txt";
$fp = fopen($filename, "r");

$content = fread($fp, filesize($filename));
$lines = explode("\n", $content);

// $filename = 'hello.txt';
// $searchfor = 'Chapter 10';
// $file = file_get_contents($filename);
// if(strpos($file, $searchfor)) 
// {
//    $files[] = $file;
// }
// $message = 'Chapter 10';

$total = count($lines);
$val = 199;
$pattern = '/\b(Chapter '.$val.')\b/';
$patterns = '/\b(Chapter '.($val + 1).')\b/';

foreach($lines as $row => $key)
{
    if(preg_match($pattern, $lines[$row]))
    {
        $keyMain = $row;
    }
    if(preg_match($patterns, $lines[$row]))
    {
        $keyMain2 = $row;
    }
}

for($i=$keyMain; $i<=$keyMain2-1; $i++)
{
    echo $lines[$i];
}
//print_r($content);
fclose($fp);


?>
