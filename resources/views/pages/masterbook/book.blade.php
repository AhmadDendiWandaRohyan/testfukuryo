@extends('layouts.app')

@section('content')
<h1 class="fw-bold">Master Category</h1>
<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            
            <a href="{{ route('pages.createcategory') }}" class="btn btn-primary mb-3">+ Add Data</a>
            
        </div>

        <table id="categoryTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>DESCRIPTION</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $i => $category)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ strtoupper($category->name) }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        @if($category->status == 'Enable')
                            <span class="badge bg-success">Enable</span>
                        @else
                            <span class="badge bg-danger">Disable</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pages.showcategory', $category->id) }}" class="btn btn-sm btn-info text-white">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('pages.editcategory', $category->id) }}" class="btn btn-sm btn-warning text-white">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('pages.destroycategory', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">
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
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#categoryTable').DataTable();
    });
</script>
@endpush

