<!-- TODO : Description modal -->

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Product Management</title>
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
	<!-- Product Table -->
	<div class = "container mb-4 mt-4" style = "max-width:1400px">
		<h2><b>Product Table</b></h2>
		<table
			id="table"
			data-toggle="table"
			data-url="Select.php"
			data-buttons="buttons"
			data-sort-name="ProductID" 
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
			<th data-field="ProductID" data-sortable="true">ID</th>
			<th data-field="Name" data-sortable="true">Name</th>
			<th data-field="CategoryID" data-sortable="true">Category ID</th>
			<th data-field="Price">Price</th>
			<th data-field="StockQuantity">Stock Quantity</th>
			<th data-field="Description" data-formatter="descriptionFormatter" data-events="actionEvents">Description</th>
			<th data-field="action" data-formatter="actionFormatter" data-events="actionEvents" algin = "center">Action</th>
			</tr>
		</thead>
		</table>
	</div>

	<!-- Create Product Modal -->
	<div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">Create New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<form id="CreateForm">
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name: </label>
                            <input type="text" class="form-control" name="Name" id="Name" required>
                        </div>
						<div class="mb-3">
                            <label for="CategoryID" class="form-label">CategoryID: </label>
                            <input type="text" class="form-control" name="CategoryID" id="CategoryID" required>
                        </div>
						<div class="mb-3">
                            <label for="Price" class="form-label">Price: </label>
                            <input type="text" class="form-control" name="Price" id="Price" required>
                        </div>
						<div class="mb-3">
                            <label for="StockQuantity" class="form-label">Stock Quantity: </label>
                            <input type="text" class="form-control" name="StockQuantity" id="StockQuantity" required>
                        </div>
						<div class="mb-3">
                            <label for="Description" class="form-label">Description: </label>
                            <input type="text" class="form-control" name="Description" id="Description" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<!-- Update Product form -->
	<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UpdateModalLabel">Product Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<form id="UpdateForm">
						<div class="mb-3">
							<label for="ProductID" class="form-label">Product ID: </label>
							<span id="ProductID"></span>
                        </div>
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name: </label>
                            <input type="text" class="form-control" name="Name" id="Name" required>
                        </div>
						<div class="mb-3">
                            <label for="CategoryID" class="form-label">CategoryID: </label>
                            <input type="text" class="form-control" name="CategoryID" id="CategoryID" required>
                        </div>
						<div class="mb-3">
                            <label for="Price" class="form-label">Price: </label>
                            <input type="text" class="form-control" name="Price" id="Price" required>
                        </div>
						<div class="mb-3">
                            <label for="StockQuantity" class="form-label">Stock Quantity: </label>
                            <input type="text" class="form-control" name="StockQuantity" id="StockQuantity" required>
                        </div>
						<div class="mb-3">
                            <label for="Description" class="form-label">Description: </label>
                            <input type="text" class="form-control" name="Description" id="Description" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<!-- Description Product form -->
	<div class="modal fade" id="DesciptionModal" tabindex="-1" aria-labelledby="DesciptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DesciptionModalLabel">Description of Product ID: <span id="ProductIDLabel"></span></h5> 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					<div class="mb-3">
                        <label for="DesciptionLabel" class="form-label"></label>
						<span id="DesciptionLabel"></span>
                    </div>
					<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

	<script>

		function descriptionFormatter(value, row, index){
			if(!value) return '';
				var maxLength = 10;
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
				e.stopPropagation();
				$('#UpdateModal').on('shown.bs.modal', function(e){
					$('#UpdateForm #ProductID').text(row.ProductID);
					$('#UpdateForm input[name="Name"]').val(row.Name);
					$('#UpdateForm input[name="CategoryID"]').val(row.CategoryID);
					$('#UpdateForm input[name="Price"]').val(row.Price);
					$('#UpdateForm input[name="StockQuantity"]').val(row.StockQuantity);
					$('#UpdateForm input[name="Description"]').val(row.Description);
				});
				$('#UpdateModal').modal('show');
        	},

			// Delete button
			'click .delete-button': function(e, value, row, index){
				e.stopPropagation();
				$.ajax({
                    url: 'Delete.php',
                    method: 'POST',
					dataType: 'json',
                    data: {ids: [row.ProductID]},
                    success: function(response){
						if(response.success){
							$table.bootstrapTable('remove', {
                            field: 'ProductID',
                            values: row.ProductID
                        	});
							$table.bootstrapTable('refresh')
							alert('Product deleted successfully');
						}
						else{
							alert('Product deleted Failed');
						}
                                
                    },
                	error: function(){
                        alert('An error occurred while deleting product');
                    }
            	});
        	},

			'click .readmore-button': function(e, value, row, index){
				e.stopPropagation();
				$('#DesciptionModal').on('shown.bs.modal', function(e){
					$('#ProductIDLabel').text(row.ProductID)
					$('#DesciptionLabel').text(value);
				});
				$('#DesciptionModal').modal('show');
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

		// Get all selected row's ProductID
		var $table = $('#table')
		function getSelections(){
    		return $.map($table.bootstrapTable('getSelections'), function(row){
      			return row.ProductID
    		})
  		}
		
		// Button above table
		function buttons(){
			return{

			// Create button
			btnCreate:{
				text: 'Create product',
				icon: 'bi bi-cart-plus-fill',
				event: function(){
					// Create button event
					$('#CreateModal').modal('show');
				},
				attributes:{
					title: 'Create new product',
					class: 'btn btn-primary btn-lg',
				}
			},

			// Delete Button
			btnDelete:{
				text: 'Delete product',
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
                                    field: 'ProductID',
                                    values: ids
                                	});
									$table.bootstrapTable('refresh')
                                	alert('Product deleted successfully');
								}
								else{
									alert('Product deleted Failed');
								}
                                
                            },
                            error: function(){
                                alert('An error occurred while deleting product');
                            }
                        });
					}
				},
				attributes:{
				title: 'Delete selected product',
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
				var CategoryID = $('#CreateForm #CategoryID').val();
				var Price = $('#CreateForm #Price').val();
				var StockQuantity = $('#CreateForm #StockQuantity').val();
				var Description = $('#CreateForm #Description').val();

				$.ajax({
                    url: 'Create.php',
                    method: 'POST',
					dataType: 'json',
                    data: {Name: Name,
						   CategoryID: CategoryID,
						   Price: Price,
						   StockQuantity: StockQuantity,
						   Description: Description,
					},
                    success: function(response){
						if(response.success){
							alert("Product created successfully");
						}
						else{
							alert("Product created failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while creating product');
                    }
                });
                $('#CreateModal').modal('hide');
            });

			// Update button
			$('#UpdateForm').submit(function(event){
				var ProductID = $('#UpdateForm #ProductID').text();
                var Name = $('#UpdateForm #Name').val();
				var CategoryID = $('#UpdateForm #CategoryID').val();
				var Price = $('#UpdateForm #Price').val();
				var StockQuantity = $('#UpdateForm #StockQuantity').val();
				var Description = $('#UpdateForm #Description').val();

				$.ajax({
                    url: 'Update.php',
                    method: 'POST',
					dataType: 'json',
                    data: {ProductID: ProductID,
						   Name: Name,
						   CategoryID: CategoryID,
						   Price: Price,
						   StockQuantity: StockQuantity,
						   Description: Description,
					},
                    success: function(response){
						console.log(response.success);
						if(response.success){
							alert("Product updated successfully");
						}
						else{
							alert("Product updated failed");
						}
                    },
                    error: function(){
                        alert('An error occurred while updating product');
                    }
                }); 
                $('#UpdateModal').modal('hide');
            });
        });
	</script>	
	</body>
</html>