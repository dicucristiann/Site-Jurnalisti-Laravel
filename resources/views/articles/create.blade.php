@extends('layout')

@section('title', 'Create Article')

@section('content')
    <div class="container mt-5">
        <h2>Create Article</h2>
        <form action="{{ route('articles.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category">
                    <option value="artistic">Artistic</option>
                    <option value="technic">Technic</option>
                    <option value="science">Science</option>
                    <option value="moda">Moda</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
