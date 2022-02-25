<?php include_once "partials/head.php" ?>

<div class="container">

    <h1 class="title">Relations calculator</h1>
    
        <?php // results
            if(isset($_SESSION["Result"])){
                
                echo "<div class='card'><h2>Result:</h2>";
                foreach($_SESSION["Result"] as $r){
                    echo "* $r<br>";
                }
                echo "
                    <br>
                    <a href='/clear.php'><button class='btn btn-warning'>Clear</button></a>
                ";

                include_once "relations/matrix.php";
                echo "</div>";
            }
        ?>
    
    <div class="card">
        <h4>* Calculator to find out relations of sets</h4>
        <br>
        <form action="/relations/core.php" class="calculate" method="post" autocomplete="off">

            <label for="set">SET:</label>
            <input type="text" class="form-control" name="set" placeholder="{1,2,3,4}" required
            <?php
                if(isset($_SESSION['set'])){
                    echo 'value = "' . $_SESSION['set'] .'"';
                }
            ?>
            >
            <ul class="how">
                <li>The "{ }" its optional</li>
                <li>use COMMAS "," between pairs<br></li>
            </ul>
            <label for="relation">RELATION:</label>
            <input type="text" class="form-control" name="relation" placeholder="{(1,1) (2,2) (3,3) (4,4)}" required
            <?php
                if(isset($_SESSION['relation'])){
                    echo 'value = "' . $_SESSION['relation'] .'"';
                }
            ?>
            >
            <ul class="how">
                <li>The "{ }" its optional</li>
                <li>DONT use commas "," between pairs<br></li>
                <li>use SPACES between pairs</li>
            </ul>
            <button type="submit" class="btn btn-success">Calculate</button>
        </form>
    </div>
    <br><br>
    
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
    <div class="matrixes">
        <b>Matrix: </b><br>
        <img src="/public/img/reflexive-matrix.png" alt="Reflexive matrix">
    </div><br>
    <b>Example: </b>
    <p class="example">
        set: A = {1,2,3}
        <br>
        R = {(1,1) (2,2) (3,2) (3,3)}
    </p>
    <hr><br>
    <h2>* Symmetric</h2>
    <p class="formula">
        (a, b) &#8712; R &#x2192; (b, a) &#8712; R
    </p>
    <div class="matrixes">
        <b>Matrix: </b><br>
        <img src="/public/img/symmetric-matrix.png" alt="Symmetric matrix">
    </div><br>
    <b>Example: </b>
    <p class="example">
        set: A = {1,2,3}
        <br>
        R = {(1,2) (2,1) (2,3) (3,2)}
    </p>
    <hr><br>
    <h2>* Antisymmetric</h2>
    <p class="formula">
        (a, b) &#8712; R ^ (b, a) &#8712; R &#x2192; (a = b)
    </p>
    <div class="matrixes">
        <b>Matrix: </b><br>
        <img src="/public/img/antisymetric-matrix.png" alt="Antisymmetric matrix">
    </div><br>
    <b>Example: </b>
    <p class="example">
        set: A = {1,2,3}
        <br>
        R = {(1,1) (2,2)}
    </p>
    <hr><br>
    <h2>* Transitive</h2>
    <p class="formula">
        (a, b) ^ (b, c) &#8712; R &#x2192; (a, b) &#8712; R
    </p>
    <div class="matrixes">
        <b>Matrix: </b><br>
        <img src="/public/img/transitive-matrix.png" alt="Transitive matrix">
    </div><br>
    <b>Example: </b>
    <p class="example">
        set: A = {1,2,3}
        <br>
        R = {(1,1) (2,2) (1,2) (2,1)}
    </p>
</div>

<?php include_once "partials/foot.php" ?>