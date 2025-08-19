@extends('layouts.app')

@section('content')
<form action="{{ route('pages.updatecategory', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- input name, description, status -->
    <div class="mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ $category->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="Enable" {{ $category->status == 'Enable' ? 'selected' : '' }}>Enable</option>
            <option value="Disable" {{ $category->status == 'Disable' ? 'selected' : '' }}>Disable</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    
    <a href="{{ route('pages.category') }}" class="btn btn-secondary">Back</a>
</form>

@endsection
