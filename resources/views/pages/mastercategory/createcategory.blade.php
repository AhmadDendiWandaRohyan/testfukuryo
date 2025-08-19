@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="fw-bold">Add Category</h4>
        <form action="{{ route('pages.storecategory') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Enable">Enable</option>
                    <option value="Disable">Disable</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('pages.category') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
