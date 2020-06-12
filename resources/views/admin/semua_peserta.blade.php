@extends('admin/layout/main')
@section('title', 'Semua Peserta')
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
                    <div>Peserta
                        <div class="page-title-subheading">Data Seluruh Peserta yg Belum diverifikasi.
                        </div>
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
                    <div class="card-header">Data Semua Peserta</div>
                    <div class="table-responsive">
                        <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
                            <table id="example1" class="table table-striped table-bordered data">
                                <thead>
                                    <tr>            
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>J. Kel</th>
                                        <th>Tgl Lahir</th>
                                        <th>E-mail</th>
                                        <th>No Hp</th>
                                        <th>Acara yg diikuti</th>
                                        <th width="13%">Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($peserta as $data)
                                    <tr>                
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->j_kel}}</td>
                                        <td>{{$data->tgl_lahir}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->no_hp}}</td>
                                        <td>{{$data->acara->acara}}</td>
                                        <td width="13%">
                                            @if($data->status == 0)
                                                <a href="{{url('/peserta/ver/'.$data->id)}}"><button type="button" class="btn btn-danger btn-sm">Belum Terverif</button></a>
                                            @else
                                                <a href="{{url('/peserta/unver/'.$data->id)}}"><button type="button" class="btn btn-primary btn-sm">Clear</button></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a onclick="return confirm('Data akan dihapus!')" href="{{url('/peserta/del/'.$data->id)}}"><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
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