@extends('layout')

@section('title', __('messages.add'))

@section('content')
<div class="card p-4">

    

    <form method="POST" action="{{ route('formations.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Titre FR</label>
            <input type="text" name="titre_fr" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Titre AR</label>
            <input type="text" name="titre_ar" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Description FR</label>
            <textarea name="description_fr" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Description AR</label>
            <textarea name="description_ar" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>

</div>
@endsection