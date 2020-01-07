<html lang="en">
<head>
    <title>DataTable</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

</head>
<body>
<script>
    $(document).ready( function () {
        $('#example').DataTable( {
            ajax: {
                url: 'api/get/modalitat/all',
                dataSrc: '',
                type:"GET"
            },
            columns:  [
                {title: "ID", data:'id'},
                {title: "NOM", data:'nom'}
            ],
            select: true,
            responsive: true
        });
    });
</script>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <table id="example" class="table table-striped table-bordered w-100"/>
        </div>
    </div>
</div>

</body>
</html>