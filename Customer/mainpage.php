<!doctype html>
<html lang="en">

	<head>
		<title>Table</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.css">
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
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>
	
	<script>

		var $table = $('#table')

		function buttons () {
			return {
			btnUsersAdd: {
				text: 'Highlight Users',
				icon: 'bi bi-plus-circle',
				event: function () {
					var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
							return row.CustomerID
						})
						$table.bootstrapTable('remove', {
							field: 'CustomerID',
							values: ids
						})
						//call delete.php
				},
				attributes: {
				title: 'Search all users which has logged in the last week'
				}
			}
			}
		}
		</script>	
		
		
	</body>
</html>