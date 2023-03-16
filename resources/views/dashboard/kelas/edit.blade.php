@extends('layout.main')
@section('title')
<title>Dashboard | Edit Kelas {{ $kelas->kelas }} {{ $kelas->jurusan }} {{ $kelas->no }}</title>
@endsection
@section('content')
<div class="row">
<!-- Content Row -->
<div class="col-lg-12">
    <div class="container">
    <div class="card border-0 shadow-sm">
            <div class="card-header">
            <h4>Edit Kelas #{{$kelas->id}} Tahun ajaran {{ $kelas->updated_at->isoformat('Y') }}</h4>
            </div>
            <div class="card-body">
                <form action="/dashboard/data/kelas/{{ $kelas->id }}/update" method="POST"  enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                            <div class="col-md-4">
                            <label for="kelas" class="form-label">Kelas <span style="font-style: italic;">(required)</span></label>
                            <select name="kelas" class="form-select" id="kelas">
                                @if ($kelas->kelas == 10)
                                <option value="{{ $kelas->kelas }}" selected>{{ $kelas->kelas }}</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                @elseif ($kelas->kelas == 11)
                                <option value="10">10</option>
                                <option value="{{ $kelas->kelas }}" selected>{{ $kelas->kelas }}</option>
                                <option value="12">12</option>
                                @else
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="{{ $kelas->kelas }}" selected>{{ $kelas->kelas }}</option>
                                @endif
                            </select>
                            </div>
                            <div class="col-md-4">
                                <label for="jurusan" class="form-label">Jurusan <span style="font-style: italic;">(required)</span></label>
                                <select name="jurusan" class="form-select" id="jurusan">
                                    @if ($kelas->jurusan == "RPL")
                                    <option value="{{ $kelas->jurusan }}" selected>{{ $kelas->jurusan }}</option>
                                    <option value="MM">MM</option>
                                    <option value="TKJ">TKJ</option>
                                    @elseif ($kelas->jurusan == "MM")
                                    <option value="RPL">RPL</option>
                                    <option value="{{ $kelas->jurusan }}" selected>{{ $kelas->jurusan }}</option>
                                    <option value="TKJ">TKJ</option>
                                    @else
                                    <option value="RPL">RPL</option>
                                    <option value="MM">MM</option>
                                    <option value="{{ $kelas->jurusan }}" selected>{{ $kelas->jurusan }}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="no" class="form-label">No <span style="font-style: italic;"></span></label>
                                <input type="number" class="form-control" id="no" name="no" value="{{ $kelas->no }}">
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
