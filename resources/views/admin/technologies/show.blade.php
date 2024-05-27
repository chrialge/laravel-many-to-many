@extends('layouts.admin')

@section('content')
    <div class="container" style="height: calc(100vh - 125px)">
        <div class="d-flex align-items-center justify-content-end gap-2">
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            <a class="btn btn-dark" href="{{ route('admin.technologies.edit', $technology) }}"> <i
                    class="fas fa-pencil-alt fa-sm fa-fw"></i>
            </a>

        </div>
        <div class=" py-5">

            <div class="col">

                <h3 class=" d-inline">Type Name: </h3>
                <span style="font-size: 30px;">{{ $technology->name }}</span>
            </div>
            <p class="py-2">
                <strong>Description:</strong>
                @if (isset($technology->description))
                    {{ $technology->description }}
                @else
                    N/A
                @endif

            </p>

        </div>




    </div>
@endsection
