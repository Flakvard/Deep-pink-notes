<?php
function onSave(){
    //print_r($_POST["note"]);
    saveToFile($_POST['note']);
}

function viseElement($Sletknappen){
    $notesArray2 = getFromFile();
    unset(($notesArray2)[$Sletknappen]);
    $jsonNotes = json_encode($notesArray2); //encoder det til en json
    
    file_put_contents(".//notes.json", $jsonNotes); //Putter det i en json fil
    header("Location:/deep-notes/indeks.php");
}

function saveToFile($note){
    $notesArray = getFromFile(); //skal bruges til næste gang (Get from fil, return json?)
    /*  */
    $notesArray[] = $note; //appender/pusher vores noter til en array. Det som [] laver er at vi tæller elementer og så tilsætter en ny element 
    $jsonNotes = json_encode($notesArray); //encoder det til en json
    
    file_put_contents(".//notes.json", $jsonNotes); //Putter det i en json fil
}

function getFromFile() {
    $jsonNotes1 = file_get_contents(".//notes.json");
    $notesArray1 = json_decode($jsonNotes1, true); //True betyder
    return $notesArray1; // returnerer til en variable
}

?>