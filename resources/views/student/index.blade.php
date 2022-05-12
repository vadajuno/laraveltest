@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Student List</h2>
            <p><a class="btn btn-primary" href="{{ route('student.create') }}"><span class='fas fa-plus'></span> Make Student</a></p>

            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div> 
            @endif

            <table  class="table table-bordered"> 
                <thead class="thead-dark"> 
                    <tr> 
                        <th scope="col">No</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Major</th>
                        <th scope="col">GPA</th>
                        <th style="text-align: center;" colspan="2">Action</th> 
                    </tr> 
                </thead> 
                <tbody>

                    @foreach($student as $students) 
                    <tr> 
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $students->nama}}</td>
                        <td>{{ $students->major->major_name}}</td>
                        <td>{{ $students->ipk }}</td>
                        <td><a class="btn btn-warning" href="{{ route('student.edit', $students->id) }}"><span class='fas fa-edit'></span> </a> </td> 
                        <td> 
                            <form onsubmit="return confirm('Apakah anda yakin?');" action="{{ route('student.destroy', $students->id) }}" method="POST"> 
                            @csrf 
                            @method('DELETE') 
                            <button class="btn btn-danger" type="submit"><span class='fas fa-trash'></span></button> 
                            </form> 
                        </td>  
                    </tr> 
                    @endforeach 
                </tbody> 
            </table>
            
        </div>
    </div>
</div>
@endsection
