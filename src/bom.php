<?php 
function hasbom(&$content) {   
    $firstline = $content[0];   
    return ord(substr($firstline, 0, 1)) === 0xEF   
        and ord(substr($firstline, 1, 1)) === 0xBB    
        and ord(substr($firstline, 2, 1)) === 0xBF;   
}   
function unsetbom(&$content) {   
    hasbom($content) and ($content[0] = substr($content[0], 3)); 
    echo 'this file has bom header'; 
}   
function write($filename, &$content) {   
    $file = fopen($filename, 'w');   
    fwrite($file, implode($content, ''));   
    fclose($file);   
}   
function filenames($path) {   
    $directory = opendir($path);   
    while (false != ($filename = readdir($directory))) strpos($filename, '.') !== 0 and $filenames[] = $filename;   
    closedir($directory);   
    return $filenames;   
}   
function process($path) {   
    $parent = opendir($path);   
    while (false != ($filename = readdir($parent))) {   
       echo $filename."/n";   
        if(strpos($filename, '.') === 0) continue;   
        if(is_dir($path.DIRECTORY_SEPARATOR.$filename)) {   
            process($path.DIRECTORY_SEPARATOR.$filename);   
        } else {   
            $content = file($path.DIRECTORY_SEPARATOR.$filename);   
            unsetbom($content);   
            write($path.DIRECTORY_SEPARATOR .$filename, $content);   
        }   
    }   
    closedir($parent);   
}   

##change the directory here
process('/opt/wwwroot/');  
?> 
