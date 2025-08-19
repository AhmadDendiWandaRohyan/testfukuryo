@extends('layouts.app')

@section('content')
<h1 class="fw-bold">Edit Author</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('pages.updateauthor', $author->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $author->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" value="{{ $author->dob }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" required>{{ $author->address }}</textarea>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('pages.author') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
