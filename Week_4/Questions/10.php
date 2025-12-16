<form method="post">
    Num1: <input type="number" name="n1">
    Num2: <input type="number" name="n2">
    Op: <select name="op">
        <option>add</option><option>subtract</option>
        <option>multiply</option><option>divide</option>
    </select>
    <button type="submit">Calc</button>
</form>

<?php
if (isset($_POST['n1'])) {
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $op = $_POST['op'];
    
    switch ($op) {
        case 'add': echoResult($n1 + $n2); break;
        case 'subtract': echoResult($n1 - $n2); break;
        case 'multiply': echoResult($n1 * $n2); break;
        case 'divide': echoResult($n1 / $n2); break;
    }
}
function echoResult($val) { echo "Result: $val"; }
?>