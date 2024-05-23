<!-- TODO: CustomerID can be search and select in create and update form -->

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Customer Interaction Management</title>
		<!--- including --->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>
		<style>
			.fixed-table-toolbar .search input{
				height: 48px; 
				width: 400px;
			}
			#DescriptionLabel{
            word-wrap: break-word;
            white-space: pre-wrap;
            overflow-wrap: break-word;
        	}
    	</style>
	</head>

	<body>
	<!-- Customer Interaction Table -->
	<div class = "container mb-4 mt-4" style = "max-width:1400px">
		<h2><b>Customer Interaction Log</b></h2>
		<table
			id="table"
			data-toggle="table"
			data-url="Select.php"
			data-buttons="buttons"
			data-sort-name="InteractionID" 
      		data-sort-order="asc" 
			data-pagination="true"
			data-side-pagination="server"
			data-page-list="[10, 25, 50, 100, ALL]"
			data-search="true"
  			data-show-search-button="true"
			data-click-to-select="true"
			data-on-click-cell="onClickCell"
			data-query-params="queryParams"
			>
		<thead>
			<tr>
			<th data-field="state" data-checkbox="true"></th>
			<th data-field="InteractionID" data-sortable="true">ID</th>
			<th data-field="CustomerID" data-sortable="true">CustomerID</th>
			<th data-field="Date" data-sortable="true">Date</th>
			<th data-field="Mode">Mode</th>
			<th data-field="Description" data-formatter="descriptionFormatter" data-events="actionEvents">Description</th>
			<th data-field="action" data-formatter="actionFormatter" data-events="actionEvents" algin = "center">Action</th>
			</tr>
		</thead>
		</table>
	</div>

	<!-- Create Customer Interaction Modal -->
	<div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">Create New Customer Interaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<form id="CreateForm">
                        <div class="mb-3">
                            <label for="CustomerID" class="form-label">CustomerID: </label>
                            <select class="form-control" name="CustomerID" id="CustomerID" required>
								<?php include 'get_option.php'; ?>
            				</select>
                        </div>
						<div class="mb-3">
                            <label for="Date" class="form-label">Date: </label>
                            <input type="date" class="form-control" name="Date" id="Date" required>
                        </div>
						<div class="mb-3">
                            <label for="Mode" class="form-label">Mode: </label>
                            <input type="radio" name="Mode" id="Mode" value="Email" checked/>
							<label for="Email">Email</label>
							<input type="radio" name="Mode" id="Mode" value="Phone"/>
    						<label for="Phone">Phone</label>
							<input type="radio" name="Mode" id="Mode" value="In-Person"/>
							<label for="In-Person">In-Person</label><br>
                        </div>
						<div class="mb-3">
                            <label for="Description" class="form-label">Description: </label>
                            <textarea class="form-control" name="Description" id="Description" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<!-- Update Interaction form -->
	<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UpdateModalLabel">Interaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<form id="UpdateForm">
						<div class="mb-3">
							<label for="InteractionID" class="form-label">InteractionID: </label>
							<b><span id="InteractionID"></span></b>
                        </div>
						<div class="mb-3">
                            <label for="CustomerID" class="form-label">CustomerID: </label>
                            <select class="form-control" name="CustomerID" id="CustomerID" required>
								<?php include 'get_option.php'; ?>
            				</select>
                        </div>
						<div class="mb-3">
                            <label for="Date" class="form-label">Date: </label>
                            <input type="date" class="form-control" name="Date" id="Date" required>
                        </div>
						<div class="mb-3">
                            <label for="Mode" class="form-label">Mode: </label>
                            <input type="radio" name="Mode" id="Mode" value="Email"/>
							<label for="Email">Email</label>
							<input type="radio" name="Mode" id="Mode" value="Phone"/>
    						<label for="Phone">Phone</label>
							<input type="radio" name="Mode" id="Mode" value="In-Person"/>
							<label for="In-Person">In-Person</label><br>
                        </div>
						<div class="mb-3">
                            <label for="Description" class="form-label">Description: </label>
                            <textarea class="form-control" name="Description" id="Description" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<!-- Description Interaction -->
	<div class="modal fade" id="DescriptionModal" tabindex="-1" aria-labelledby="DescriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DescriptionModalLabel">Description of InteractionID: <span id="InteractionIDLabel"></span></h5> 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<div class="mb-3">
                        <span id="DescriptionLabel"></span>
                    </div>
					<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

	<script>

		function descriptionFormatter(value, row, index){
			if(!value) return '';
				var maxLength = 40;
			if(value.length > maxLength){
				return value.substring(0, maxLength) + 
					'...<button class="btn btn-secondary btn-sm readmore-button">Read more</button>';
			}
			return value
			
		}

		// action button in table column
		function actionFormatter(value, row, index){
			return[
				'<div style = "display: flex; align-items: center; justify-content: center;">',
					'<button class="btn btn-primary update-button" style="margin-right: 5px;">',
					'<i class="bi bi-gear"></i>', 
					'</button>',

					'<button class="btn btn-danger  delete-button" >',
					'<i class="bi bi-trash"></i>', 
					'</button>',
				'</div>'
			].join('');
		}

		// Action button event
		window.actionEvents = {
			// Update button
        	'click .update-button': function(e, value, row, index){
				$('#UpdateModal').on('show.bs.modal', function(e){
					$('#UpdateForm #InteractionID').text(row.InteractionID);
					$('#UpdateForm input[name="CustomerID"]').val(row.CustomerID);
					$('#UpdateForm input[name="Date"]').val(row.Date);
					$('#UpdateForm input[name="Mode"][value="' + row.Mode + '"]').prop('checked', true);
					$('#UpdateForm textarea[name="Description"]').val(row.Description);
				});
				$('#UpdateModal').modal('show');
        	},

			// Delete button
			'click .delete-button': function(e, value, row, index){
				$.ajax({
                    url: 'Delete.php',
                    method: 'POST',
					dataType: 'json',
                    data: {ids: [row.InteractionID]},
                    success: function(response){
						if(response.success){
							$table.bootstrapTable('remove', {
                            field: 'InteractionID',
                            values: row.InteractionID
                        	});
							$table.bootstrapTable('refresh')
							alert('Interaction deleted successfully');
						}
						else{
							alert('Interaction deleted Failed');
						}
                                
                    },
                	error: function(){
                        alert('An error occurred while deleting interaction');
                    }
            	});
        	},

			'click .readmore-button': function(e, value, row, index){
				$('#DescriptionModal').on('show.bs.modal', function(e){
					$('#InteractionIDLabel').text(row.InteractionID)
					$('#DescriptionLabel').text(value);
				});
				$('#DescriptionModal').modal('show');
        	}
    	};

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

		// Get all selected row's InteractionID
		var $table = $('#table')
		function getSelections(){
    		return $.map($table.bootstrapTable('getSelections'), function(row){
      			return row.InteractionID
    		})
  		}
		
		// Button above table
		function buttons(){
			return{

			// Create button
			btnCreate:{
				text: 'Create interaction',
				icon: 'bi bi-cart-plus-fill',
				event: function(){
					// Create button event
					$('#CreateModal').modal('show');
				},
				attributes:{
					title: 'Create new interaction',
					class: 'btn btn-primary btn-lg',
				}
			},

			// Delete Button
			btnDelete:{
				text: 'Delete interaction',
				icon: 'bi bi-cart-dash-fill',
				event: function(){
					// Delete button event
					var ids = getSelections();
					if(ids.length > 0){
						// check before delete(?)
						$.ajax({
                            url: 'Delete.php',
                            method: 'POST',
							dataType: 'json',
                            data: {ids: ids},
                            success: function(response){
								if(response.success){
									$table.bootstrapTable('remove', {
                                    field: 'InteractionID',
                                    values: ids
                                	});
									$table.bootstrapTable('refresh')
                                	alert('Interaction deleted successfully');
								}
								else{
									alert('Interaction deleted Failed');
								}
                                
                            },
                            error: function(){
                                alert('An error occurred while deleting interaction');
                            }
                        });
					}
				},
				attributes:{
				title: 'Delete selected interaction',
				class: 'btn btn-primary btn-lg'
				}
			}
			}
		}

		// Modal button
		$(document).ready(function(){	
			// Create button
            $('#CreateForm').submit(function(event){
                var CustomerID = $('#CreateForm #CustomerID').val();
				var Date = $('#CreateForm #Date').val();
				var Mode = $('#CreateForm #Mode:checked').val();
				var Description = $('#CreateForm #Description').val();
				$.ajax({
                    url: 'Create.php',
                    method: 'POST',
					dataType: 'json',
                    data: {CustomerID: CustomerID,
						   Date: Date,
						   Mode: Mode,
						   Description: Description
					},
                    success: function(response){
						if(response.success){
							alert("Interaction created successfully");
						}
						else{
							alert("Interaction created failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while creating interaction');
                    }
                });
                $('#CreateModal').modal('hide');
            });

			// Update button
			$('#UpdateForm').submit(function(event){
				var InteractionID = $('#UpdateForm #InteractionID').text();
                var CustomerID = $('#UpdateForm #CustomerID').val();
				var Date = $('#UpdateForm #Date').val();
				var Mode = $('#UpdateForm #Mode:checked').val();
				var Description = $('#UpdateForm #Description').val();
				$.ajax({
                    url: 'Update.php',
                    method: 'POST',
					dataType: 'json',
                    data: {InteractionID: InteractionID,
						   CustomerID: CustomerID,
						   Date: Date,
						   Mode: Mode,
						   Description: Description
					},
                    success: function(response){
						if(response.success){
							alert("Interaction updated successfully");
						}
						else{
							alert("Interaction updated failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while updating interaction');
                    }
                }); 
                $('#UpdateModal').modal('hide');
            });
        });
	</script>	
	</body>
</html>