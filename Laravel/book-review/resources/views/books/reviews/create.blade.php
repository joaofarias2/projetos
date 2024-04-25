@extends('layout.app')

@section('content')
    <h1 class="mb-10 text-2x1">Add Review For {{ $book->title }}</h1>

    <form method="POST" action="{{ route('books.reviews.store', $book)}}">
        @csrf
        <label for="review">Review</label>
        <textarea name="review" id="review" class="input mb-4" required></textarea>

        <label for="rating">Rating</label>
        <select name="rating" id="rating">
            <option value="">Select a rating</option>
            @for ($i = 1; $i < 5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>                
            @endfor
        </select>

        <button type="submit" class="btn">Add Review</button>
    </form>
@endsection