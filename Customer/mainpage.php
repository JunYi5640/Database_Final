<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Customer Management</title>
		<!--- including --->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.css">
		<link rel="stylesheet" href="../Mainpage.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>
	</head>
	
	<body>
	<header>
        <nav>
            <ul>
                <li><a href="../Mainpage.php">Mainpage</a></li>
                <li><a href="../Customer/mainpage.php">Customer</a></li>
                <li><a href="../Product/mainpage.php">Product</a></li>
                <li><a href="../Sales/mainpage.php">Sales Order</a></li>
                <li><a href="../Order/mainpage.php">Order Detail</a></li>
                <li><a href="../Request/mainpage.php">Request</a></li>
                <li><a href="../Interaction/mainpage.php">Interaction</a></li>
            </ul>
        </nav>
    </header>
	
	<main>
	<!-- Customer Table -->
	<div class = "container mb-4 mt-4" style = "max-width:1400px">
		<h2><b>Customer Table</b></h2>
		<table
			id="table"
			data-toggle="table"
			data-url="Select.php"
			data-buttons="buttons"
			data-sort-name="CustomerID" 
      		data-sort-order="asc" 
			data-pagination="true"
			data-side-pagination="server"
			data-page-list="[10, 25, 50, 100, ALL]"
			data-search="true"
  			data-show-search-button="true"
			data-search-on-enter-key="true"
			data-click-to-select="true"
			data-on-click-cell="onClickCell"
			data-query-params="queryParams"
			>
		<thead>
			<tr>
			<th data-field="state" data-checkbox="true"></th>
			<th data-field="CustomerID" data-sortable="true">ID</th>
			<th data-field="Name">Name</th>
			<th data-field="Email">Email</th>
			<th data-field="PhoneNumber">Phone Number</th>
			<th data-field="Address">Address</th>
			<th data-field="RegistrationDate">Registration Date</th>
			<th data-field="CustomerType">Customer Type</th>
			<th data-field="action" data-formatter="actionFormatter" data-events="actionEvents" algin = "center">Action</th>
			</tr>
		</thead>
		</table>
	</div>

	<!-- Create Customer Modal -->
	<div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">Create New Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<form id="CreateForm">
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name: </label>
                            <input type="text" class="form-control" name="Name" id="Name" required>
                        </div>
						<div class="mb-3">
                            <label for="Email" class="form-label">Email: </label>
                            <input type="email" class="form-control" name="Email" id="Email" required>
                        </div>
						<div class="mb-3">
                            <label for="PhoneNumber" class="form-label">Phone Number: </label>
                            <input type="tel" pattern="09[0-9]{8}" class="form-control" name="PhoneNumber" id="PhoneNumber" required>
                        </div>
						<div class="mb-3">
                            <label for="Address" class="form-label">Address: </label>
                            <input type="text" class="form-control" name="Address" id="Address" required>
                        </div>
						<div class="mb-3">
                            <label for="RegistrationDate" class="form-label">Registration Date: </label>
                            <input type="date" class="form-control" name="RegistrationDate" id="RegistrationDate" required>
                        </div>
						<div class="mb-3">
                            <label for="CustomerType" class="form-label">Customer Type: </label>
                            <input type="radio" name="CustomerType" id="CustomerType" value="Individual" checked/>
							<label for="Individual">Individual</label>
							<input type="radio" name="CustomerType" id="CustomerType" value="Corporate"/>
    						<label for="Corporate">Corporate</label><br>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<!-- Update Customer form -->
	<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UpdateModalLabel">Customer Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<form id="UpdateForm">
						<div class="mb-3">
							<label for="CustomerID" class="form-label">CustomerID: </label>
							<b><span id="CustomerID"></span></b>
                        </div>
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name: </label>
                            <input type="text" class="form-control" name="Name" id="Name" required>
                        </div>
						<div class="mb-3">
                            <label for="Email" class="form-label">Email: </label>
                            <input type="email" class="form-control" name="Email" id="Email" required>
                        </div>
						<div class="mb-3">
                            <label for="PhoneNumber" class="form-label">Phone Number: </label>
                            <input type="tel" pattern="09[0-9]{8}" class="form-control" name="PhoneNumber" id="PhoneNumber" required>
                        </div>
						<div class="mb-3">
                            <label for="Address" class="form-label">Address: </label>
                            <input type="text" class="form-control" name="Address" id="Address" required>
                        </div>
						<div class="mb-3">
                            <label for="RegistrationDate" class="form-label">Registration Date: </label>
                            <input type="date" class="form-control" name="RegistrationDate" id="RegistrationDate" required>
                        </div>
						<div class="mb-3">
                            <label for="CustomerType" class="form-label">Customer Type: </label>
                            <input type="radio" name="CustomerType" id="CustomerType" value="Individual" checked/>
							<label for="Individual">Individual</label>
							<input type="radio" name="CustomerType" id="CustomerType" value="Corporate"/>
    						<label for="Corporate">Corporate</label><br>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
	</main>

	<footer>
            <label>&copy; M11202108. 周鈞羿</lable>
    </footer>
	
	<script>
		// Action button in table column
		function actionFormatter(value, row, index){
			return [
				'<div style = "display: flex; align-items: center; justify-content: center;">',
					'<button class="btn btn-primary update-button" style="margin-right: 5px;">',
					'<i class="bi bi-gear"></i>', 
					'</button>',

					'<button class="btn btn-danger delete-button">',
					'<i class="bi bi-trash"></i>', 
					'</button>',
				'</div>'
			].join('');
		}

		// Action button event
		window.actionEvents = {
			// Update button
        	'click .update-button': function(e, value, row, index){
				$('#UpdateModal').on('show.bs.modal', function (e) {
					$('#UpdateForm #CustomerID').text(row.CustomerID);
					$('#UpdateForm input[name="Name"]').val(row.Name);
					$('#UpdateForm input[name="Email"]').val(row.Email);
					$('#UpdateForm input[name="PhoneNumber"]').val(row.PhoneNumber);
					$('#UpdateForm input[name="Address"]').val(row.Address);
					$('#UpdateForm input[name="RegistrationDate"]').val(row.RegistrationDate);
					$('#UpdateForm input[name="CustomerType"][value="' + row.CustomerType + '"]').prop('checked', true);
				});
				$('#UpdateModal').modal('show');
        	},

			// Delete button
			'click .delete-button': function(e, value, row, index){
				$.ajax({
                    url: 'Delete.php',
                    method: 'POST',
					dataType: 'json',
                    data: {ids: [row.CustomerID]},
                    success: function(response){
						if(response.success){
							$table.bootstrapTable('remove', {
                            field: 'CustomerID',
                            values: row.CustomerID
                        	});
							$table.bootstrapTable('refresh')
							alert('Customer deleted successfully');
						}
						else{
							alert('Customer deleted Failed');
						}
                                
                    },
                	error: function(){
                        alert('An error occurred while deleting customer');
                    }
            	});
        	}
    	}

		// SELECT params
		function queryParams(params){
			return{
				limit: params.limit,
				offset: params.offset,
				search: params.search,
				order: params.order,
                sort: params.sort
			};
		}

		// Get all selected row's CustomerID
		var $table = $('#table')
		function getSelections() {
    		return $.map($table.bootstrapTable('getSelections'), function(row){
      			return row.CustomerID
    		})
  		}
		
		// Button above table
		function buttons(){
			return{

			// Create button
			btnCreate:{
				text: 'Create customer',
				icon: 'bi bi-person-fill-add',
				event: function(){
					// Create button event
					$('#CreateModal').modal('show');
				},
				attributes:{
					title: 'Create new customer',
					class: 'btn btn-primary btn-lg',
				}
			},

			// Delete Button
			btnDelete:{
				text: 'Delete customer',
				icon: 'bi bi-person-fill-dash',
				event: function(){
					// Delete button event
					var ids = getSelections();
					if(ids.length > 0){
						$.ajax({
                            url: 'Delete.php',
                            method: 'POST',
							dataType: 'json',
                            data: {ids: ids},
                            success: function(response){
								if(response.success){
									$table.bootstrapTable('remove', {
                                    field: 'CustomerID',
                                    values: ids
                                	});
									$table.bootstrapTable('refresh')
                                	alert('Customer deleted successfully');
								}
								else{
									alert('Customer deleted Failed');
								}
                                
                            },
                            error: function(){
                                alert('An error occurred while deleting customer');
                            }
                        });
					}
				},
				attributes:{
				title: 'Delete selected customer',
				class: 'btn btn-primary btn-lg'
				}
			}
			}
		}

		// Modal button
		$(document).ready(function(){
			// Create button
            $('#CreateForm').submit(function(event){
                var Name = $('#CreateForm #Name').val();
				var Email = $('#CreateForm #Email').val();
				var PhoneNumber = $('#CreateForm #PhoneNumber').val();
				var Address = $('#CreateForm #Address').val();
				var RegistrationDate = $('#CreateForm #RegistrationDate').val();
				var CustomerType = $('#CreateForm #CustomerType:checked').val();

				$.ajax({
                    url: 'Create.php',
                    method: 'POST',
					dataType: 'json',
                    data: {Name: Name,
						   Email: Email,
						   PhoneNumber: PhoneNumber,
						   Address: Address,
						   RegistrationDate: RegistrationDate,
						   CustomerType: CustomerType
					},
                    success: function(response){
						if(response.success){
							alert("Customer created successfully");
						}
						else{
							alert("Customer created failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while creating customer');
                    }
                });
                $('#CreateModal').modal('hide');
            });

			// Update button
			$('#UpdateForm').submit(function(event){
				var CustomerID = $('#UpdateForm #CustomerID').text();
                var Name = $('#UpdateForm #Name').val();
				var Email = $('#UpdateForm #Email').val();
				var PhoneNumber = $('#UpdateForm #PhoneNumber').val();
				var Address = $('#UpdateForm #Address').val();
				var RegistrationDate = $('#UpdateForm #RegistrationDate').val();
				var CustomerType = $('#UpdateForm #CustomerType:checked').val();

				$.ajax({
                    url: 'Update.php',
                    method: 'POST',
					dataType: 'json',
                    data: {CustomerID: CustomerID,
						   Name: Name,
						   Email: Email,
						   PhoneNumber: PhoneNumber,
						   Address: Address,
						   RegistrationDate: RegistrationDate,
						   CustomerType: CustomerType
					},
                    success: function(response){
						console.log(response.success);
						if(response.success){
							alert("Customer updated successfully");
						}
						else{
							alert("Customer updated failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while updating customer');
                    }
                }); 
                $('#UpdateModal').modal('hide');
            });
        });
	</script>	
	</body>
</html>