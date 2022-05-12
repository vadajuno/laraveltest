@extends('layouts.app')

     <!-- DataTables -->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css"/>
    
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

            <table id="" class="data-table table table-bordered "> 
                <thead class="thead-dark"> 
                    <tr> 
                        <th>No</th>
                        <th>Student Name</th>
                        <th>Major</th>
                        <th>GPA</th>
                    </tr> 
                </thead> 
                <tbody>
                    {{-- tabel biasa --}}
                    {{-- @foreach($student as $students) 
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
                    @endforeach  --}}
                </tbody> 
            </table>
            
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.js"></script>
<script type="text/javascript">
   $(document).ready( function () {
    $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('student.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama', name: 'nama' },
            { data: 'major', name: 'majors.id' },
            { data: 'ipk', name: 'ipk' },
        ]
    });
});
</script>
@endsection