@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h1>ADMIN/PROJECTS/EDIT.BLADE</h1>
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Project Edit Page for') }} {{ Auth::user()->name }}.
    </h2>
    <h3 class="fs-5 text-secondary">
        {{ __('Editing Project') }} ID: {{ $project->id }}
    </h3>

    <div class="row justify-content-center my-3">
        <div class="col">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PUT')

                <div class="mb-3">

                    <label for="title" class="form-label"><strong>Title</strong></label>

                    <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle" value="{{ old('title') ? old('title') : $project->title }}">

                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label for="description" class="form-label"><strong>Description</strong></label>

                    <input type="text" class="form-control" name="description" id="description" aria-describedby="helpTitle" value="{{ old('description') ? old('description') : $project->description }}">

                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label for="description" class="form-label"><strong>Project Link</strong></label>

                    <input type="text" class="form-control" name="link_project" id="link_project" aria-describedby="helpTitle" value="{{ old('link_project') ? old('link_project') : $project->link_project }}">

                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label for="description" class="form-label"><strong>Github Link</strong></label>

                    <input type="text" class="form-control" name="link_github" id="link_github" aria-describedby="helpTitle" value="{{ old('link_github') ? old('link_github') : $project->link_github }}">

                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>



                <div class="mb-3">

                    <div class="mb-3">


                        <td><img class=" img-fluid" style="height: 100px" src="{{ $project->thumb }}" alt="{{ $project->title }}"></td>


                    </div>

                    <label for="thumb" class="form-label"><strong>Choose a Thumbnail image file</strong></label>

                    <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Cerca..." aria-describedby="fileHelpThumb">

                    @error('thumb')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <button type="submit" class="btn btn-success my-3">SAVE</button>
                <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">CANCEL</a>

            </form>
        </div>
    </div>

</div>
@endsection