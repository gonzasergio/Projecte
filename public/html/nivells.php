<html lang="en">
<head>
    <title>DataTable</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">

    <script src="Stuk-jszip-3109282/dist/jszip.js"></script>
    <script src="Stuk-jszip-3109282/vendor/FileSaver.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

</head>
<body>
<script>
    $(document).ready( function () {
        let table = $('#example').DataTable( {
            ajax: {
                url: 'api/get/nivell/all',
                dataSrc: '',
                type:"GET"
            },
            columns:  [
                {title: "ID", data:'id'},
                {title: "Nombre", data:'nom'}
            ],
            select: true,
            responsive: true
        });

        $("#b1").click(function() {
            $("#idc").val('');
            $("#nomc").val('');
            $("#modalInserta").modal();
        });
    });
</script>

<div class="container-fluid mt-3">
    <button id="b1" class="btn btn-success">INSERTAR</button>
    <button id="b2" class="btn btn-primary disabled">EDITAR</button>
    <button id="b3" class="btn btn-danger disabled">ELIMINAR</button>
    <hr>
    <div class="row">
        <div class="col">
            <table id="example" class="table table-striped table-bordered w-100"/>
        </div>
    </div>
</div>

<div id="modalInserta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- header modal -->

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inserta Nivell</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- body modal -->

            <div class="modal-body">
                <form role="form" name="formEdita" action="" method="get">
                    <div class="row">
                        <div class="col">
                            <label>Nom:</label>
                            <input id="nomc" type="text"class="form-control" placeholder="Nom Nivell" name="nom">
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="bSubmit" class="btn btn-primary">Insertar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>