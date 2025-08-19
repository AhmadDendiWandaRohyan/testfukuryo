@extends('layouts.app')

@section('content')
<h1 class="fw-bold">Add Author</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('pages.storeauthor') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('pages.author') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
