<?php
require('header.inc.php');
require('connection.inc.php');
require('functions.inc.php');
require('Welcome_text.inc.php');
?>


<!--- nav bootsrap --->
<button type="button" class="btn btn-light active" ><a style="text-decoration:none;" >All Orders</button>
<button type="button" class="btn btn-light " ><a style="text-decoration:none;" href="managecategories.php">Manage Categories</a></button>
<button type="button" class="btn btn-light manage_order" ><a style="text-decoration:none;" href="manageproducts.php">Manage Products</a></button>
<button type="button" class="btn btn-light" ><a style="text-decoration:none;" href="contactus.php">View Feedbacks</a></button>


									<!--- Order Check Tab Content --->

  	
	<table class="table" style="margin-top: 2%;">
	  <thead>
	    <tr>
	      <th scope="col">Order id</th>
	      <th scope="col">Order Name</th>
	      <th scope="col">Name</th>
	      <th scope="col">Phone Number</th>
	      <th scope="col">Address</th>
	      <th scope="col">Shop id</th>
	      <th scope="col">Order Status</th>
	      <th scope="col">Payment Status</th>
	    </tr>
	  </thead>
		<tbody>
	    <tr>
	      <td >001</td>
	      <td>Chiken Tikka</td>
	      <td>Shubham Sanjay Joshi</td>
	      <td>7264808928</td>
	      <td>Vinayak Park, Kate Vasti, Dighi , Pune ,pin 411015.</td>
	      <td>51117</td>
	      <td>Confirmed</td>
	      <td>Received</td>
	    </tr>
		</tbody>
	</table>





	






<?php

require('footer.inc.php');

?>
