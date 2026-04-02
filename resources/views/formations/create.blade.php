@extends('layout')

@section('title', __('messages.add'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 animate__animated animate__fadeInUp">
        <div class="card p-4">
            <h2 class="mb-4 text-center">{{ __('messages.add') }}</h2>
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
                <button type="submit" class="btn btn-primary w-100">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection