<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Order Detail Management</title>
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
	<!-- Order Detail Table -->
	<div class = "container mb-4 mt-4" style = "max-width:1400px">
		<h2><b>Order Detail Table</b></h2>
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
			data-search-on-enter-key="true"
			data-click-to-select="true"
			data-on-click-cell="onClickCell"
			data-query-params="queryParams"
			>
		<thead>
			<tr>
			<th data-field="state" data-checkbox="true"></th>
			<th data-field="OrderID" data-sortable="true">ID</th>
			<th data-field="ProductID" data-sortable="true">ProductID</th>
			<th data-field="Quantity">Quantity</th>
			<th data-field="Price">Price</th>
			<th data-field="action" data-formatter="actionFormatter" data-events="actionEvents" algin = "center">Action</th>
			</tr>
		</thead>
		</table>
	</div>

	<!-- Create Order Detail Modal -->
	<div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">Create Order Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<form id="CreateForm">
                        <div class="mb-3">
                            <label for="OrderID" class="form-label">OrderID: </label>
                            <select class="form-control" name="OrderID" id="OrderID" required>
								<?php include '../get_order.php'; ?>
            				</select>
                        </div>
						<div class="mb-3">
                            <label for="ProductID" class="form-label">ProductID: </label>
                            <select class="form-control" name="ProductID" id="ProductID" required>
								<?php include '../get_product.php'; ?>
            				</select>
                        </div>
						<div class="mb-3">
                            <label for="Quantity" class="form-label">Quantity: </label>
                            <input type="number" class="form-control" name="Quantity" id="Quantity" min="1" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<!-- Update Order Detail form -->
	<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UpdateModalLabel">Order Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<form id="UpdateForm">
						<div class="mb-3">
							<label for="OrderID" class="form-label">OrderID: </label>
							<b><span id="OrderID"></span></b>
                        </div>
						<div class="mb-3">
                            <label for="ProductID" class="form-label">ProductID: </label>
                            <select class="form-control" name="ProductID" id="ProductID" required>
								<?php include '../get_product.php'; ?>
            				</select>
                        </div>
						<div class="mb-3">
                            <label for="Quantity" class="form-label">Quantity: </label>
                            <input type="number" class="form-control" name="Quantity" id="Quantity" required>
                        </div>
						<input type="hidden" class="form-control" name="OldProductID" id="OldProductID" required>
						<input type="hidden" class="form-control" name="OldQuantity" id="OldQuantity" required>
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
			return[
				'<div style = "display: flex; align-items: center; justify-content: center;">',
					'<button class="btn btn-primary update-button" style="margin-right: 5px;">',
					'<i class="bi bi-gear"></i>', 
					'</button>',

					'<button class="btn btn-danger  delete-button" style="margin-right: 5px;">',
					'<i class="bi bi-trash"></i>', 
					'</button>',
				'</div>'
			].join('');
		}

		// Action button event
		window.actionEvents = {
			// Update button Not yet
        	'click .update-button': function(e, value, row, index){
				$('#UpdateModal').on('show.bs.modal', function(e){
					$('#UpdateForm #OrderID').text(row.OrderID);
					$('#UpdateForm select[name="ProductID"]').val(row.ProductID);
					$('#UpdateForm input[name="Quantity"]').val(row.Quantity);
					$('#UpdateForm input[name="OldProductID"]').val(row.ProductID);
					$('#UpdateForm input[name="OldQuantity"]').val(row.Quantity);
				});
				$('#UpdateModal').modal('show');
        	},

			// Delete button
			'click .delete-button': function(e, value, row, index){
				var ids = {OrderID: row.OrderID, ProductID: row.ProductID,
					       Quantity: row.Quantity, Price: row.Price};
				$.ajax({
                    url: 'Delete.php',
                    method: 'POST',
					dataType: 'json',
                    data: {ids: [ids]},
                    success: function(response){
						if(response.success){
							$table.bootstrapTable('refresh');
							alert('Order Detail deleted successfully');
						}
						else{
							alert('Order Detail deleted Failed');
						}
                                
                    },
                	error: function(){
                        alert('An error occurred while deleting order detail');
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

		// Get all selected row's RequestID
		var $table = $('#table')
		function getSelections(){
    		return $.map($table.bootstrapTable('getSelections'), function(row){
      			return {OrderID: row.OrderID, ProductID: row.ProductID,
					    Quantity: row.Quantity, Price: row.Price};
    		})
  		}

		  function buttons(){
			return{

			// Create button
			btnCreate:{
				text: 'Create order detail',
				icon: 'bi bi-cart-plus-fill',
				event: function(){
					// Create button event
					$('#CreateModal').modal('show');
				},
				attributes:{
					title: 'Create new order detail',
					class: 'btn btn-primary btn-lg',
				}
			},

			// Delete Button
			btnDelete:{
				text: 'Delete order detail',
				icon: 'bi bi-cart-dash-fill',
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
									$table.bootstrapTable('refresh');
                                	alert('Order Detail deleted successfully');
								}
								else{
									alert('Order Detail deleted Failed');
								}
                                
                            },
                            error: function(){
                                alert('An error occurred while deleting order detail');
                            }
                        });
					}
				},
				attributes:{
				title: 'Delete selected order detail',
				class: 'btn btn-primary btn-lg'
				}
			}
			}
		}

		// Modal button
		$(document).ready(function(){	
			// Create button
            $('#CreateForm').submit(function(event){
                var OrderID = $('#CreateForm #OrderID').val();
				var ProductID = $('#CreateForm #ProductID').val();
				var Quantity = $('#CreateForm #Quantity').val();

				$.ajax({
                    url: 'Create.php',
                    method: 'POST',
					dataType: 'json',
                    data: {OrderID: OrderID,
						   ProductID: ProductID,
						   Quantity: Quantity
					},
                    success: function(response){
						if(response.success){
							alert("Order Detail created successfully");
						}
						else{
							alert("Order Detail created failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while creating order detail');
                    }
                });
                $('#CreateModal').modal('hide');
            });

			// Update button
			$('#UpdateForm').submit(function(event){
				var OrderID = $('#UpdateForm #OrderID').text();
				var NewProductID = $('#UpdateForm #ProductID').val();
				var NewQuantity = $('#UpdateForm #Quantity').val();
				var OldProductID = $('#UpdateForm #OldProductID').val();
				var OldQuantity = $('#UpdateForm #OldQuantity').val();

				$.ajax({
                    url: 'Update.php',
                    method: 'POST',
					dataType: 'json',
                    data: {OrderID: OrderID,
						   NewProductID: NewProductID,
						   NewQuantity: NewQuantity,
						   OldProductID: OldProductID,
						   OldQuantity: OldQuantity
					},
                    success: function(response){
						if(response.success){
							alert("Order Detail updated successfully");
						}
						else{
							alert("Order Detail updated failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while updating order detail');
                    }
                }); 
                $('#UpdateModal').modal('hide');
            });
        });
	</script>	
	</body>
</html>