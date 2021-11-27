<?php
$uploadOk = true;


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$orignalName =  basename($_FILES["fileToUpload"]["name"]);
//Gets file extension
$submittedFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


$jsonFile = json_decode(file_get_contents("data.json"),true);
//Setting up json variables
$currentlyRunning = $jsonFile["currentlyRunning"];
$amountSubmitted = $jsonFile["amountSubmitted"];
$fileNumber = $amountSubmitted+1;
//Sets up uplaoded files name
$newfilename = $target_dir.strval($fileNumber).'.'.$submittedFileType;





// Check if file already exists


// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $uploadOk = false;
  echo "dumbadd";
}

// Only Allows python
if($submittedFileType != "py") {
  $uploadOk = false;
  echo "Dumass";
}

//Checks to see if there are any errors with the file if it is it upload the file
if ($uploadOk == false) {
  echo "Sorry, your file was not uploaded.";

} 
else 
{
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$newfilename)) {
    //updates the amount submitted
    $jsonFile["amountSubmitted"] = $amountSubmitted+1;
    $jsonFile["files"][$jsonFile["amountSubmitted"]] = $orignalName;
        
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

//Updates json file

file_put_contents('data.json', json_encode($jsonFile));

header("Location: http://pleasework.csh.rit.edu/");

?>
