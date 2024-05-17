<!doctype html>
<html lang="en">

	<head>
		<title>Table</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">
		<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
  	</head>

<table
  id="table"
  data-toggle="table"
  data-height="460"
  data-show-columns="true"
  data-show-refresh="true"
  data-show-columns-toggle-all="true"
  data-show-pagination-switch="true"
  data-show-toggle="true"
  data-show-fullscreen="true"
  data-buttons="buttons"
  data-url="json/data1.json">
  <thead>
    <tr>
      <th data-field="id">ID</th>
      <th data-field="name">Item Name</th>
      <th data-field="price">Item Price</th>
    </tr>
  </thead>
</table>

<script>
  function buttons () {
    return {
      btnUsersAdd: {
        text: 'Highlight Users',
        icon: 'fa-users',
        event: function () {
          alert('Do some stuff to e.g. search all users which has logged in the last week')
        },
        attributes: {
          title: 'Search all users which has logged in the last week'
        }
      },
      btnAdd: {
        text: 'Add new row',
        icon: 'fa-plus',
        event: function () {
          alert('Do some stuff to e.g. add a new row')
        },
        attributes: {
          title: 'Add a new row to the table'
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