<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Customer Request Management</title>
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
	<!-- Customer Request Table -->
	<div class = "container mb-4 mt-4" style = "max-width:1400px">
		<h2><b>Customer Request Table</b></h2>
		<table
			id="table"
			data-toggle="table"
			data-url="Select.php"
			data-buttons="buttons"
			data-sort-name="RequestID" 
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
			<th data-field="RequestID" data-sortable="true">ID</th>
			<th data-field="CustomerID" data-sortable="true">CustomerID</th>
			<th data-field="ProductID" data-sortable="true">ProductID</th>
			<th data-field="RequestDate">Request Date</th>
			<th data-field="ResolutionDate">Resolution Date</th>
			<th data-field="Status">Status</th>
			<th data-field="IssueDescription" data-formatter="descriptionFormatter" data-events="actionEvents">Description</th>
			<th data-field="action" data-formatter="actionFormatter" data-events="actionEvents" algin = "center">Action</th>
			</tr>
		</thead>
		</table>
	</div>

	<!-- Create Customer Request Modal -->
	<div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">Create New Customer Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<form id="CreateForm">
                        <div class="mb-3">
                            <label for="CustomerID" class="form-label">CustomerID: </label>
                            <select class="form-control" name="CustomerID" id="CustomerID" required>
								<?php include '../get_customer.php'; ?>
            				</select>
                        </div>
						<div class="mb-3">
                            <label for="ProductID" class="form-label">ProductID: </label>
                            <select class="form-control" name="ProductID" id="ProductID" required>
								<?php include '../get_product.php'; ?>
            				</select>
                        </div>
						<div class="mb-3">
                            <label for="RequestDate" class="form-label">Request Date: </label>
                            <input type="date" class="form-control" name="RequestDate" id="RequestDate" required>
                        </div>
						<div class="mb-3">
                            <label for="ResolutionDate" class="form-label">Resolution Date: </label>
                            <input type="date" class="form-control" name="ResolutionDate" id="ResolutionDate">
                        </div>
						<div class="mb-3">
                            <label for="Status" class="form-label">Mode: </label>
                            <input type="radio" name="Status" id="Status" value="Submitted" checked/>
							<label for="Email">Submitted</label>
							<input type="radio" name="Status" id="Status" value="In-Progress"/>
    						<label for="In-Progress">In-Progress</label>
							<input type="radio" name="Status" id="Status" value="Completed"/>
							<label for="Completed">Completed</label><br>
                        </div>
						<div class="mb-3">
                            <label for="IssueDescription" class="form-label">Issue Description: </label>
                            <textarea class="form-control" name="IssueDescription" id="IssueDescription" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<!-- Update Request form -->
	<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UpdateModalLabel">Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<form id="UpdateForm">
						<div class="mb-3">
							<label for="RequestID" class="form-label">RequestID: </label>
							<b><span id="RequestID"></span></b>
                        </div>
						<div class="mb-3">
                            <label for="CustomerID" class="form-label">CustomerID: </label>
                            <select class="form-control" name="CustomerID" id="CustomerID" required>
								<?php include '../get_customer.php'; ?>
            				</select>
                        </div>
						<div class="mb-3">
                            <label for="ProductID" class="form-label">ProductID: </label>
                            <select class="form-control" name="ProductID" id="ProductID" required>
								<?php include '../get_product.php'; ?>
            				</select>
                        </div>
						<div class="mb-3">
                            <label for="RequestDate" class="form-label">Request Date: </label>
                            <input type="date" class="form-control" name="RequestDate" id="RequestDate" required>
                        </div>
						<div class="mb-3">
                            <label for="ResolutionDate" class="form-label">Resolution Date: </label>
                            <input type="date" class="form-control" name="ResolutionDate" id="ResolutionDate">
                        </div>
						<div class="mb-3">
                            <label for="Status" class="form-label">Mode: </label>
                            <input type="radio" name="Status" id="Status" value="Submitted" checked/>
							<label for="Email">Submitted</label>
							<input type="radio" name="Status" id="Status" value="In-Progress"/>
    						<label for="In-Progress">In-Progress</label>
							<input type="radio" name="Status" id="Status" value="Completed"/>
							<label for="Completed">Completed</label><br>
                        </div>
						<div class="mb-3">
                            <label for="IssueDescription" class="form-label">Issue Description: </label>
                            <textarea class="form-control" name="IssueDescription" id="IssueDescription" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<!-- Description Request -->
	<div class="modal fade" id="DescriptionModal" tabindex="-1" aria-labelledby="DescriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DescriptionModalLabel">Description of RequestID: <span id="RequestIDLabel"></span></h5> 
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

					'<button class="btn btn-danger  delete-button" style="margin-right: 5px;">',
					'<i class="bi bi-trash"></i>', 
					'</button>',

					'<button class="btn btn-info  status-button" >',
					'<i class="bi bi-chevron-double-right"></i>', 
					'</button>',

				'</div>'
			].join('');
		}

		// Action button event
		window.actionEvents = {
			// Update button
        	'click .update-button': function(e, value, row, index){
				$('#UpdateModal').on('show.bs.modal', function(e){
					$('#UpdateForm #RequestID').text(row.RequestID);
					$('#UpdateForm select[name="CustomerID"]').val(row.CustomerID);
					$('#UpdateForm select[name="ProductID"]').val(row.ProductID);
					$('#UpdateForm input[name="RequestDate"]').val(row.RequestDate);
					$('#UpdateForm input[name="ResolutionDate"]').val(row.ResolutionDate);
					$('#UpdateForm input[name="Status"][value="' + row.Status + '"]').prop('checked', true);
					$('#UpdateForm textarea[name="IssueDescription"]').val(row.IssueDescription);
				});
				$('#UpdateModal').modal('show');
        	},

			// Delete button
			'click .delete-button': function(e, value, row, index){
				$.ajax({
                    url: 'Delete.php',
                    method: 'POST',
					dataType: 'json',
                    data: {ids: [row.RequestID]},
                    success: function(response){
						if(response.success){
							$table.bootstrapTable('remove', {
                            field: 'RequestID',
                            values: row.RequestID
                        	});
							$table.bootstrapTable('refresh');
							alert('Request deleted successfully');
						}
						else{
							alert('Request deleted Failed');
						}
                                
                    },
                	error: function(){
                        alert('An error occurred while deleting request');
                    }
            	});
        	},

			// Status button
			'click .status-button': function(e, value, row, index){
				if(row.Status == "Completed"){
					alert("Request already Completed");
					return;
				}
				else if(row.Status == "In-Progress"){
					var newStatus = "Completed";
					var today = new Date();
					var newResolutionDate = today.getFullYear() + '-' + 
               							 (String((today.getMonth() + 1)).padStart(2,'0')) + '-' + 
               							 (String(today.getDate()).padStart(2,'0'));
				}
				else if(row.Status == "Submitted"){
					var newStatus = "In-Progress";
					var newResolutionDate = "0000-00-00";
				}
				$.ajax({
                    url: 'Update.php',
                    method: 'POST',
					dataType: 'json',
                    data: {RequestID: row.RequestID,
						   CustomerID: row.CustomerID,
						   ProductID: row.ProductID,
						   RequestDate: row.RequestDate,
						   ResolutionDate: newResolutionDate,
						   Status: newStatus,
						   IssueDescription: row.IssueDescription
					},
                    success: function(response){
						if(response.success){
							$table.bootstrapTable('refresh');
							alert('Status changed successfully');
						}
						else{
							alert('Status changed Failed');
						}       
                    },
                	error: function(){
                        alert('An error occurred while changing status');
                    }
            	});
        	},

			'click .readmore-button': function(e, value, row, index){
				$('#DescriptionModal').on('show.bs.modal', function(e){
					$('#RequestIDLabel').text(row.RequestID)
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

		// Get all selected row's RequestID
		var $table = $('#table')
		function getSelections(){
    		return $.map($table.bootstrapTable('getSelections'), function(row){
      			return row.RequestID
    		})
  		}
		
		// Button above table
		function buttons(){
			return{

			// Create button
			btnCreate:{
				text: 'Create request',
				icon: 'bi bi-cart-plus-fill',
				event: function(){
					// Create button event
					$('#CreateModal').modal('show');
				},
				attributes:{
					title: 'Create new request',
					class: 'btn btn-primary btn-lg',
				}
			},

			// Delete Button
			btnDelete:{
				text: 'Delete request',
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
                                    field: 'RequestID',
                                    values: ids
                                	});
									$table.bootstrapTable('refresh');
                                	alert('Request deleted successfully');
								}
								else{
									alert('Request deleted Failed');
								}
                                
                            },
                            error: function(){
                                alert('An error occurred while deleting request');
                            }
                        });
					}
				},
				attributes:{
				title: 'Delete selected request',
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
				var ProductID = $('#CreateForm #ProductID').val();
				var RequestDate = $('#CreateForm #RequestDate').val();
				var ResolutionDate = $('#CreateForm #ResolutionDate').val();
				var Status = $('#CreateForm #Status:checked').val();
				var IssueDescription = $('#CreateForm #IssueDescription').val();
				
				$.ajax({
                    url: 'Create.php',
                    method: 'POST',
					dataType: 'json',
                    data: {CustomerID: CustomerID,
						   ProductID: ProductID,
						   RequestDate: RequestDate,
						   ResolutionDate: ResolutionDate,
						   Status: Status,
						   IssueDescription: IssueDescription
					},
                    success: function(response){
						if(response.success){
							alert("Request created successfully");
						}
						else{
							alert("Request created failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while creating request');
                    }
                });
                $('#CreateModal').modal('hide');
            });

			// Update button
			$('#UpdateForm').submit(function(event){
				var RequestID = $('#UpdateForm #RequestID').text();
				var CustomerID = $('#UpdateForm #CustomerID').val();
				var ProductID = $('#UpdateForm #ProductID').val();
				var RequestDate = $('#UpdateForm #RequestDate').val();
				var ResolutionDate = $('#UpdateForm #ResolutionDate').val();
				var Status = $('#UpdateForm #Status:checked').val();
				var IssueDescription = $('#UpdateForm #IssueDescription').val();
				$.ajax({
                    url: 'Update.php',
                    method: 'POST',
					dataType: 'json',
                    data: {RequestID: RequestID,
						   CustomerID: CustomerID,
						   ProductID: ProductID,
						   RequestDate: RequestDate,
						   ResolutionDate: ResolutionDate,
						   Status: Status,
						   IssueDescription: IssueDescription
					},
                    success: function(response){
						if(response.success){
							alert("Request updated successfully");
						}
						else{
							alert("Request updated failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while updating request');
                    }
                }); 
                $('#UpdateModal').modal('hide');
            });
        });
	</script>	
	</body>
</html>