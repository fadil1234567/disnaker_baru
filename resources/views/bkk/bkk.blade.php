@extends('bkk.layouts.app')

@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user"></i></div>
                        Account Settings - BKK
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link" href="{{ route('bkk.profile') }}">Profile</a>
        <a class="nav-link active ml-0" href="{{ route('bkk.bkk') }}">BKK</a>
        <a class="nav-link" href="{{ route('bkk.security') }}">Security</a>
    </nav>
    <hr class="mt-0 mb-4" />
    @if ( Session::has('message') )
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="{{ asset('bkk/'.$bkk->bkk_photo) }}" alt />
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#uploadImage">Upload new image</button>

                    <!-- Modal -->
                    <div class="modal fade" id="uploadImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Upload Image</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('bkk.bkk', 'photo') }}" method="post" enctype="multipart/form-data" id="upload">
                                        @csrf
                                        <!-- Form Group (email address)-->
                                        <div class="form-group">
                                            <input class="form-control" id="photo" name="photo" type="file" />
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="button" onclick="event.preventDefault();document.getElementById('upload').submit();">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form action="{{ route('bkk.bkk', 'edit') }}" method="POST" id="profileEdit">
                        @csrf
                        <!-- Form Row        -->
                        <div class="form-row">
                            <!-- Form Group (organization name)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="nama">Nama BKK</label>
                                <input class="form-control" id="nama" type="text" name="nama" value="{{ $bkk->bkk_nama }}" />
                            </div>
                            <!-- Form Group (organization name)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="telepon">Telepon</label>
                                <input class="form-control" id="telepon" type="text" name="telepon" value="{{ $bkk->bkk_telepon }}"/>
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="form-row">
                            <!-- Form Group (location)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="bkk">Kabupaten/Kota</label>
                                <input class="form-control" id="bkk" type="text" value="{{$bkk->bkk_daerah}}" disabled/>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="pencaker">Jumlah Pencari Kerja</label>
                                <input class="form-control" id="pencaker" type="text" value="{{ $bkk->pencaker }}" disabled/>
                            </div>
                        </div>
                        <!-- Form Group (current password)-->
                        <div class="form-group">
                            <label class="small mb-1" for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="3">{{ $bkk->bkk_alamat }}</textarea>
                        </div>
                    </form>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="button" onclick="event.preventDefault();document.getElementById('profileEdit').submit();">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
