<?php
session_start();
error_reporting(0);

if(!isset($_SESSION['mainforbuyer'])){
	echo "<script>window.location.replace('../index.php');</script>";	
}

if($_SESSION['mainforbuyer'] == 'Buyers'){
	$input_table = "(Buyer = 'Munro' OR Buyer = 'Transglobal' OR Buyer = 'Munro' OR Buyer = 'Devered')";
	$openingstock_table = "(BuyerCode = 'Munro' OR BuyerCode = 'Transglobal' OR BuyerCode = 'Lambton' OR BuyerCode = 'Devered' OR Warehouse = 'HO/18' OR Warehouse = 'HO/21' OR Warehouse = 'HO/22' OR Warehouse = 'HO/15' OR Warehouse = 'HO/19')";
	
	$buyerselection = '<option disabled selected value>Please select</option>
						<option value="Devered">Devered</option>
						<option value="Lambton">Lambton</option>
						<option value="Transglobal">Transglobal</option>
						<option value="Munro">Munro</option>
						<option value="Tailorman">Tailorman</option>';
	
}else if($_SESSION['mainforbuyer'] == 'Devered'){
	$input_table = "(Buyer = 'Devered')";
	$openingstock_table = "(BuyerCode = 'Devered' OR Warehouse = 'HO/18')";
	$buyerselection = '<option value="Devered">Devered</option>';
}else if($_SESSION['mainforbuyer'] == 'Transglobal'){
	$input_table = "(Buyer = 'Transglobal')";
	$openingstock_table = "(BuyerCode = 'Transglobal' OR Warehouse = 'HO/21')";
	$buyerselection = '<option value="Transglobal">Transglobal</option>';
}else if($_SESSION['mainforbuyer'] == 'Lambton'){
	$input_table = "(Buyer = 'Lambton')";
	$openingstock_table = "(BuyerCode = 'Lambton' OR Warehouse = 'HO/22')";
	$buyerselection = '<option value="Lambton">Lambton</option>';
}else if($_SESSION['mainforbuyer'] == 'Tailorman'){
	$input_table = "(Buyer = 'Tailorman')";
	$openingstock_table = "(BuyerCode = 'Tailorman' OR Warehouse = 'HO/15')";
	$buyerselection = '<option value="Tailorman">Tailorman</option>';
}else if($_SESSION['mainforbuyer'] == 'Munro'){
	$input_table = "(Buyer = 'Munro')";
	$openingstock_table = "(BuyerCode = 'Munro' OR Warehouse = 'HO/19')";
	$buyerselection = '<option value="Munro">Munro</option>';
}else{
	$input_table = "(Buyer = 'dfhfhdjkfhdsjf')";
	$openingstock_table = "(BuyerCode = 'dfhfhdjkfhdsjf')";
	$buyerselection = '<option disabled selected value>Please select</option>';
}

?>