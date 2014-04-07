<html>
	<head>
		<link href="style.css" rel="stylesheet">
		<meta charset="utf-8"></meta>
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="css/buttons.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="js/buttons.js"></script>
	</head>
	<body>
	<a href="poser_sa_question.php"><img class="logo" src="question.png"/></a>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("sowal");
		if(isset($_POST["confirmer"]))
			{
				$Nom=$_POST["Nom"];
				$Question=$_POST["Question"];
				$Time=gmdate("Y-m-d H:i:s");
				mysql_query("INSERT INTO `sowal`.`questions` (`ID`, `Question`, `Date`, `Nom_Complet`) VALUES (NULL, '$Question', '$Time', '$Nom');");
			}
										$REQ = mysql_query("SELECT q.id as 'idr',Question,q.Date,q.Nom_Complet FROM questions q  left join reponses r on r.id_question=q.ID");
										while($row=mysql_fetch_assoc($REQ)){
										?>
					<table border="1" width=900>
										<?php
											echo "<tr><td height=100><p class=\"text\">".$row["Question"]."</p></td>"."<td><a href=\"question.php?id=".$row["idr"]."\">Voir les réponses</a>"."</td></tr>"."<br/>";
											echo "<tr><td>Question posée par : ".$row["Nom_Complet"]."</td>";
											echo "<td>Date : ".$row["Date"]."</td></tr>";
										}
							?>
					</table
	</body>
</html>