<?php
session_start();
include("detectlogin.php");
include("db.php");

$pagename = "Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>" . $pagename . "</title>"; //display name of the page as window title
echo "<body>";
include("headfile.html"); //include header layout file
echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page

// $_SESSION['basket']=null;
$newprodid = null;
$reququantity = null;

// if(isset(var))
// $_SESSION['basket'][$newprodid]=$reququantity;
if (isset($_POST['h_prodid'])) {
	$newprodid = $_POST['h_prodid'];
	$reququantity = $_POST['selectedOption'];
	$_SESSION['basket'][$newprodid] = $reququantity;

	//echo "<p>The doc id ".$newdocid." has been ".$_SESSION['basket'][$newdocid];
	echo "<p>1 item added to the basket";
} else {
	echo "Current basket unchanged";
}

echo "<table>
 	 	 		<tr>
 	 	 			<th>Product Name</th>
 	 	 			<th>Unit Price</th>
 	 	 			<th>Quantity</th>
 	 	 			<th>Sub Total</th>
				   </tr>";

$total_amount = 0;

if (isset($_SESSION['basket'])) {

	if (isset($_POST['r_prodId'])) {
		$deleteId = $_POST['r_prodId'];
		// echo $deleteId;
		unset($_SESSION['basket'][$deleteId]);
	}

	foreach ($_SESSION['basket'] as $index => $value) {
		$SQL = "select  prodName, prodPicNameLarge,prodDescripLong,prodPrice, prodQuantity from Product where prodId = " . $index . " ";
		//run SQL query for connected DB or exit and display error message
		$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error());

		while ($arrayp = mysqli_fetch_array($exeSQL)) {
			// $sql="INSERT INTO basket(prodId,qty) VALUES('$index','$value')";
			// $exeSQL=mysqli_query($conn, $sql) or die (mysqli_error());

			$subTotal = $value * $arrayp['prodPrice'];
			$total_amount += $subTotal;

			echo "<form action=basket.php method=post>";
			echo "<tr>
 	 	 				
 	 	 				<td>" . $arrayp['prodName'] . "</td>
 	 	 				<td>" . $arrayp['prodPrice'] . "</td>
 	 	 				<td>" . $value . "</td>
 	 	 				<td>" . $subTotal . "</td>
 	 	 				<td><input type=submit value=Remove></input></td>
 	 	 				
 	 	 			</tr>";

			echo "<input type=hidden name=r_prodId value=" . $index . ">";
			echo "</form>";
		}
	}
} else {
	echo "<br><h4>Empty Basket</h4>";
}
echo "<tr><td colspan='3'>Total Amount</td>
 	 	 				<td>" . $total_amount . "</td>
 	 	 				<td></td>";

echo "</table>";

echo "<br><a href='clearbasket.php'>Clear Basket</a></br>";

if (isset($_SESSION['userid'])) {

	echo "To finalize your order <a href=checkout.php>checkout</a>";
} else {
	echo "New Hometeq customers : <a href=sign.php> Sign up </a><br><br>";

	echo "Returing Hometeq customers : <a href=login.php> Log in </a>";
}





// echo "<br><br>New hometeq Customers : <a href='signup.php'>Sign Up</a>";
// echo "<br><br>Returning hometq Customers : <a href='login.php'>Log in</a>";

include("footfile.html"); //include head layout
echo "</body>";
