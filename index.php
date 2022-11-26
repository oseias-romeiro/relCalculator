<?php
    session_start();
    include_once "partials/head.php";
?>
<mark id="msg_help">
    <small>Some error or suggestions? <a href="mailto:oseiasromeirom@gmail.com">Write to me</a>.</small>
    <button style="border: 1px solid black;" class="btn btn-help" onclick="delete_msg()">X</button>
</mark>

<div class="container">
    <h1 class="title">Relations Calculator</h1>
    
        <?php // results
            if(isset($_SESSION["Result"])){
                
                echo "<div class='card'><h2>Result:</h2>";
                foreach($_SESSION["Result"] as $r){
                    echo "* $r<br>";
                }
                include_once "calculator/matrix.php";
                echo "
                    <a href='/clear.php'><button class='btn btn-warning'>Clear</button></a>
                ";
                echo "</div>";
            }
        ?>
    
    <div class="card">
        <h4>* Calculator to find out the relations of sets</h4>
        <br>
        <form action="/calculator/main.php" class="calculate" method="post" autocomplete="off">

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
    
    <h3 class="question">What is relations? What are Reflexive, Symmetric and Antisymmetric properties?</h3>
    <br>
    <p>
        Relation is a collection of ordered pairs. For each pair (x, y), each object X is from the symbols of the first set and the Y is from the symbols of the second set.
    </p>
    <p>
        But a relation can be between one set with it too. In this case the X and Y objects are from symbols of only one set, this case is most common!
    </p>
    <p>
        For matrixes representation of relations, each line represent the X object and column, Y object. Each square represents a combination based on symbols of the set. The squares are 1 if your pair exist on relation. But it depends of symbols set, maybe it can not use letters, instead numbers or whatever other set of symbols.
    </p>
    <p>Relation R in set A</p>
    <br>
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
    <br>
    <h3><u>keywords</u>:</h3>
    <p>
        <b>RelCalculator</b>, <b>Relations-Calculator</b>, <b>Relations</b>, <b>Calculator</b>, <b>sets</b>, <b>examples</b>, <b>formulas</b>, <b>what-is-relations</b>, <b>Reflexive</b>, <b>Symmetric</b>, <b>Transitive</b>, <b>Anti-Symmetric</b>, <b>Anti-Reflexive</b>, <b>relation-properties-calculator</b>, <b>properties-of-relations-calculator</b>, <b>matrix</b>, <b>matrix-generator</b>, <b>matrix-relation</b>, <b>matrixes</b>
    </p>
</div>

<?php include_once "partials/foot.php" ?>
