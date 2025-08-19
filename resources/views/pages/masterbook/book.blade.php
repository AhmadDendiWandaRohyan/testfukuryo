@extends('layouts.app')

@section('content')
<h1 class="fw-bold">Master Category</h1>
<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            
        <!-- Button Tambah -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBookModal">+ Add Book</button>
            
        </div>

        <table id="categoryTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Book Name</th>
                    <th>ISBN</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $i => $book)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $book->book_name }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->category->name ?? '-' }}</td>
                    <td>{{ $book->author->name ?? '-' }}</td>
                    <td>
                        @if($book   ->status == 'Enable')
                            <span class="badge bg-success">Enable</span>
                        @else
                            <span class="badge bg-danger">Disable</span>
                        @endif
                    </td>
                    <td>
                        <!-- Edit -->
                        <button class="btn btn-sm btn-warning text-white" data-bs-toggle="modal" data-bs-target="#editBookModal{{ $book->id }}"><i class="bi bi-pencil"></i></button>

                        <!-- Delete -->
                        <form action="{{ route('pages.deletebook', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="editBookModal{{ $book->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('pages.updatebook', $book->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Book</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="book_name" class="form-control mb-2" value="{{ $book->book_name }}" required>
                                    <input type="text" name="isbn" class="form-control mb-2" value="{{ $book->isbn }}" required>

                                    <select name="category_id" class="form-control mb-2">
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $book->category_id == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <select name="author_id" class="form-control mb-2">
                                        @foreach($authors as $auth)
                                            <option value="{{ $auth->id }}" {{ $book->author_id == $auth->id ? 'selected' : '' }}>
                                                {{ $auth->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <select name="status" class="form-control mb-2">
                                        <option value="Enable" {{ $book->status == 'Enable' ? 'selected' : '' }}>Enable</option>
                                        <option value="Disable" {{ $book->status == 'Disable' ? 'selected' : '' }}>Disable</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="addBookModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('pages.storebook') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="book_name" class="form-control mb-2" placeholder="Book Name" required>
                    <input type="text" name="isbn" class="form-control mb-2" placeholder="ISBN" required>

                    <select name="category_id" class="form-control mb-2" required>
                        <option value="">-- Pilih Category --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>

                    <select name="author_id" class="form-control mb-2" required>
                        <option value="">-- Pilih Author --</option>
                        @foreach($authors as $auth)
                            <option value="{{ $auth->id }}">{{ $auth->name }}</option>
                        @endforeach
                    </select>

                    <select name="status" class="form-control mb-2" required>
                        <option value="Enable">Enable</option>
                        <option value="Disable">Disable</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
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

