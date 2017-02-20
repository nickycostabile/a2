<?php require('billSplitter.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Assignment 2: PHP | N. Costabile</title>
	
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

</head>
<body>

	<div id="container">
		<h1>The Bill Splitter</h1>

		<form method="GET" action="index.php">

			<label for="billAmount">Bill Amount*</label>
			<input type="text" name="billAmount" id="billAmount" class="inputNum">

			<label for="numPeople">No. of People*</label>
			<input type="text" name="numPeople" id="numPeople" class="inputNum" >

			<label for="tipIncluded">Tip Included?</label>
				<label for="tipIncluded"><input type="checkbox" name="tipIncluded" id="tipIncluded" <?php if($form->isChosen('tipIncluded')) echo 'CHECKED' ?>>Yes</label>

			<label for="tipPercentage">Tip Percentage</label>
			<input list="tipPercentage" name="tipPercentage" id="list" class="inputNum">
				<datalist id="tipPercentage">
					<option value="10%">
					<option value="15%">
					<option value="20%">
					<option value="25%">
				</datalist>
			

			<label for="roundUp">Round Up?</label>
				<label for="roundUp"><input type="checkbox" name="roundUp" id="roundUp" value="yes">Yes</label>

			<button type="submit" id="submitBtn">Submit</button>

		</form>


		<!-- Messages -->
		<?php if(isset($errors)): ?>

			<div id="alert">
				<ul>
					<?php foreach($errors as $error): ?>
						<li> <?=$error?> </li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div id= "results">
				<?php if($personAmount): ?>
					<p>Each person will pay $<?=sanitize($personAmount)?></p>
				<?php endif; ?>
			</div>

		<?php endif;?>

	
	</div> <!-- end container div -->

</body>
</html>