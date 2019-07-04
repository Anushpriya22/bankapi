<html>
	<head>
		<title>Bank API table</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">  
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
		<style>
			#load{
				width:100%;
				height:100%;
				position:fixed;
				z-index:9999;
				background:url("https://www.creditmutuel.fr/cmne/fr/banques/webservices/nswr/images/loading.gif") no-repeat center center rgba(0,0,0,0.25);
			}
		</style>
	</head>
	<body>
		<div id="load"></div>
		<div id="table_bank">
			<table id="banktable" class="display" style="width:100%">
				<thead>
					<tr>
						<th>BANK_NAME</th>
						<th>IFSC</th>
						<th>BANK_ID</th>
						<th>BRANCH</th>
						<th>ADDRESS</th>
						<th>CITY</th>
						<th>DISTRICT</th>
						<th>STATE</th>
					</tr>
				</thead>
				<tbody>
					<?php 
							$link = file_get_contents("https://vast-shore-74260.herokuapp.com/banks?city=MUMBAI");
							$response = json_decode($link, true); 
							foreach($response as $bank_details){
					?>
					<tr>
						<td><?php echo $bank_details['bank_name'] ?></td>
						<td><?php echo $bank_details['ifsc'] ?></td>
						<td><?php echo $bank_details['bank_id'] ?></td>
						<td><?php echo $bank_details['branch'] ?></td>
						<td><?php echo $bank_details['address'] ?></td>
						<td><?php echo $bank_details['city'] ?></td>
						<td><?php echo $bank_details['district'] ?></td>
						<td><?php echo $bank_details['state'] ?></td>
					</tr>
					<?php } ?>	
				</tbody>
			</table>
		</div>
	</body>
	<script>
		$(document).ready( function () {
			$('#banktable').DataTable();
		} );
		
		document.onreadystatechange = function () {
		  var state = document.readyState
		  if (state == 'interactive') {
			   document.getElementById('table_bank').style.visibility="hidden";
		  } else if (state == 'complete') {
			  setTimeout(function(){
				 document.getElementById('interactive');
				 document.getElementById('load').style.visibility="hidden";
				 document.getElementById('table_bank').style.visibility="visible";
			  },1000);
		  }
		}
	</script>
</html>