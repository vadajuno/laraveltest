@extends('layouts.app')

@section('content')
<div class="container">
<h2>Create Student</h2> 
<form action="{{ route('student.store') }}" method="POST"> 
    @csrf 
    <div class="form-group">
        <label>Nama</label>
            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"  required autocomplete="nama" autofocus>

        </div>

    <div class="form-group"> 
        <label>Jurusan</label> 
        <select class="form-control" name="major_id"> 
            <option value="">Pilih Jurusan</option> 
            @foreach($majors as $major) 
            <option value="{{ $major->id }}"> 
                {{ $major->major_name }} 
            </option>
            @endforeach 
        </select> 
    </div>

    <div class="form-group">
        <label>IPK</label>
        <input id="ipk" type="ipk" class="form-control @error('ipk') is-invalid @enderror" name="ipk" required autocomplete="ipk">
        </div>
    
    <div class="form-group text-right">
    <button class="btn btn-primary" type="submit">Save</button> 
    <button class="btn btn-warning" type="reset">Reset</button> 
    </div>
    
</form>
</div>
@endsection