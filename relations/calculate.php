<?php
    
    function reflexive($set, $rel) {
        $equalXY = array();
        foreach($rel as $r){
            if($r[0] == $r[1]){
                $equalXY[] = $r[0];
            }
        }
        return(count($equalXY) == count($set));
    }

    function symmetric($set, $rel) {
        $dyagonal = true;
        $find = false;
        foreach($rel as $r){
            if($r[0] != $r[1]){
                $dyagonal = false;
                $find = false;
                foreach($rel as $r2){
                    if($r[0] == $r2[1] and $r[1] == $r2[0]){
                        $find = true;
                    }
                }
                if(!$find){
                    break;
                }
            }
        }
        if($dyagonal){
            return $dyagonal;
        }else{
            return $find;
        }
    }
    function antisymmetric($set, $rel) {
        $dyagonal = true;
        $find = false;
        foreach($rel as $r){
            if($r[0] != $r[1]){
                $dyagonal = false;
                $find = false;
                foreach($rel as $r2){
                    if($r[0] == $r2[1] and $r[1] == $r2[0]){
                        $find = true;
                        break;
                    }
                }
                if($find){
                    break;
                }
            }
        }
        if($dyagonal){
            return $dyagonal;
        }else{
            return !$find;
        }
    }
?>