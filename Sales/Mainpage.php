<!-- TODO: update total amount by orderdetails -->

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
	<!-- Sales Order Table -->
	<div class = "container mb-4 mt-4" style = "max-width:1400px">
		<h2><b>Sales Order Table</b></h2>
		<table
			id="table"
			data-toggle="table"
			data-url="Select.php"
			data-buttons="buttons"
			data-sort-name="OrderID" 
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
			<th data-field="OrderID" data-sortable="true">ID</th>
			<th data-field="CustomerID" data-sortable="true">CustomerID</th>
			<th data-field="OrderDate">OrderDate</th>
			<th data-field="TotalAmount">Total Amount</th>
            <th data-field="PaymentStatus">Payment Status</th>
			<th data-field="DeliveryStatus">Delivery Status</th>
			<th data-field="action" data-formatter="actionFormatter" data-events="actionEvents" algin = "center">Action</th>
			</tr>
		</thead>
		</table>
	</div>

    <!-- Create Sales Order Modal -->
	<div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">Create New Sales Order</h5>
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
                            <label for="OrderDate" class="form-label">Order Date: </label>
                            <input type="date" class="form-control" name="OrderDate" id="OrderDate" required>
                        </div>
						<div class="mb-3">
                            <label for="PaymentStatus" class="form-label">Payment Status: </label>
                            <input type="radio" name="PaymentStatus" id="PaymentStatus" value="Unpaid" checked/>
							<label for="Unpaid">Unpaid</label>
							<input type="radio" name="PaymentStatus" id="PaymentStatus" value="Paid"/>
    						<label for="Paid">Paid</label><br>
                        </div>
                        <div class="mb-3">
                            <label for="DeliveryStatus" class="form-label">Delivery Status: </label>
                            <input type="radio" name="DeliveryStatus" id="DeliveryStatus" value="Pending" checked/>
							<label for="Pending">Pending</label>
							<input type="radio" name="DeliveryStatus" id="DeliveryStatus" value="Shipped"/>
    						<label for="Shipped">Shipped</label>
                            <input type="radio" name="DeliveryStatus" id="DeliveryStatus" value="Delivered"/>
							<label for="Delivered">Delivered</label><br>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<!-- Update Sales Order form -->
	<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UpdateModalLabel">Sales Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<form id="UpdateForm">
						<div class="mb-3">
							<label for="OrderID" class="form-label">OrderID: </label>
							<b><span id="OrderID"></span></b>
                        </div>
						<div class="mb-3">
                            <label for="CustomerID" class="form-label">CustomerID: </label>
                            <select class="form-control" name="CustomerID" id="CustomerID" required>
								<?php include '../get_customer.php'; ?>
            				</select>
                        </div>
						<div class="mb-3">
                            <label for="OrderDate" class="form-label">Order Date: </label>
                            <input type="date" class="form-control" name="OrderDate" id="OrderDate" required>
                        </div>
						<div class="mb-3">
                            <label for="PaymentStatus" class="form-label">Payment Status: </label>
                            <input type="radio" name="PaymentStatus" id="PaymentStatus" value="Unpaid" checked/>
							<label for="Unpaid">Unpaid</label>
							<input type="radio" name="PaymentStatus" id="PaymentStatus" value="Paid"/>
    						<label for="Paid">Paid</label><br>
                        </div>
                        <div class="mb-3">
                            <label for="DeliveryStatus" class="form-label">Delivery Status: </label>
                            <input type="radio" name="DeliveryStatus" id="DeliveryStatus" value="Pending" checked/>
							<label for="Pending">Pending</label>
							<input type="radio" name="DeliveryStatus" id="DeliveryStatus" value="Shipping"/>
    						<label for="Shipping">Shipping</label>
                            <input type="radio" name="DeliveryStatus" id="DeliveryStatus" value="Delivered"/>
							<label for="Delivered">Delivered</label><br>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

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

					'<button class="btn btn-info  Pstatus-button" style="margin-right: 5px;">',
					'<i class="bi bi-chevron-double-right"></i>', 
					'</button>',

                    '<button class="btn btn-secondary  Dstatus-button" >',
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
					$('#UpdateForm #OrderID').text(row.OrderID);
					$('#UpdateForm input[name="CustomerID"]').val(row.CustomerID);
					$('#UpdateForm input[name="OrderDate"]').val(row.OrderDate);
					$('#UpdateForm input[name="PaymentStatus"][value="' + row.PaymentStatus + '"]').prop('checked', true);
                    $('#UpdateForm input[name="DeliveryStatus"][value="' + row.DeliveryStatus + '"]').prop('checked', true);
				});
				$('#UpdateModal').modal('show');
        	},

			// Delete button
			'click .delete-button': function(e, value, row, index){
				$.ajax({
                    url: 'Delete.php',
                    method: 'POST',
					dataType: 'json',
                    data: {ids: [row.OrderID]},
                    success: function(response){
						if(response.success){
							$table.bootstrapTable('remove', {
                            field: 'OrderID',
                            values: row.OrderID
                        	});
							$table.bootstrapTable('refresh');
							alert('Order deleted successfully');
						}
						else{
							alert('Order deleted Failed');
						}
                                
                    },
                	error: function(){
                        alert('An error occurred while deleting request');
                    }
            	});
        	},

			// Payment Status button
			'click .Pstatus-button': function(e, value, row, index){
				if(row.PaymentStatus == "Paid"){
					alert("Payment Status already Paid");
					return;
				}
				else if(row.PaymentStatus == "Unpaid"){
					var newPaymentStatus = "Paid";
				}
				$.ajax({
                    url: 'Update.php',
                    method: 'POST',
					dataType: 'json',
                    data: {OrderID: row.OrderID,
						   CustomerID: row.CustomerID,
						   OrderDate: row.OrderDate,
						   PaymentStatus: newPaymentStatus,
						   DeliveryStatus: row.DeliveryStatus
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

            // Delivery Status button
			'click .Dstatus-button': function(e, value, row, index){
				if(row.DeliveryStatus == "Delivered"){
					alert("Already Delivered");
					return;
				}
				else if(row.DeliveryStatus == "Shipping"){
					var newDeliveryStatus = "Delivered";
				}
                else if(row.DeliveryStatus == "Pending"){
                    var newDeliveryStatus = "Shipping";
                }
				$.ajax({
                    url: 'Update.php',
                    method: 'POST',
					dataType: 'json',
                    data: {OrderID: row.OrderID,
						   CustomerID: row.CustomerID,
						   OrderDate: row.OrderDate,
						   PaymentStatus: row.PaymentStatus,
						   DeliveryStatus: newDeliveryStatus
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

        // Get all selected row's OrderID
		var $table = $('#table')
		function getSelections(){
    		return $.map($table.bootstrapTable('getSelections'), function(row){
      			return row.OrderID
    		})
  		}

        // Button above table
		function buttons(){
			return{

			// Create button
			btnCreate:{
				text: 'Create sales order',
				icon: 'bi bi-cart-plus-fill',
				event: function(){
					// Create button event
					$('#CreateModal').modal('show');
				},
				attributes:{
					title: 'Create new sales order',
					class: 'btn btn-primary btn-lg',
				}
			},

			// Delete Button
			btnDelete:{
				text: 'Delete sales order',
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
                                    field: 'OrderID',
                                    values: ids
                                	});
									$table.bootstrapTable('refresh');
                                	alert('Sales Order deleted successfully');
								}
								else{
									alert('Sales Order deleted Failed');
								}
                                
                            },
                            error: function(){
                                alert('An error occurred while deleting sales order');
                            }
                        });
					}
				},
				attributes:{
				title: 'Delete selected sales order',
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
				var OrderDate = $('#CreateForm #OrderDate').val();
				var PaymentStatus = $('#CreateForm #PaymentStatus:checked').val();
				var DeliveryStatus = $('#CreateForm #DeliveryStatus:checked').val();
				
				$.ajax({
                    url: 'Create.php',
                    method: 'POST',
					dataType: 'json',
                    data: {CustomerID: CustomerID,
						   OrderDate: OrderDate,
						   PaymentStatus: PaymentStatus,
						   DeliveryStatus: DeliveryStatus
					},
                    success: function(response){
						if(response.success){
							alert("Sales Order created successfully");
						}
						else{
							alert("Sales Order created failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while creating sales order');
                    }
                });
                $('#CreateModal').modal('hide');
            });

			// Update button
			$('#UpdateForm').submit(function(event){
				var OrderID = $('#UpdateForm #OrderID').text();
				var CustomerID = $('#UpdateForm #CustomerID').val();
				var OrderDate = $('#UpdateForm #OrderDate').val();
				var PaymentStatus = $('#UpdateForm #PaymentStatus:checked').val();
				var DeliveryStatus = $('#UpdateForm #DeliveryStatus:checked').val();
				$.ajax({
                    url: 'Update.php',
                    method: 'POST',
					dataType: 'json',
                    data: {OrderID: OrderID,
                           CustomerID: CustomerID,
						   OrderDate: OrderDate,
						   PaymentStatus: PaymentStatus,
						   DeliveryStatus: DeliveryStatus
					},
                    success: function(response){
						if(response.success){
							alert("Sales Order updated successfully");
						}
						else{
							alert("Sales Order updated failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while updating sales order');
                    }
                }); 
                $('#UpdateModal').modal('hide');
            });
        });
	</script>	
	</body>
</html>