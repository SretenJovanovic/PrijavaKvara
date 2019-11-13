<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Lista kvarova</title>
<meta name="description" content="Bootstrap.">
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<style>
.container{
  background: rgba(100,100,100,0.6);
  box-shadow: 0 0 20px 2px rgba(10,0,0,0.5);
}
</style>

</head>

<body>


<div class="container">
<div class="row header" style="text-align:center;color:black">
<h3>LISTA PRIJAVA</h3>
</div>
<table id="myTable" class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Prijavio</th>
            <th>ID racunara</th>
            <th>Prioritet kvara</th>
            <th>Opis kvara</th>
            <th>Datum prijave</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'includes/tabelakvara.inc.php';
          ?>

        </tbody>
      </table>
	  </div>
</body>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>
