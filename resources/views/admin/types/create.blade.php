@extends('layouts.admin')

@section('content')
    <div class="container p-5" style="height: calc(100vh - 100px)">

        @include('partials.validate')

        <div class="d-flex align-items-center justify-content-between">
            <h1>Add new Type</h1>
            <a href="{{ route('admin.types.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>

        {{-- @include('partials.validator_error') --}}
        <form action="{{ route('admin.types.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="Lavarel-project" value="{{ old('name') }}" />
                <small id="nameHelper" class="form-text text-muted">Type a name for the current project</small>

                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>





            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="6">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>



            <button class="btn btn-primary" type="submit">
                Create
            </button>

        </form>
    </div>
@endsection
