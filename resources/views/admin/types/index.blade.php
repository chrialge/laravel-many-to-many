@extends('layouts.admin')

@section('content')
    <div class="container" style="height: calc(100vh - 125px)">
        <div class="d-flex align-items-center justify-content-between py-5">
            <h3>Types</h3>
            <a href="{{ route('admin.types.create') }}" class="btn btn-primary">
                Add Type
            </a>
        </div>

        @include('partials.session')
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($types as $type)
                        <tr class="">
                            <td scope="row">{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>



                            <td>
                                <div class="d-flex justify-content-between alig-items-center gap-2">
                                    <a href="{{ route('admin.types.show', $type) }}" class="btn btn-dark">
                                        <i class="fa-solid fa-eye fs-sm fs-6"></i>
                                    </a>
                                    <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-dark">
                                        <i class="fa-solid fa-pencil fs-6"></i>
                                    </a>



                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $type->id }}">
                                        <i class="fa-solid fa-trash fs-6"></i>
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitleId-{{ $type->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId-{{ $type->id }}">
                                                        Attention!!⚡⚡ Deleting: {{ $type->name }}
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
                                                    <form action="{{ route('admin.types.destroy', $type) }}"
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

        {{ $types->links('pagination::bootstrap-5') }}

    </div>
@endsection
