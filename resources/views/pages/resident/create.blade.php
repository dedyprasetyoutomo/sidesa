@extends('layouts.app')

@section('content')
    
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Penduduk</h1>
                        
</div>
<div class="row">
    <div class="col">
        <form action="" method="POST">
            <div class="card">
                <div class="card-body">
                    <div class="form-grup mb-3">
                        <label for="nik">Nik</label>
                        <input type="number" inputmode="numeric" name="nik" id="nik" class="form-control">
                    </div>
                    <div class="form-grup mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-grup mb-3">
                        <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male">Laki-laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                    </div>
                    <div class="form-grup mb-3">
                        <label for="birth_date">Tanggal Lahir</label>
                        <input type="date" name="birth_date" id="birth_date" class="form-control">
                    </div>
                    <div class="form-grup mb-3">
                        <label for="birth_place">Tempat Lahir</label>
                        <input type="text" name="birth_place" id="birth_place" class="form-control">
                    </div>
                     <div class="form-grup mb-3">
                        <label for="address">Alamat</label>
                        <textarea name="address" id="address" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                     <div class="form-grup mb-3">
                        <label for="religion">Agama</label>
                        <input type="text" name="religion" id="religion" class="form-control">
                    </div>
                    <div class="form-grup mb-3">
                        <label for="marital_status">Status Perkawinan</label>
                            <select name="marital_status" id="marital_status" class="form-control">
                                <option value="male">Laki-laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection