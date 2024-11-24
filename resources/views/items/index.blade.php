@extends('layouts.app')

@section('content')
<div>
    <a href="{{ route('items.create') }}">Create New Item</a>
    <ul>
        @foreach($items as $item)
            <li>
                <!-- Display the image with defined dimensions -->
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="200" height="auto">
                <p>{{ $item->name }}</p>
                <a href="{{ route('items.edit', $item) }}">Edit</a>
                <form action="{{ route('items.destroy', $item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
