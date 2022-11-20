<table class="table table-dark table-bordered" style="width: 200px; margin: 40px">
<tbody>

<?php
// array(array(str)) -> array(array(int))
function convert_int_mat($rel){
    $matrix = array();
    foreach ($rel as $r) {
        array_push($matrix, [intval($r[0]), intval($r[0])]);
    }
    return $matrix;
}

// return max number of array(array(int))
function maxi($rel){
    $max = 0;
    foreach ($rel as $r) {
        if($r[0] > $max){
            $max = $r[0];
        }elseif($r[1] > $max) {
            $max = $r[0];
        }
    }
    return $max;
}

// fill and print matrix
function fill_print_mat($rel){

    $matrix = convert_int_mat($rel);

    $max_value = maxi($matrix);

    for ($row=0; $row < $max_value+1; $row++) {
        echo "<tr>";
        echo '<td class="td_hd">'.$row.'</td>';
        for ($col=0; $col < $max_value+1; $col++) { 
            $found = false;
            foreach ($matrix as $r) {
                if ($row == $r[0] and $col == $r[1]) {
                    echo "<td>1</td>";
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                echo "<td>0</td>";
            }
        }
        echo "</tr>";
    }
}

// fill_print_mat([["0","0"],["1","1"],["2","2"],["4","4"]]);
fill_print_mat($_SESSION['matrix']);

?>
</tbody>
</table>
<small style="font-size: 0.6rem;">For correct matrix, use only NUMERIC SYMBOLS and put pairs in ASCENDING ORDER!</small>
<p></p>
