<form>
    <label for="num1">M: </label>
    <input type="text" id="num1" name="num1" />
    <label  for="num2">N: </label>
    <input type="text" id="num2" name="num2" />
    <input type="submit" />
</form>
<?php
if (isset($_GET['num1']) && isset($_GET['num2'])) {
    $m = intval($_GET['num1']);
    $n = intval($_GET['num2']);
    
    echo $m * $n;
}
?>

