@extends('admin/layout/main')
@section('title', 'Pemenang')
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
                    <div>Pemenang
                        <div class="page-title-subheading">Data Pemenang.
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <button type="button" class="btn-shadow btn btn-info" data-toggle="modal"
                            data-target="#tambahpemenang"><i class="fa fa-plus"></i> Pemenang</button>
                    </div>
                </div>
            </div>
        </div>

        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{session('status')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <!-- Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Data Pemenang</div>
                    <div class="table-responsive">
                        <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
                            <table id="example1" class="table table-striped table-bordered data">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Acara</th>
                                        <th>Pemenang</th>
                                        <th>Hadiah</th>
                                        <th width="13%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pemenang as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->acara->acara}}</td>
                                        <td>{{$data->peserta->nama}}</td>
                                        <td>{{$data->hadiah->nama_hadiah}}</td>
                                        <td width="13%">
                                            <a onclick="return confirm('Data akan dihapus!')"
                                                href="{{url('/pemenang/del/'.$data->id)}}"><button type="button"
                                                    class="btn btn-danger btn-sm">Hapus</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

<!-- Modal dialog tambah data sekolah -->
<div class="modal fade" id="tambahpemenang" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pemenang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/pemenang')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="position-relative form-group">
                        <label class="">Nama Acara</label>
                        <select name="id_acara" class="form-control">
                        @foreach($acara as $a)
                            <option value="{{$a->id}}">{{$a->acara}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Peserta</label>
                        <select name="id_peserta" class="form-control">
                        @foreach($peserta as $p)
                            <option value="{{$p->id}}">{{$p->nama}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Hadiah</label>
                        <select name="id_hadiah" class="form-control">
                        @foreach($hadiah as $h)
                            <option value="{{$h->id}}">{{$h->nama_hadiah}}</option>
                        @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End modal dialog -->
