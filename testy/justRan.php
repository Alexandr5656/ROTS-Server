<?php
    $jsonFile = json_decode(file_get_contents("data.json"),true);

    $justRan=$_GET['id'];

    if(($justRan+1)<=$jsonFile["amountSubmitted"]){
        $jsonFile["currentlyRunning"] = ($justRan+1);
    }
    else if(($justRan+1)>$jsonFile["amountSubmitted"]){
        $jsonFile["currentlyRunning"] = $jsonFile["amountSubmitted"]+1;
    }
    file_put_contents('data.json', json_encode($jsonFile));
?>