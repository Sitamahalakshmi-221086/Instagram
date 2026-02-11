<?php
$file = fopen("sample.txt","r");
echo "File opened successfully"."<br>";
fclose($file);

$file1 = fopen("sample.txt","r");
fclose($file1);
echo "File closed"."<br>";

$file2 = fopen("sample.txt","r");
$contents = fread($file2,filesize("sample.txt"));
echo $contents."<br>";
fclose($file2);

$file3 = fopen("sample.txt","a");
fwrite($file3,"New line added using fwrite()"."<br>");
fclose($file3);

$content = file_get_contents("sample.txt");
echo $content;

file_put_contents("sample.txt","This is another new line"."<br>");
$lines = file("sample.txt");
print_r($lines)."<br>";

if(file_exists("index.html")){
    echo "File exists";
}else{
    echo "File not exists";
}

echo filesize("index.html")."bytes";
echo filetype("index.html");

echo date("Y-m-d H:i:s",fileatime("sample.txt"))."<br>";
echo date("Y-m-d H:i:s",filemtime("sample.txt"))."<br>";
echo date("Y-m-d H:i:s",filectime("sample.txt"))."<br>";
echo fileperms("sample.txt")."<br>";
echo fileowner("sample.txt")."<br>";
echo filegroup("sample.txt")."<br>";
echo fileinode("sample.txt")."<br>";

$fcopy = copy("sample.txt","sample1.txt");
echo $fcopy ? "File copied successfully"."<br>" : "File copy failed"."<br>";

$frename = rename("sample1.txt","sample3.txt");
echo "Sample1 renamed to sample3";

unlink("sample3.txt");
echo "sample3 deleted";

mkdir("NewFolder");
echo "New folder created"."<br>";
rmdir("NewFolder");
echo "Folder must be empty"."<br>";

if(is_file("sample.txt")){
    echo "sample.txt is a file"."<br>";
}else{
    echo "sample.txt is not a file"."<br>";
}
if(is_dir("NewFolder")){
    echo "NewFolder is a directory"."<br>";
}else{
    echo "NewFolder is not a directory"."<br>";
}

$dfiles = scandir(".");
print_r($dfiles);

$dir = opendir(".");
while(($file = readdir($dir)) !== false){
    echo $file."<br>";
}
closedir($dir);

echo getcwd();

//chdir("uploads");

$file5 =fopen("sample.txt","a");
if(flock($file5,LOCK_EX)){
    fwrite($file5,"Locked writing");
    flock($file5,LOCK_UN);
}
fclose($file5);
$read = fopen("sample.txt","r");
echo "file in read mode"."<br>";
fclose($read);
$write = fopen("sample.txt","w");
fwrite($write,"This will overwrite the file");
echo "file in write mode"."<br>";
fclose($write);
$fa = fopen("sample.txt","a");
fwrite($fa,"This will append to the file");
echo "file in append mode"."<br>";
fclose($fa);
$fx = fopen("newfile.txt","x");
fwrite($fx,"created using mode-x");
echo "file in exclusive mode"."<br>";
fclose($fx);
unlink("newfile.txt");
$fr = fopen("sample.txt","r+");
fwrite($fr,"This will started from the beginning");
echo "file in read-write mode"."<br>";
fclose($fr);
$fw = fopen("sample.txt","w+");
fwrite($fw,"This will overwrite and read the file");
echo "file in write-read mode"."<br>";
fclose($fw);
$fa = fopen("sample.txt","a+");
fwrite($fa,"This will append and read the file");
echo "file in append-read mode"."<br>";
fclose($fa);
$fx1 = fopen("newfile1.txt","x+");
fwrite($fx1,"created using mode-x+");
fclose($fx1);
unlink("newfile1.txt");



?>


