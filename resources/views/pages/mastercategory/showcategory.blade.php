@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="fw-bold">Category Detail</h4>
        <p><strong>Name:</strong> {{ $category->name }}</p>
        <p><strong>Description:</strong> {{ $category->description }}</p>
        <p><strong>Status:</strong> {{ $category->status }}</p>
        <a href="{{ route('pages.category') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
