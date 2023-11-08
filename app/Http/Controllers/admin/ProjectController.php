<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isNull;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {


        $data = $request->all();
        $newProject = new Project();

        if ($request->has('thumb')) {

            $file_path = Storage::put('projectImages', $request->thumb);


            $newProject->thumb = $file_path;
        }
        $newProject->title = $data['title'];
        $newProject->slug = Str::slug($request->title, '-');


        $newProject->save();

        return to_route('admin.projects.index')->with('status', 'Well Done, New Entry Added Succeffully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->all();


        if ($request->has('thumb') && $project->thumb) {


            Storage::delete($project->thumb);


            $newCover = $request->thumb;
            $path = Storage::put('projectsImages', $newCover);
            $data['thumb'] = $path;
        }


        $project->update($data);
        return to_route('admin.projects.show', $project->slug)->with('status', 'Well Done, Element Edited Succeffully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if (!is_null($project->thumb)) {
            Storage::delete($project->thumb);
        }


        $project->delete();


        $projects = Project::all();

        return view('admin.projects.index', ['projects' => $projects])->with('message', 'Well Done, Element Deleted Succeffully');
    }
}
