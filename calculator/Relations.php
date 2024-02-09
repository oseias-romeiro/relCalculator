<?php

class Relations
{
    protected $set;
    protected $rel;

    function __construct($set, $rel) {
        $this->set = $set;
        $this->rel = $rel;
    }

    function isReflexive() {
        $equalXY = array();
        foreach($this->rel as $r){
            if($r[0] == $r[1]){
                $equalXY[] = $r[0];
            }
        }
        return(count($equalXY) == count($this->set));
    }
    
    function isSymmetric() {
        $dyagonal = true;
        $find = false;
        foreach($this->rel as $r){
            if($r[0] != $r[1]){
                $dyagonal = false;
                $find = false;
                foreach($this->rel as $r2){
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
    function isAntisymmetric() {
        $dyagonal = true;
        $find = false;
        foreach($this->rel as $r){
            if($r[0] != $r[1]){
                $dyagonal = false;
                $find = false;
                foreach($this->rel as $r2){
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
    
    function isTransitive()
    {
        foreach($this->rel as $r) {
            foreach($this->rel as $r1) {
                $ar = [$r[0], $r1[1]];
                $found = false;
                foreach($this->rel as $r2) {
                    if($r2 == $ar){
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    return false;
                }
            }
        }
        return true;
    }
}

?>
