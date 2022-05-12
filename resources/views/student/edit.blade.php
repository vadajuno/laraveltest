@extends('layouts.app')

@section('content')
<div class="container">
<h2>Create Student</h2> 

@if ($errors->any()) 
<div class="alert alert-danger"> Something wrong 
    <ul> 
        @foreach ($errors->all() as $error) 
        <li>{{ $error }}</li> 
        @endforeach
    </ul>
</div> 
@endif

<form action="{{ route('student.update', $student->id) }}" method="POST"> 
    @csrf 
    @method('PUT')
    <div class="form-group">
        <label>Nama</label>
            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$student->nama}}" >

        </div>

    <div class="form-group"> 
        <label>Jurusan</label> 
        <select class="form-control @error('major_id') is-invalid @enderror" name="major_id"> 
            <option value="">Pilih Jurusan</option> 
            @foreach($majors as $major) 
            <option value="{{ $major->id }}" {{ $student->major_id == $major->id ? 'selected' : '' }}> {{ $major->major_name }} </option>
            @endforeach 
        </select> 
    </div>

    <div class="form-group">
        <label>IPK</label>
        <input id="ipk" type="ipk" class="form-control @error('ipk') is-invalid @enderror" name="ipk" value="{{$student->ipk}}">
        </div>
    
    <div class="form-group text-right">
    <button class="btn btn-primary" type="submit">Save</button> 
    <button class="btn btn-warning" type="reset">Reset</button> 
    </div>
    
</form>
</div>
@endsection