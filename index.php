<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$num = $i = 0;
$guess = "";
$it = "";
$search = $result = $answer = $change = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["change"] === "yes") {
        $num = rand ( 0 , 1000 );
        $it = "0";
    }
    else {
        $num = $_POST["change"];
        
        $it = $_POST["i"];
        
    }

  
   $guess = $_POST["guess"];
  // $search = $_POST["search"];
  $guess = intval($guess);
  $num = intval($num);
  $i = intval($it);

  
}

if ($i<10) {
    if($guess == $num) {
        $result = "Yeah, u got it! <br> on $i. try.";
        $i = 0;
    }
    else if ($guess < $num) {
        $result = "too low";
        $i++;

    }

    else if ($guess > $num) {
        $result = "too high";
        $i++;

    }
}
else {
    $result = "Nah, u screwed <br> The number was $num";
    $i = 0;
}


?>

<h2>Guess that damned number</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="index.php">  
  Your guess: <input type="text" name="guess" value="" autofocus>
  <br><br>
  Change the number: <br> <input type="radio" name="change" value="yes"/> Yes <br>
   <input type="radio" name="change" value="<?php echo $num; ?>" checked/> No <br>
<input type="radio" name="i" value="<?php echo $i; ?>" hidden checked/>

  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Result:</h2>";

echo $answer;
//echo "Letter you are looking for is on ";
//echo strpos($set, $search); // outputs 6
//echo " position in the text";
//echo strpos($set, $search);
echo $result;
echo "<br>";
//echo $num;
//echo $guess;
echo " $i. try. Max 10.";

?>

</body>
</html>