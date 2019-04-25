<?php    
if(isset($_POST['SubmitButton'])){ //check if form was submitted
  $input = $_POST['inputText']; //get input text
  $message = "Success! You entered: ".$input;
  error_reporting(0); // Disable all errors.
}    
?>

<html>
<body>    
<?php echo $message;?>
<form action="" method="post">
  
  <input type="text" name="inputText"/>
  <input type="submit" name="SubmitButton"/>
</form>    
</body>
</html>