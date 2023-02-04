@extends('guru.index')
@section('main')

<div class="row">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Ganti Password</h5>
            <form>
                <div class="mb-3">
                    <label class="form-label" for="password_lama">Password Lama</label>
                    <input type="password" class="form-control" id="password_lama">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password_baru">Password Baru</label>
                    <input type="password" class="form-control" id="password_baru">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password_baru2">Verifikasi Password Baru</label>
                    <input type="password" class="form-control" id="password_baru2">
                </div>
                <button type="submit" class="btn btn-primary" id="simpan">Save changes</button>
            </form>

        </div>
    </div>
</div>

<script src="js/app.js"></script>

@endsection