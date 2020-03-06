<html lang="en">
<head>
    <title>Pais</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">

</head>
<body>
<script>
    $(document).ready( function () {
        $('#example').DataTable( {
            ajax: {
                url: '/api/get/country/all',
                dataSrc: '',
                type:"POST"
            },
            columns:  [
                {title: "ID", data:'id'},
                {title: "NOM", data:'name'}
            ],
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ],
            select: true,
            responsive: true
        });

        let t = $('#example').DataTable();

        $('#openModify').click( function () {
            let data = t.row('.selected').data();

            console.log(data);

            $("#idMod").val(data['id']);
            $("#nomMod").val(data['name']);
        } );

        $('#modifyRow').on( 'click', function () {


            $.ajax({
                url: '/api/update/country',
                type: 'POST',
                dataType: "json",
                data: {
                    id: $("#idMod").val(),
                    colName: 'nom',
                    newValue: $("#nomMod").val()
                }
            }).always(function () {
                t.ajax.reload();
            });
        });

        $('#addRow').on( 'click', function () {

            $.ajax({
                url: '/api/country',
                type: 'POST',
                dataType: "json",
                data: {
                    name: $("#nom").val(),
                }
            }).always(function () {
                t.ajax.reload();
            });
        } );

        $('#remove').click( function () {
            let data = t.row('.selected').data();

            $.ajax({
                url: '/api/delete/country',
                type: 'POST',
                dataType: "json",
                data: {
                    id: data['id']
                }
            }).always(function () {
                t.ajax.reload();
            });
        });
    });

</script>

<?php include '../templates/menuTopBack.html'?>
<div class="container-fluid">
    <div class="row h-100">
        <?php include '../templates/menuBack.php'?>
        <div class="col mx-3" style="margin-top: 102px">
            <h1>Pais</h1>

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                Insertar
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modify" id="openModify">
                Modificar
            </button>
            <button type="button" class="btn btn-danger" id="remove">Eliminar</button>

            <hr>

            <div>
                <table id="example" class="table table-striped table-bordered w-100"/>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModalInsert">Inserta Pais</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Nom">
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel·lar</button>
                        <button type="button" class="btn btn-primary" id="addRow" data-dismiss="modal">Insertar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modify" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModalModify">Modifica Pais</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="idMod">ID</label>
                            <input type="text" class="form-control" id="idMod" placeholder="ID" disabled>
                            <label for="nomMod">Nom</label>
                            <input type="text" class="form-control" id="nomMod" placeholder="Nom">
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel·lar</button>
                        <button type="button" class="btn btn-primary" id="modifyRow" data-dismiss="modal">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/js/crypto-js/aes.js"></script>
<script src="/js/popper/popper.min.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>

</body>
</html>