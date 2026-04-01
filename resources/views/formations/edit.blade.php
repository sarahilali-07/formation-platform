@extends('layout')

@section('title', 'Edit Formation')

@section('content')
<div class="card p-4">


    
    <form method="POST" action="{{ route('formations.update', $formation->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Titre FR</label>
            <input type="text" name="titre_fr" class="form-control" value="{{ $formation->titre_fr }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Titre AR</label>
            <input type="text" name="titre_ar" class="form-control" value="{{ $formation->titre_ar }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description FR</label>
            <textarea name="description_fr" class="form-control">{{ $formation->description_fr }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Description AR</label>
            <textarea name="description_ar" class="form-control">{{ $formation->description_ar }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection