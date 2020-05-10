<?php
session_start(); 
$pagename = "Sign up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>" . $pagename . "</title>"; //display name of the page as window title
echo "<body>";
include("headfile.html"); //include header layout file
echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page
//display random text

echo "<form action=login_process.php method=post>";

echo "<table>
		<tr>	
 	 	 				
 	 	 				<tr><td>*Email Address: </td><td><input type=email name='email'> </td> </tr>
 	 	 				<tr><td>*Password: </td><td><input type=password name='password'> </td> </tr>
						<tr><td><input type=submit value=Sign Up></input></td>
						<td><input type=reset value=Clear Form Form></input></td></tr>
 	 	 				
 	 </tr>
	 </table>";
echo "</form>";


include("footfile.html"); //include head layout
echo "</body>";
?>
