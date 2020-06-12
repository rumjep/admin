@extends('admin/layout/main')
@section('title', 'Edit Acara')
@section('container')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-date icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Edit
                        <div class="page-title-subheading">Edit Acara.
                        </div>
                    </div>
                </div>  
            </div>
        </div>

        <!-- Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Form Edit Acara</div>
                    <div class="table-responsive">
                        <div class="container" style="margin-top: 20px; margin-bottom: 20px;">

                            <form action="{{url('/acara/'.$data->id)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('patch')
                                <div class="position-relative form-group">
                                    <label class="">Nama Acara</label>
                                    <input name="acara" type="text" value="{{$data->acara}}" class="form-control" required="required">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" required="required">{{$data->deskripsi}}</textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Tanggal</label>
                                    <input type="date" name="tanggal" value="{{date('Y-m-d',strtotime($data->tanggal))}}" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Tempat</label>
                                    <input name="tempat" value="{{$data->tempat}}" type="text" class="form-control" required="required">

                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Waktu</label>
                                    <input name="waktu" value="{{$data->waktu}}" type="text" class="form-control" required="required">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Jumlah Peserta</label>
                                    <input name="jml_peserta" value="{{$data->jml_peserta}}" type="number" class="form-control" required="required">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Keterangan</label>
                                    <input name="keterangan" value="{{$data->keterangan}}" type="text" class="form-control" required="required">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Foto</label>
                                    <input name="foto" type="file" class="form-control">
                                </div>
                                <button type="submit" class="mt-2 btn btn-primary">Edit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <div class="app-wrapper-footer">
        <div class="app-footer">
            <div class="app-footer__inner">
                <div class="app-footer-left">
                </div>
                <div class="app-footer-right">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                &copy 2019 E-data PTK
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End footer -->

</div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
@endsection()