{{-- resources/views/articles/edit_status.blade.php --}}
@extends('layout')

@section('content')
    <div class="container">
        <h2>Edit Article Status</h2>

        <form action="{{ route('articles.updateStatus', $article->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="approved" {{ $article->status == 'approved' ? 'selected' : '' }}>Approve</option>
                    <option value="rejected" {{ $article->status == 'rejected' ? 'selected' : '' }}>Reject</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status_message">Status Message</label>
                <textarea class="form-control" id="status_message" name="status_message" rows="3">{{ $article->status_message }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
    </div>
@endsection
