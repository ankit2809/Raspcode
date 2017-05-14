<?php
  //$de_ques = $_POST['text_src'];
  //$en_ans = $data['translationText'];
    // Connecting to database
    $connection = new MongoDB\Driver\Manager('mongodb://192.168.0.109:27017');
    //$command = new MongoDB\Driver\Command(['ping' => 1]);
    //$connection->executeCommand('local', $command);
    //$filter = ['de_wort' => 'horen'];
    $query = new MongoDB\Driver\Query([],[]);
	$cursor = $connection->executeQuery('local.trans_de_en', $query);
?>
<html>
<head>
	<title>Practice German</title>
</head>
<body>
<div align="center">
<table border="1">	
	<tr>
	<th>Deutsch</th>
	<th>English</th>
	</tr>
	<?php 
	foreach ($cursor as $document) 
		{	
     	$doc = (array)$document;
     	print "<tr> <td>";
        echo $doc['de_wort']; 
        print "</td><td>";
        echo $doc['en_trans'];
        print "</td> </tr>";
		} 
	?>	
</table>
<br><br><br><br>		
	<a href="trans_deutsch.html">Home</a>	
</div>
</body>
</html>