<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Baza danych produktów</title>
  </head>
  <body>
    <h2>Strona logowania</h2>
    <a href="index.php">Krok do tyłu</a><br/><br/>
    <form action="checklogin.php" method="post">
      Wprowadż imie użytkownika: <input type="text" name="imie" required="required"/> <br/>
      Wprowadż hasło użytkownika: <input type="password" name="haslo" required="required" /> <br/>
      <input type="submit" value="Logować się"/>
    </form>
	<div id="footer">
				<p><a href="https://sites.google.com/site/infoteczka/" >(c) ŻAK. Wrocław, 2017 </a></p>
	</div>
  </body>
</html>