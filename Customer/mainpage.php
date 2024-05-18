<!doctype html>
<html lang="en">

	<head>
		<title>Customer Table</title>
		<!--- including --->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>
		<style>
			.fixed-table-toolbar .search input {
				height: 48px; 
				width: 400px;
			}
    	</style>
	</head>

	<body>
	<div class = "container" style = "max-width:1400px">
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
			data-click-to-select="true"
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
			</tr>
		</thead>
		</table>
	</div>

	<div class="modal fade" id="CreateUserModal" tabindex="-1" aria-labelledby="CreateUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateUserModalLabel">Create New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add Row form to another website(?) -->

                    <form id="AddRowForm">
                        <div class="mb-3">
                            <label for="inputRow" class="form-label">Require addtion row: </label>
                            <input type="text" class="form-control" id="inputRow" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form> 

					<!-- Create User form -->
					<form id="CreateUserForm">
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name: </label>
                            <input type="text" class="form-control" name="Name" id="Name" required>
                        </div>
						<div class="mb-3">
                            <label for="Email" class="form-label">Email: </label>
                            <input type="text" class="form-control" name="Email" id="Email" required>
                        </div>
						<div class="mb-3">
                            <label for="PhoneNumber" class="form-label">Phone Number: </label>
                            <input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" required>
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
	
	<script>

		function queryParams(params){
			return{
				limit: params.limit,
				offset: params.offset,
				search: params.search,
				order: params.order,
                sort: params.sort
			};
		}

		var $table = $('#table')

		function buttons(){
			return{

			// Create Button
			btnUsersCreate:{
				text: 'Create users',
				icon: 'bi bi-person-fill-add',
				event: function(){
					$('#CreateUserModal').modal('show');
				},
				attributes:{
					title: 'Create new user',
					class: 'btn btn-primary btn-lg',
				}
			},

			// Delete Button
			btnUsersDelete:{
				text: 'Delete users',
				icon: 'bi bi-person-fill-dash',
				event: function(){
					var ids = $.map($table.bootstrapTable('getSelections'), function(row){
							return row.CustomerID
					})
					if(ids.length > 0){
						$.ajax({
                            url: 'Delete.php',
                            method: 'POST',
                            data: {ids: ids},
                            success: function(response){
								if(response.success){
									$table.bootstrapTable('remove', {
                                    field: 'CustomerID',
                                    values: ids
                                	});
									$table.bootstrapTable('refresh')
                                	alert('Users deleted successfully');
								}
								else{
									alert('Users deleted Failed');
								}
                                
                            },
                            error: function(){
                                alert('An error occurred while deleting users');
                            }
                        });
					}
				},
				attributes:{
				title: 'Delete selected users',
				class: 'btn btn-primary btn-lg'
				}
			}
			}
		}


		$(document).ready(function(){
            $('#CreateUserForm').submit(function(event){
                var Name = $('#Name').val();
				var Email = $('#Email').val();
				var PhoneNumber = $('#PhoneNumber').val();
				var Address = $('#Address').val();
				var RegistrationDate = $('#RegistrationDate').val();
				var CustomerType = $('#CustomerType:checked').val();

				$.ajax({
                    url: 'Create.php',
                    method: 'POST',
                    data: {Name: Name,
						   Email: Email,
						   PhoneNumber: PhoneNumber,
						   Address: Address,
						   RegistrationDate: RegistrationDate,
						   CustomerType: CustomerType
					},
                    success: function(response){
						if(response.success){
							alert("Users created successfully");
						}
						else{
							alert("Users created failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while creating users');
                    }
                });
                $('#CreateUserModal').modal('hide');
            });
        });

	</script>	
		
		
	</body>
</html>