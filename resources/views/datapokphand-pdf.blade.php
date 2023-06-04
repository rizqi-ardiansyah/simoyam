<!DOCTYPE html>
<html>

<head>
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
    </style>
</head>

<body>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- ./col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header laporan-title">
                            EXPORT PDF
                           

                        </div>
                        <!-- /.card-header -->

                    </div>
                </div>
            </div>
        </div>

    </section>

    <h4>
        <center>Data Pengungsi<center>
    </h4>
    <table id="customers" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>StatKel</th>
                <th>KepKel</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>JK</th>
                <th>Umur</th>
                <th>Kond</th>
                <!-- <th>Status</th>
                <th>Aksi</th> -->
            </tr>
            <?php
// $no = 1;
?>
        </thead>
      
    </table>

</body>

</html>