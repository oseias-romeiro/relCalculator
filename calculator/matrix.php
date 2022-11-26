<table class="table table-dark table-bordered" style="width: 200px; margin: 40px">
<tbody>

<?php

function CombSet(array $set)
{
    $comb = array();
    foreach ($set as $row) {
        $x = array();
        foreach ($set as $col) {
            array_push($x, $col);
        }
        $comb[$row] = $x;
    }
    return $comb;
}

function matrix(array $set, array $rel)
{
    $mat = CombSet($set);
    $mat0 = array();

    $x = 0;
    foreach ($mat as $row => $m0) {
        $y = 0;
        foreach ($m0 as $m1) {
            $found = false;
            foreach ($rel as $r) {
                if ($r[0] == $row and $r[1] == $m1) {
                    $mat0[$x][$y] = 1;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $mat0[$x][$y] = 0;
            }
            $y += 1;
        }
        $x += 1;
    }
    return $mat0;
}

// fill and print matrix
function print_mat($set, $rel){

    $matrix = matrix($set, $rel);

    $max_value = sizeof($set);

    for ($row=0; $row < $max_value; $row++) {
        echo "<tr>";
        echo '<td class="td_hd">'.$set[$row].'</td>';
        for ($col=0; $col < $max_value; $col++) { 
            echo '<td>'.$matrix[$row][$col].'</td>';
        }
        echo "</tr>";
    }
}

print_mat($_SESSION['matrix_set'], $_SESSION['matrix']);
//print_mat(['a', 'b', 'c'], [['a','b'], ['b','b']]);

?>
</tbody>
</table>
<small style="font-size: 0.6rem;">TIP: You can use not-numeric symbols too!</small>
<p></p>
