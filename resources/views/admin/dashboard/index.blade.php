@extends('admin.mainIndex')
@section('content')
<!-- Main Content -->

<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $ttlAyam }}</h3>
                        <p>Total Ayam</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-feather"></i>
                    </div>
                    <a href="{{url('/kandang')}}" class="small-box-footer">Tampil
                        Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 style="color: #ffff;">{{ $ttlCulling }}</h3>
                        <p style="color: #ffff;">Culling + Cacat</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-briefcase-medical"></i>
                    </div>
                    <a href="{{url('/periksa')}}" class="small-box-footer"
                        style="color: #ffff !important;">Tampil Detail <i class="fas fa-arrow-circle-right"
                            style="color: #ffff;"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $ttlMati }}</h3>
                        <p>Mati</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-skull"></i> 
                    </div>
                    <a href="{{url('/periksa')}}" class="small-box-footer">Tampil Detail <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3 style="color: #ffff;">{{ $ttlPanen }}</h3>
                        <p style="color: #ffff;">Panen</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-warehouse"></i> 
                    </div>
                    <a href="{{url('/periksa')}}" class="small-box-footer" style="color: #ffff !important;">Tampil Detail <i
                            class="fas fa-arrow-circle-right" style="color: #ffff !important;"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 style="color: #ffff;">{{ $ttlPakan }} kg</h3>
                        <p style="color: #ffff;">Kumulatif Pakan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <a href="{{url('/periksa')}}" class="small-box-footer"
                        style="color: #ffff !important;">Tampil Detail <i class="fas fa-arrow-circle-right"
                            style="color: #ffff;"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 style="color: #ffff;">{{ $getPeriode }}</h3>
                        <p style="color: #ffff;">Periode Vaksinasi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-syringe"></i>
                    </div>
                    <a href="{{url('/vaksinasi')}}" class="small-box-footer"
                        style="color: #ffff !important;">Tampil Detail <i class="fas fa-arrow-circle-right"
                            style="color: #ffff;"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


            </div>
        </div>
    </div>
</section>



</div>



@endsection()