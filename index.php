<?php include_once "partials/head.php" ?>

<div class="container">

    <h1 class="title">Relations calculator</h1>
    <br>
    
    <div class="calculate">
        <br>
        <form action="/relations/core.php" method="post" autocomplete="off">

            <label for="set">SET:</label>
            <input type="text" class="form-control" name="set" placeholder="{1,2,3,4}" required
            <?php
                if(isset($_SESSION['set'])){
                    echo 'value = "' . $_SESSION['set'] .'"';
                }
            ?>
            >
            <small style="font-size: 0.9rem">The "{ }" its optional</small>
            <br><br>
            <label for="relation">RELATION:</label>
            <input type="text" class="form-control" name="relation" placeholder="{(1,1) (2,2) (3,3) (4,4)}" required
            <?php
                if(isset($_SESSION['relation'])){
                    echo 'value = "' . $_SESSION['relation'] .'"';
                }
            ?>
            >
            <small style="font-size: 0.9rem">The "{ }" its optional and dont use comma "," between pairs </small>
            <br><br>
            <button type="submit" class="btn btn-success">Calculate</button>
        </form>
    </div><br>
    <hr><br>
    <div class="results">
        <?php
            if(isset($_SESSION["Result"])){
                echo "<h2>Result:</h2>";
                foreach($_SESSION["Result"] as $r){
                    echo "* $r<br>";
                }
                echo "
                    <br>
                    <a href='/clear.php'><button class='btn btn-warning'>Clear</button></a>
                    <br><br>
                ";
            }
        ?>
    </div>
    <h3 class="question">What is relations? What is Reflexive, Symmetric and Antisymmetric properties?</h3>
    <br>
    <p>
        Relation is a collection of ordered pairs. For each pair (x, y) the object X is from the first set and the Y if from the second set, but a relation can be between one set with itself.
    </p>
    <p>Relation R in set A</p>
    <h2>* Reflexive</h2>
    <p class="formula">
        (a, a) &#8712; R &#x2192; a &#8712; A
    </p>
    <b>Exemple: </b>
    <p class="exemple">
        set: A = {1,2,3}
        <br>
        R = {(1,1) (2,2) (3,2) (3,3)}
    </p>
    <hr><br>
    <h2>* Symmetric</h2>
    <p class="formula">
        (a, b) &#8712; R &#x2192; (b, a) &#8712; R
    </p>
    <b>Exemple: </b>
    <p class="exemple">
        set: A = {1,2,3}
        <br>
        R = {(1,2) (2,1) (2,3) (3,2)}
    </p>
    <hr><br>
    <h2>* Antisymmetric</h2>
    <p class="formula">
        (a, b) &#8712; R ^ (b, a) &#8712; R &#x2192; (a = b)
    </p>
    <b>Exemple: </b>
    <p class="exemple">
        set: A = {1,2,3}
        <br>
        R = {(1,1) (2,2)}
    </p>
    <hr><br>
</div>

<?php include_once "partials/foot.php" ?>