<?php

//Класс для создания уникального имени
class SetName{
public static function RandomName($path, $ext){
do {
  $name=uniqid();
  $file=$path . $name . $ext;
}
while(file_exists($file));
return $name;
}
}

switch($_FILES['file']['error']) {
  case 0:
  //Работа с папкой
$userpath=$_POST['folder_name'];
$path=realpath(__DIR__).'/'."$userpath" . '/';
@mkdir($path,0777);

//Работа с файлом
$filedata=pathinfo(basename($_FILES['file']['name']));
$ext= '.' . $filedata['extension'];
$filename=SetName::RandomName($path,$ext);
$result=$path . $filename . $ext;  
  copy($_FILES['file']['tmp_name'], $result);
  echo "Success!"; break;
  case 1:
  echo "File is too big"; break;
  case 2:
  echo "File is too big"; break;
  case 3:
  echo "Something went terribly wrong! Please, try again!"; break;
  case 4:
  echo "C'mon, select your file!"; break;
}

?>
