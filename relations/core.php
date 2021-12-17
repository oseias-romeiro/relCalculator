<?php
    session_start(); 

    // apaga resultado antigo
    session_unset();

    include_once "../relations/calculate.php";

    // data in
    $set = $_POST['set'];
    $relation = $_POST['relation'];
    //$set = "{1,2,3}";
    //$relation = "{(1,2) (2,2) (3,2)";

    // sanitization
    $set = filter_var($set, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $relation = filter_var($relation, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    // validation
    $error = false;
    if(!str_contains($set, ",")){
        $error = true;
    }
    else if(!str_contains($relation, ",") or !str_contains($relation, " ")){
        $error = true;
    }

    if($error){
        $_SESSION['msgError'] = "Invalid values passed!";
        header("Location: /");
        die();
    }

    // data trait
    try {
        $set = str_replace(" ","", $set);
        $set = str_replace("{","", $set);
        $set = str_replace("}","", $set);
        $set = explode(",", $set);
    
        $relation = str_replace(" ","", $relation);
        $relation = str_replace("{","", $relation);
        $relation = str_replace("}", "", $relation);
        $relation = str_replace("("," ", $relation);
        $relation = str_replace(")"," ", $relation);
        $relation = explode(" ", $relation);
        $rel = array();
        foreach($relation as $r){
            if($r != ""){
                $rel[] = explode(",", $r);
            }
        }
    }
    catch (Exception $e) {
        $_SESSION['msgError'] = "Invalid values passed!";
        header("Location: /");
        die();
    }

    /* calculate */
    $result = array();

    // reflexive
    $ref = reflexive($set, $rel);
    if($ref){
        $result[] = "Reflexive";
    }else {
        $result[] = "Not Reflexive";
    }

    // symmetric
    $ref = symmetric($set, $rel);
    if($ref){
        $result[] = "Symmetric";
    }else {
        $result[] = "Not Symmetric";
    }

    // antisymmetric
    $ref = antisymmetric($set, $rel);
    if($ref){
        $result[] = "Antisymmetric";
    }else {
        $result[] = "Not Antisymmetric";
    }

    /* result */
    $_SESSION["set"] = $_POST['set'];
    $_SESSION["relation"] = $_POST['relation'];
    
    $_SESSION["Result"] = $result;
    header("Location: /");
?>