<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Web app con red bean</title>
</head>
<body>
	<?php
		require('rb.php');

		R::setup( 'mysql:host=localhost;dbname=webapp', 'root', '' );

		$reports = R::findAll('reporte');

		echo '<table border="1" cellpadding="5">';
		echo '<tr>
				<td>PokeSel</td>
				<td>color</td>
				<td>ataque</td>
				<td>motivo</td>
			</tr>';
		
		foreach($reports as $report){
			echo '<tr>';
			echo '<td>' . $report->pokeSel . '</td>';
			echo '<td>' . $report->color . '</td>';
			echo '<td>' . $report->ataque . '</td>';
			echo '<td>' . $report->motivo . '</td>';
			echo '</tr>';
		}
	?>
</body>
</html>