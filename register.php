<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Baza danych produktów</title>
  </head>
  <body>
    <h2>Strona rejestracji</h2>
    <a href="index.php">Krok do tyłu</a><br/><br/>
    <form action="register.php" method="post">
      Wprowadż imie użytkownika: <input type="text" name="imie" required="required"/> <br/>
      Wprowadż hasło użytkownika: <input type="password" name="haslo" required="required" /> <br/>
      <input type="submit" value="Register"/>
    </form>
  </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = mysql_real_escape_string($_POST['imie']);
  $password = mysql_real_escape_string($_POST['haslo']);
    $bool = true;
  mysql_connect("127.0.0.1", "root","usbw") or die(mysql_error()); //Connect to server
  mysql_select_db("pierwsza_db") or die("Cannot connect to database"); //Connect to database
  $query = mysql_query("SELECT * FROM uzytkowniki"); //Query the users table
  while($row = mysql_fetch_array($query)) //display all rows from query
  {
    $table_users = $row['imie']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($username == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Wprowadzone imie już zajęte!");</script>'; //Prompts the user
      Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    mysql_query("INSERT INTO uzytkowniki (username, password) VALUES ('$username','$password')"); //Inserts the value to table users
    Print '<script>alert("Poprawnie zarejestrowane!");</script>'; // Prompts the user
    Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
  }
}
?>