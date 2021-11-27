<?php
$jsonFile = json_decode(file_get_contents("data.json"),true);


if($jsonFile["currentlyRunning"]>$jsonFile["amountSubmitted"]){
    echo "Running current";
}
else{
    echo $jsonFile["currentlyRunning"];
}



?>