<?php
require('Form.php');
require('tools.php');

# Instantiate the objects we'll need
$form = new DWA\Form($_GET);

if($form->isSubmitted()) {
	$billAmount = floatval($form->get('billAmount'));
	$numPeople = intval($form->get('numPeople'));

	$tipIncluded = $form->isChosen('tipIncluded');

		# If tip is not included
		if($tipIncluded == false) {
			$tipPercentage = floatval($form->get('tipPercentage'));

			$billAmount = (1 + ($tipPercentage / 100)) * $billAmount;
		}

		# Validation
		$errors = $form->validate(
			[
				'billAmount' => 'required|min:0',
				'numPeople' => 'required|numeric|min:0'
			]
		);

		if($errors)
			$personAmount = [];
		else
			$personAmount = $billAmount / $numPeople;


	$roundUp = $form->isChosen('roundUp');

		# If round up 
		if ($roundUp == true) {
			$personAmount = round($personAmount, 0);
		}

} // end if isSubmitted
