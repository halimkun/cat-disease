<?php 
require_once("./fungsi.php");
$fungsi = new Fungsi();

$database = $fungsi->database();
$data = $database->query("SELECT * FROM v_penyakit");

$datatable = $data->fetch_object();

$no = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="./../asset/styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../asset/styles/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">

    <script src="./../asset/styles/js/jquery-3.6.0.min.js"></script>
    <script src="./../asset/styles/js/bootstrap.bundle.js"></script>
    <script src="./../asset/styles/js/jquery.dataTables.min.js"></script>
    <script src="./../asset/styles/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>

    <style>
        td.details-control {
            background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
            cursor: pointer;
        }

        tr.shown td.details-control {
            background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;
        }

        div#datasetTable_wrapper {
            padding: 10px;
        }

        div#datasetTable_length {
            margin-bottom: 10px;
        }

        div#datasetTable_filter {
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="bg-light">

    <script type="">
        function format ( d ) {
            return '<table class="table">'+
                '<caption>Gejala Yang Dialami Kucing <strong>( '+d[0]+' )</strong></caption>'+
                '<tr>'+
                    '<th>Anorexia:</th>'+
                    '<td class="bg-light">'+d[1]+'</td>'+
                    '<th class="px-4"></th>'+

                    '<th>Radang Telinga:</th>'+
                    '<td class="bg-light">'+d[9]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<th>Muntah:</th>'+
                    '<td class="bg-light">'+d[2]+'</td>'+
                    '<th class="px-4"></th>'+

                    '<th>Batuk:</th>'+
                    '<td class="bg-light">'+d[10]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<th>Lemah:</th>'+
                    '<td class="bg-light">'+d[3]+'</td>'+
                    '<th class="px-4"></th>'+

                    '<th>Hidung Meler:</th>'+
                    '<td class="bg-light">'+d[11]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<th>Kurang Respon:</th>'+
                    '<td class="bg-light">'+d[4]+'</td>'+
                    '<th class="px-4"></th>'+

                    '<th>Gatal:</th>'+
                    '<td class="bg-light">'+d[12]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<th>Dehidrasi:</th>'+
                    '<td class="bg-light">'+d[5]+'</td>'+
                    '<th class="px-4"></th>'+

                    '<th>Telinga Keropeng:</th>'+
                    '<td class="bg-light">'+d[13]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<th>Demam:</th>'+
                    '<td class="bg-light">'+d[6]+'</td>'+
                    '<th class="px-4"></th>'+

                    '<th>Pilek:</th>'+
                    '<td class="bg-light">'+d[14]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<th>Diare:</th>'+
                    '<td class="bg-light">'+d[7]+'</td>'+
                    '<th class="px-4"></th>'+

                    '<th>Bersin-bersin:</th>'+
                    '<td class="bg-light">'+d[15]+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<th>Hipersevalis:</th>'+
                    '<td class="bg-light">'+d[8]+'</td>'+
                    '<th class="px-4"></th>'+

                    '<th>Mata Berair:</th>'+
                    '<td class="bg-light">'+d[16]+'</td>'+
                '</tr>'+
            '</table>';
        }

        $(document).ready(function() {
            var table = $('#datasetTable').DataTable({
                ajax: './data.php',
                columns: [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    {
                        "searchable": false,
                        "orderable": false,
                    },
                    {data: "0"},
                    {data: "17"}
                ],
                "language": {
                    "paginate": {
                        "next": ">",
                        "previous": "<"
                    }
                },
            });

            table.on( 'order.dt search.dt', function () {
                table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();

            $('#datasetTable tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );
                
                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            } );

        });
    </script>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="./index.php"><strong>KNN</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./predict.php">Prediksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./dataset.php">Dataset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./akurasi.php">Hitung Akurasi</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table nowrap mt-3 mb-3" style="width:100%" id="datasetTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th style="width: 10px;">No.</th>
                                <th>Index Kucing</th>
                                <th>Penyakit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th></th>
                            <th style="width: 10px;">No.</th>
                            <th>Index Kucing</th>
                            <th>Penyakit</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>