@extends('layouts.app')

@section('content')
<div>
    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="image">Image:</label>
        <input type="file" name="image" required>
        <button type="submit">Save</button>
    </form>
</div>
@endsection
