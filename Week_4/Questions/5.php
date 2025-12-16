<form method="post">
    Sentence: <input type="text" name="sentence">
    <button type="submit">Count</button>
</form>

<?php
if (isset($_POST['sentence'])) {
    $str = strtolower($_POST['sentence']);
    $count = 0;
    $len = strlen($str);
    
    for ($i = 0; $i < $len; $i++) {
        if ($str[$i] == 'a' || $str[$i] == 'e' || $str[$i] == 'i' || $str[$i] == 'o' || $str[$i] == 'u') {
            $count++;
        }
    }
    echo "Vowels count: $count";
}
?>