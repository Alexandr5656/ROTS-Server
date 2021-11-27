<?php
$files = glob('./uploads/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)) {
    unlink($file); // delete file
  }
}
$jsonFile = json_decode(file_get_contents("empty_data_copy.json"),true);
file_put_contents('data.json', json_encode($jsonFile));
?>