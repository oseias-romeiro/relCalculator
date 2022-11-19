
<table class="table table-dark table-bordered" style="width: 200px; margin: 40px">
<tbody>

<?php
    $matrix = $_SESSION['matrix'];
    $size = count($matrix);
    $c = 0;
    $x = 1;
    $y = 1;
    while ($c < $size) {
        echo "<tr>";

        # line
        $z = 0;
        while ($z < $size) {
            $find = false;
            foreach ($matrix as $m) {
                if($m[0] == strval($x) and $m[1] ==  strval($y)){
                    echo "<td>1</td>";
                    $find = true;
                    break;
                }
            }
            if(!$find){
                echo "<td>0</td>";
            }
            $y += 1;
            $z += 1;
        }

        echo "</tr>";
        $x += 1;
        $c += 1;
        $y = 1;
    }
?>

</tbody>
</table>
<small style="font-size: 0.6rem;">For correct matrix, use only NUMERIC SYMBOLS and put pairs in ASCENDING ORDER!</small>
<p></p>
