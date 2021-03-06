<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css"> 
		<title>Baza danych produktów</title>
	</head>
	<?php
	/* Login session */
	session_start(); //starts the session
	if($_SESSION['imie']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['imie']; //assigns user value
	?>
	<body>
		
		<!-- MAIN SECTIONS -->

		<div id="wrapper">
			<a href="#" onClick="document.getElementById('main_frame').innerHTML ='<h3>Proszę wybrać szczegółowe dane w menu obok dla ich przeglądu</h3>' "> <h2>Początkowa strona</h2> </a>
			<div id="header">
				<p style="text-align:right;"> Witam, <?php Print "$user"?>! <br/> <a href="logout.php">Wylogować się</a> </p> <!--Displays user's name-->		
			</div>
			<div id="main">
				<div id="menu"> 
					<h4> Wybierz Liste dla pracy </h4> 
					<a href="#" onClick="MainProd()" >Lista produktów</a> <br/>
					<a href="#" onClick="MainVen()" > Lista dostawców </a>
				</div>			
				<div id="main_frame"> 
					<h3> Proszę wybrać szczegółowe dane w menu obok dla ich przeglądu </h3>  
				</div>
			</div>
			<div id="footer">
				<p><a target="_blank" href="https://sites.google.com/site/infoteczka/" >(c) ŻAK. Wrocław, 2017 </a></p>
			</div>
		</div>
		
		<!-- SCRIPTS SECTION -->
		
	<script type="text/javascript">
	// Open prod_table function
	function MainProd(){
		document.getElementById("main_frame").innerHTML = `<?php include "prod_table.php"; ?>` ;		
	}
	// Open vendors_table function
	function MainVen(){
		document.getElementById("main_frame").innerHTML = `<?php include "vendors_table.php"; ?>` ;		
	}
	// Delete table.id_item function
	function myFunction(id)
		{
		var r=confirm("Czy naprawde chcesz usunac ten zapis?");
		if (r==true)
	  {
	  	window.location.assign("delete.php?id=" + id);
	  }
	}
	
	function myFunctionVen(id)
		{
		var r=confirm("Czy naprawde chcesz usunac ten zapis?");
		if (r==true)
	  {
	  	window.location.assign("delete_ven.php?id=" + id);
	  }
	}
	</script>
	</body>
</html>