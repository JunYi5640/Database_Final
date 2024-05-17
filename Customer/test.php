<!doctype html>
<html lang="en">

	<head>
		<title>Table</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.css">
  	</head>


<table
  id="table"
  data-toggle="table"
  data-height="460"
  data-search="true"
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>
	</body>

</html>