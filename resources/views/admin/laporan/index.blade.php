@extends('admin.mainIndex')
@section('content')

<script>
function printPageArea(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}

function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>
<!-- Main Content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Laporan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h3 class="card-title">List Laporan</h3>
                        <div class="card-tools">
                            <form id="search">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                    <input type="text" name="search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>

                    <br>
                    <div class="container">
                        <!-- <div class="row"> -->
                            <div class="container-fluid">
                            <form method="GET" action="/filter">
                                     <div class="form-group row">
                                    <label for="date" class="col-form-label col-sm-2">Pilih tanggal awal</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required/>
                                    </div>
                                    <label for="date" class="col-form-label col-sm-2">Pilih tanggal akhir</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control input-sm" id="toDate" name="toDate" required/>
                                    </div>
                                    <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                       
                                    </div>
                                </div>
</form>
                            <!-- </div> -->
                        </div>
                    </div>

                    <!-- List data -->
                    <div class="container mt-2">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body table-responsive" >
                    <div id="areaPrint">
                    <p style="font-weight: bold; font-size: 12pt;" class="card-title">Laporan Berkala</p><br>

                        <table class="table table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Kandang</th>
                                    <th>Mati</th>
                                    <th>Culling</th>
                                    <th>Bobot</th>
                                    <th>Status vaksin</th>
                                    <!-- @role('admin')
                                    <th>Aksi</th>
                                    @endrole -->
                                </tr>
                            </thead>
                            <tbody id="result">

                                @foreach ($data as $key => $laporan)

                                <tr>
                                    <td>{{$data->firstItem() + $key  }}</td>
                                    <td>{{$laporan->tglPeriksa}}</td>
                                    <td>{{$laporan->noKandang}}</td>
                                    <td>{{$laporan->mati}}</td>
                                    <td>{{$laporan->culling}}</td>
                                    <td>{{$laporan->bobot}}</td>
                                    <td>Ke-{{$laporan->stVaksinasi}}</td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                        <div class="container">
                            <div class="row">
                            <div class="col-md-10">
                        <br />
                        {{ $data->links() }}
                        </div>


                        <div class="col-md-2" style="float:right;">
                        <br>

                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                               Print
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-lg" role="menu">
                                                <!-- {{url('/listPosko')}}/${bencana.idBencana} -->
                                                <a href="javascript:void(0);" onclick="printPageArea('areaPrint')" class="dropdown-item btnprn" title="Export PDF">
                                                    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                    </svg>
                                                    Export PDF
                                                </button>
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:void(0);" onclick="exportTableToExcel('areaPrint', 'laporan-pokphand')" class="dropdown-item " title="Export Excel">
                                                    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                    </svg>
                                                    Export Excel
                                                </a>
                                            </div>

                                        </div>

                        </div>

                           
                       

                                    </div>
                            </div>
                        </div>




                    </div>

                    <!-- /.card-body -->
                </div>
                @foreach ($data as $detail)
                <div class="modal fade"
                 id="modal-edit-{{ $detail->idAdmin }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Admin</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- form start -->
                                <form action="{{ url('/member/edit/'.$detail->idAdmin) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="namaDepan">Nama depan</label>
                                            <input type="text" class="form-control" id="namaDepan" placeholder="Masukan nama depan" name="namaDepan" value="{{ $detail->firstname }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="namaBelakang">Nama belakang</label>
                                            <input type="text" class="form-control" id="namaBelakang" placeholder="Masukan nama belakang" name="namaBelakang" value="{{ $detail->lastname }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Masukan email" name="email" value="{{ $detail->email }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="position-option">Peran</label>
                                            <select class="form-control" id="peran" name="peran" required>
                                                <option selected value="{{ $detail->idRole }}" hidden>
                                                    {{ $detail->namaPeran }}
                                                </option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Perbarui</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                @endforeach
            </div>

        </div>
    </div>

    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal.fire({
                title: "Hapus?",
                icon: 'question',
                text: "Apakah Anda yakin?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Iya, hapus!",
                cancelButtonText: "Batal!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{url('member/delete')}}/" + id,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            if (results.success === true) {
                                swal.fire("Berhasil!", results.message, "success");
                                // refresh page after 2 seconds
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                swal.fire("Gagal!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })
        }
    </script>
   



</section>

@endsection()
