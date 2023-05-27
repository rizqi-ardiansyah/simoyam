@extends('admin.mainIndex')
@section('content')

<!-- Main Content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pemeriksaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Periksa</li>
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
                        <h3 class="card-title">List Pemeriksaan</h3>

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

                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Pemeriksaan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form action="{{ route('periksa.create') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                             <input type="hidden" class="form-control" id="idPerusahaan" name="idPerusahaan" value="<?php echo auth()->user()->idPerusahaan;?>" required>

                                            <div class="form-group">
                                                <label for="tanggal">Tanggal</label>
                                                <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Masukkan tanggal" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="position-option">No. Kandang</label>
                                                <select class="form-control" id="jenis" name="jenis" required>
                                                     @foreach ($kandang as $kandangs)
                                                    <option value="{{ $kandangs->id }}">{{ $kandangs->noKandang }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="mati">Mati</label>
                                                <input type="number" class="form-control" id="mati" placeholder="Masukan jumlah ayam yang mati" name="mati" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="culling">Culling</label>
                                                <input type="number" class="form-control" id="culling" placeholder="Masukan jumlah ayam yang culling" name="culling" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="bobot">Bobot</label>
                                                <input type="number" class="form-control" id="bobot" placeholder="Masukan rata-rata bobot ayam" name="bobot" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="bobot">Pakan</label>
                                                <input type="number" class="form-control" id="bobot" placeholder="Masukan rata-rata bobot ayam" name="pakan" required>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary" id="button">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
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


                    <div class="card-body table-responsive2 ">
                        @role('admin')
                        <a href="#" class="btn btn-success mb-2" data-toggle="modal" data-target="#modal-default" style="font-size: 14px;">
                            <i class="fas fa-plus mr-1"></i> Tambah Pemeriksaan
                        </a>
                        @endrole

                        <!-- <div id="search_list"></div> -->

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kandang</th>
                                    <th>Mati</th>
                                    <th>Culling</th>
                                    <th>Bobot</th>
                                    <th>Pakan</th>
                                    @role('admin')
                                    <th>Aksi</th>
                                    @endrole
                                </tr>
                            </thead>
                            
                            <tbody id="result">
                            <?php $i = 0; ?>
                                @foreach ($data as $key => $periksa)
                               
                                <tr>
                                    <?php
                                    if($periksa->idPerusahaan == auth()->user()->idPerusahaan){
                                    // echo auth()->user()->idPerusahaan;
                                    $i++;
                                    ?>

                                    <!-- <td> {{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td> -->
                                    <td>{{ $i }}</td>
                                    <!-- <td>{{$data->firstItem() + $key  }}</td> -->
                                    <td>{{$periksa->tglPeriksa}}</td>
                                    <td>{{$periksa->noKandang}}</td>
                                    <td>{{$periksa->mati}}</td>
                                    <td>{{$periksa->culling}}</td>
                                    <td>{{$periksa->bobot}}</td>
                                    <td>{{$periksa->pakan}}</td>
                                    @role('admin')
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                                <i class="fas fa-bars"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-lg" role="menu">
                                                <!-- <a href="#" class="dropdown-item " data-toggle="modal" data-target="#modal-detail" title="Detail Pengungsi">
                                                    <i class="fas fa-eye mr-1"></i> Detail
                                                </a>
                                                <div class="dropdown-divider"></div> -->
                                                <a href="#" class="dropdown-item " title="Edit Data" data-toggle="modal" data-target="#modal-edit-{{$periksa->idUser}}">
                                                    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                    </svg>
                                                    Edit
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item " title="Hapus Pengungsi" onclick="deleteConfirmation({{$periksa->idPeriksa}})">
                                                    <i class="fas fa-trash mr-1"></i> Hapus
                                                </a>
                                            </div>

                                        </div>
                                    </td>
                                    @endrole
                                    <?php
                                    }
                                    ?>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>


                        <br />
                        {{ $data->links() }}
                        <br />

                    </div>

                    <!-- /.card-body -->
                </div>
                @foreach ($data as $detail)
                <div class="modal fade" id="modal-edit-{{ $detail->idUser }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data Ayam</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- form start -->
                                <form action="{{ url('/kandang/edit/'.$detail->idUser) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                             <input type="hidden" class="form-control" id="idPerusahaan" name="idPerusahaan" value="<?php echo auth()->user()->idPerusahaan;?>" required>

                                            <div class="form-group">
                                                <label for="tanggal">Tanggal</label>
                                                <input type="date" class="form-control" id="tgl" name="tgl" value="{{$detail->tglMasuk}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="asal">Nomor Kandang</label>
                                                <input type="number" class="form-control" id="noKandang" value="{{$detail->noKandang}}" name="noKandang" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="asal">Asal</label>
                                                <input type="text" class="form-control" id="asal" value="{{$detail->asalPeternak}}" name="asal" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="position-option">Jenis</label>
                                                
                                                    <!-- @foreach ($role as $peran)
                                                    <option value="{{ $peran->id }}">{{ $peran->name }}
                                                    </option>
                                                    @endforeach
                                                </select> -->
                                            </div>

                                            <div class="form-group">
                                                <label for="asal">Jumlah</label>
                                                <input type="text" class="form-control" id="jml" value="{{$detail->jmlAyam}}" name="jml" required>
                                            </div>

                                            <!-- <div class="form-group">
                                                <label for="position-option">Peran</label>
                                                <select class="form-control" id="peran" name="peran" required>
                                                    @foreach ($role as $peran)
                                                    <option value="{{ $peran->id }}">{{ $peran->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div> -->

                                        </div>
                                        <!-- /.card-body -->

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
                        url: "{{url('kandang/delete')}}/" + id,
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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</section>

@endsection()