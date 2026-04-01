@extends('layout')

@section('title', __('messages.title'))

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>{{ __('messages.title') }}</h1>
    <div>
        <a href="/lang/fr" class="btn btn-sm btn-primary">FR</a>
        <a href="/lang/ar" class="btn btn-sm btn-success">AR</a>
        <a href="{{ route('formations.create') }}" class="btn btn-sm btn-warning">{{ __('messages.add') }}</a>
    </div>
</div>

<div class="row">
    @foreach($formations as $f)
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                @if(app()->getLocale() == 'ar')
                    <h5 class="card-title">{{ $f->titre_ar }}</h5>
                    <p class="card-text">{{ $f->description_ar }}</p>
                @else
                    <h5 class="card-title">{{ $f->titre_fr }}</h5>
                    <p class="card-text">{{ $f->description_fr }}</p>
                @endif
                <a href="{{ route('formations.edit', $f->id) }}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('formations.destroy', $f->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection