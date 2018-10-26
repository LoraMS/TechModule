<?php
if (isset($_GET['person'])) {
    $person = htmlspecialchars($_GET['person']);
    echo "Hello, $person!";
} else {
?>
<form>
    <label for="person">
        Name: 
    </label>
    <input type="text" id="person" name="person" />
    <input type="submit" />
</form>
<?php } ?>
