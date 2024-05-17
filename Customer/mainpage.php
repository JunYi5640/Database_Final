<!doctype html>
<html lang="en">

	<head>
		<title>Table</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">
		<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
  	</head>

	<body>
	<div class = "container" style = "max-width:1800px;"> 
		<table
			id="table"
			data-toggle="table"
			data-search="true"
			data-show-search-button="true"
			data-click-to-select="true"
			
			data-url="Select.php"
			data-pagination="true"
			data-side-pagination="server"
			data-page-list="[10, 25, 50, 100, ALL]"
			data-buttons="buttons">
		<thead>
			<tr>
			<th data-field="state" data-checkbox="true"></th>
			<th data-field="CustomerID">ID</th>
			<th data-field="Name">Name</th>
			<th data-field="Email">Email</th>
			<th data-field="PhoneNumber">Phone Number</th>
			<th data-field="Address">Address</th>
			<th data-field="RegistrationDate">Registration Date</th>
			<th data-field="CustomerType">CustomerType</th>
			</tr>
		</thead>
		</table>
	</div>
	<script>
		function buttons () {
			return {
			btnUsersAdd: {
				text: 'Highlight Users',
				icon: 'bi bi-plus-circle',
				event: function () {
				alert('Do some stuff to e.g. search all users which has logged in the last week')
				},
				attributes: {
				title: 'Search all users which has logged in the last week'
				}
			}
			}
		}
	</script>	
	
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>

	</body>
</html>