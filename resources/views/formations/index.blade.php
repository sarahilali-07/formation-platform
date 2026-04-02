@extends('layout')

@section('title', __('messages.title'))

@section('content')
<div class="animate__animated animate__fadeIn">

    <!-- Header + locale + add button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-white fw-bold shadow-text">{{ __('formation.title') }}</h1>
        <div>
            <a href="/lang/fr" class="btn btn-sm btn-light locale-btn">FR</a>
            <a href="/lang/ar" class="btn btn-sm btn-light locale-btn">AR</a>
            @if(Auth::user()->hasAnyRole([\App\Models\User::ROLE_SUPER_ADMIN, \App\Models\User::ROLE_ADMIN, \App\Models\User::ROLE_TEACHER]))
                <a href="{{ route('formations.create') }}" class="btn btn-sm btn-warning fw-bold shadow-sm">Add</a>
            @endif
        </div>
    </div>

    <!-- Formations cards -->
    <div class="row">
        @foreach($formations as $f)
        <div class="col-md-6 mb-4">
            <div class="card h-100 animate__animated animate__zoomIn" style="position: relative;">
                <div class="card-body">

                    <!-- Card title -->
                    @if(app()->getLocale() == 'ar')
                        <h5 class="card-title fw-bold text-purple mb-3">{{ $f->titre_ar }}</h5>
                        <p class="card-text">{{ $f->description_ar }}</p>
                    @else
                        <h5 class="card-title fw-bold text-purple mb-3">{{ $f->titre_fr }}</h5>
                        <p class="card-text">{{ $f->description_fr }}</p>
                    @endif

                    <!-- Buttons side by side top right -->
                    @if(Auth::user()->hasAnyRole([\App\Models\User::ROLE_SUPER_ADMIN, \App\Models\User::ROLE_ADMIN]))
                        <div class="position-absolute top-2 end-2 d-flex gap-2">
                            <a href="{{ route('formations.edit', $f->id) }}" 
                               class="btn btn-sm btn-info shadow-sm animate__animated animate__fadeInRight" 
                               style="font-weight:600; border-radius:8px;">
                                Edit
                            </a>

                            <form action="{{ route('formations.destroy', $f->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="btn btn-sm btn-danger shadow-sm animate__animated animate__fadeInRight" 
                                    style="font-weight:600; border-radius:8px;">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
/* Card title colored + shadow */
.text-purple {
    color: #6a0dad;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}

/* Card hover effect */
.card:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
}

/* Buttons hover */
.btn-info:hover {
    background-color: #3a9ad9;
    transform: scale(1.1);
}
.btn-danger:hover {
    background-color: #d9534f;
    transform: scale(1.1);
}

/* Locale buttons */
.locale-btn {
    font-weight: 600;
    transition: 0.3s;
}
.locale-btn:hover {
    transform: scale(1.1);
    background-color: #fff;
    color: #764ba2;
}

/* Shadow for header */
.shadow-text {
    text-shadow: 2px 2px 6px rgba(0,0,0,0.4);
}
</style>
@endsection