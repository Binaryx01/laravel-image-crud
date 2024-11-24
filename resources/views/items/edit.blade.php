@extends('layouts.app')

@section('content')
<div>
    <form action="{{ route('items.update', $item) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $item->name }}" required>
        <label for="image">Image:</label>
        <input type="file" name="image">
        <button type="submit">Update</button>
    </form>
</div>
@endsection
