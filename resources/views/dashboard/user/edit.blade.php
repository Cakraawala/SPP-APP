@extends('layout.main')
@section('title')
<title>Dashboard | Edit Admin {{ $user->nama }}</title>
@endsection
@section('content')
<div class="row">
<!-- Content Row -->
<div class="col-lg-12">
    <div class="container">
    <div class="card border-0 shadow-sm">
            <div class="card-header">
            <h4>Edit Admin </h4>
            </div>
            <div class="card-body">
                <form action="/dashboard/user/{{ $user->id }}/update" method="POST"  enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                            <div class="col-md-4">
                            <label for="nama" class="form-label">Nama <span style="font-style: italic;">(required)</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}" placeholder="ex Jamal Kurniawan">
                            </div>
                            <div class="col-md-4">
                                <label for="username" class="form-label">Username <span style="font-style: italic;">(required)</span></label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required placeholder="ex Jamal30">
                            </div>
                            <div class="col-md-4">
                                <label for="level" class="form-label">Level</label>
                                <select class="form-select" name="level" id="level">
                                    <option value="petugas">Petugas</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <input type="hidden" name="is_admin" value="1">
                        </div>
                        <div class="row">

                            <div class="mt-3 col-md-4">
                                <label for="password" class="form-label">New Password <span style="font-style: italic;"></span></label>
                                <input type="password" class="form-control" id="password" name="password" >
                            </div>
                        </div>
                    <button class="btn btn-dark mt-4" type="submit"> SUBMIT </button>
                </form>
            </div>
        </div>
</div>
</div>
</div>
@endsection
