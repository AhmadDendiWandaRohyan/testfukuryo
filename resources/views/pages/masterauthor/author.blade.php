@extends('layouts.app')

@section('content')
<h1 class="fw-bold">Master Category</h1>
<div class="card">
    <div class="card-body">

    <div class="d-flex justify-content-between align-items-center mb-3">
            
      <a href="{{ route('pages.createauthor') }}" class="btn btn-primary mb-3">+ Add Author</a>
            
    </div>
    <table id="authorTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Age</th>
                <th>Address</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $key => $author)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($author->dob)->format('d F Y') }}</td>
                    <td>{{ $author->age }} Years Old</td>
                    <td>{{ $author->address }}</td>
                    <td>
                        <a href="{{ route('pages.editauthor', $author->id) }}" class="btn btn-sm btn-warning text-white">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('pages.destroyauthor', $author->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#authorTable').DataTable();
});
</script>
@endpush
