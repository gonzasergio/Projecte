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

    <link rel="stylesheet" type="text/css" href="/Projecte/public/css/global.css">
    <link rel="stylesheet" href="/Projecte/public/css/bootstrap/bootstrap.min.css">

</head>
<body>
<script>
    $(document).ready( function () {
        $('#example').DataTable( {
            ajax: {
                url: 'api/get/modalitat/all',
                dataSrc: '',
                type:"POST"
            },
            columns:  [
                {title: "ID", data:'id'},
                {title: "NOM", data:'nom'}
            ],
            select: true,
            responsive: true
        });

        let t = $('#example').DataTable();

        $('#openModify').click( function () {
            let data = t.row('.selected').data();

            console.log(data);

            $("#idMod").val(data['id']);
            $("#nomMod").val(data['nom']);
        } );

        $('#modifyRow').on( 'click', function () {

            $.ajax({
                url: 'api/update/modalitat',
                type: 'POST',
                dataType: "json",
                data: {
                    id: $("#idMod").val(),
                    colName: 'nom',
                    newValue: $("#nomMod").val()
                }
            });

            t.ajax.reload();
        });

        $('#addRow').on( 'click', function () {

            $.ajax({
                url: 'api/insert/modalitat',
                type: 'POST',
                dataType: "json",
                data: {
                    nom: $("#nom").val(),
                }
            });

            t.ajax.reload();
        } );

        $('#remove').click( function () {
            let data = t.row('.selected').data();

            $.ajax({
                url: 'api/delete/modalitat',
                type: 'POST',
                dataType: "json",
                data: {
                    id: data['id']
                }
            })

            t.ajax.reload();
        });
    });

</script>

<div class="container-fluid mt-3">
    <h1>Modalitat</h1>

    <div class="row">
        <div class="col">
            <table id="example" class="table table-striped table-bordered w-100"/>
        </div>
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Add
    </button>
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modify" id="openModify">
        Modify
    </button>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Add</h2>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" placeholder="Nom">
                            </div>
                        </div>
                        <button type="button" class="btn" id="addRow" data-dismiss="modal">add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modify" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Add</h2>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="idMod">ID</label>
                                <input type="text" class="form-control" id="idMod" placeholder="ID" disabled>
                                <label for="nomMod">Inici</label>
                                <input type="text" class="form-control" id="nomMod" placeholder="Nom">
                            </div>
                        </div>
                        <button type="button" class="btn" id="modifyRow" data-dismiss="modal">add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn" id="remove">remove</button>

</div>


<script src="/Projecte/public/js/crypto-js/aes.js"></script>
<script src="/Projecte/public/js/popper/popper.min.js"></script>
<script src="/Projecte/public/js/bootstrap/bootstrap.min.js"></script>

</body>
</html>