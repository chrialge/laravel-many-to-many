@extends('layouts.admin')

@section('content')
    <div class="container" style="height: calc(100vh - 125px)">
        <div class="d-flex align-items-center justify-content-between py-5">
            <h3>Types</h3>

        </div>

        @include('partials.validate')
        @include('partials.session')




        <div class="row row-cols-2">
            <div class="col">

                <form action="{{ route('admin.technologies.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="nameHelper" placeholder="Lavarel-project"
                            value="{{ old('name') }}" />
                        <small id="nameHelper" class="form-text text-muted">Type a name for the current project</small>

                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit">
                        Create
                    </button>

                </form>
            </div>
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Total Project</th>

                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($technologies as $technology)
                                <tr class="">
                                    <td scope="row">{{ $technology->id }}</td>
                                    <td>
                                        <form action="{{ route('admin.technologies.update', $technology) }}" method="post">
                                            @csrf

                                            @method('PUT')
                                            <div class="mb-3 d-flex gap-2">

                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    id="name" aria-describedby="nameHelper"
                                                    placeholder="Lavarel-project" value="{{ old($technology->name) }}" />

                                                <button class="btn btn-primary " type="submit">
                                                    Edit
                                                </button>




                                            </div>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </form>
                                    </td>
                                    <td>
                                        {{ $technology->slug }}
                                    </td>
                                    <td class="text-center">

                                        {{ $technology->projects->count() }}

                                    </td>


                                    <td>
                                        <div class="d-flex justify-content-between alig-items-center gap-2">
                                            <a href="{{ route('admin.technologies.show', $technology) }}"
                                                class="btn btn-dark">
                                                <i class="fa-solid fa-eye fs-sm fs-6"></i>
                                            </a>




                                            <!-- Modal trigger button -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalId-{{ $technology->id }}">
                                                <i class="fa-solid fa-trash fs-6"></i>
                                            </button>

                                            <!-- Modal Body -->
                                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                            <div class="modal fade" id="modalId-{{ $technology->id }}" tabindex="-1"
                                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                                aria-labelledby="modalTitleId-{{ $technology->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="modalTitleId-{{ $technology->id }}">
                                                                Attention!!⚡⚡ Deleting: {{ $technology->name }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            You are about to dlete this record. This operation is
                                                            DESCTRUCTIVE!💣💣💣
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <form
                                                                action="{{ route('admin.technologies.destroy', $technology) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">
                                                                    Confirm
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>









                                        </div>

                                    </td>

                                </tr>
                            @empty
                                <tr class="">
                                    <h1>
                                        I don't have Type!!! 😭
                                    </h1>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        {{ $technologies->links('pagination::bootstrap-5') }}

    </div>
@endsection
