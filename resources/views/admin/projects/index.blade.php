@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h1>ADMIN/PROJECTS/INDEX.BLADE</h1>
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Project List for') }} {{ Auth::user()->name }}
    </h2>

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('status') }}
    </div>
    @endif

    <a href="{{route('admin.projects.create')}}" class="btn btn-primary my-3">Add a New Project</a>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Preview</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>

                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr class="">
                    <td class="align-middle" scope="row">{{ $project->id }}</td>


                    <td class="text-center align-middle"><img class="img-fluid" style="height: 100px" src="{{ $project->thumb }}" alt="{{ $project->title }}"></td>



                    <td class="align-middle">{{ $project->title }}</td>
                    <td class="align-middle">{{ $project->description }}</td>

                    <td class="align-middle">
                        {{-- I PROGETTI SONO COLLEGATI TRAMITE LO SLUG --}}
                        <a href="{{ route('admin.projects.show', $project->slug) }}">Details</a>
                        <a href="{{ route('admin.projects.edit', $project->slug) }}">Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $project->id }}">
                            Delete
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop-{{ $project->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">DELETE</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </td>
                </tr>
                @empty
                <td class="align-middle text-center" colspan="6">No Projects to show</td>
                @endforelse

            </tbody>
        </table>
    </div>

</div>
@endsection