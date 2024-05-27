<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request->all());
        $val_data = $request->validated();

        // dd($val_data);
        $val_data['slug'] = Str::slug($val_data['name'], '-');

        $name = $val_data['name'];
        if ($request->has('cover_image')) {
            $val_data['cover_image'] = Storage::disk('public')->put('uploads/images', $val_data['cover_image']);
        }
        if ($request->has('video')) {
            $val_data['video'] = Storage::disk('public')->put('uploads/videos', $val_data['video']);
        }


        // dd($val_data);

        // dd($val_data['cover_image']);
        // dd($val_data['slug'], $val_data);
        $project = Project::create($val_data);

        if ($request->has('technologies')) {

            $project->technologies()->attach($val_data['technologies']);
        }
        // dd($project);
        return to_route('admin.projects.index')->with('message', "You created new project: $name");
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
        $technologies = Technology::all();
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'technologies', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // dd($request->all());

        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($val_data['name'], '-');

        // dd($val_data);
        if ($request->has('cover_image')) {

            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $val_data['cover_image'] = Storage::disk('public')->put('uploads/images', $val_data['cover_image']);
        }

        if ($request->has('video')) {

            if ($project->video) {
                Storage::disk('public')->delete($project->video);
            }

            $val_data['video'] = Storage::disk('public')->put('uploads/videos', $val_data['video']);
        }

        // dd($project['cover_image'], $project->cover_image);
        $project->update($val_data);

        if ($request->has('technologies')) {

            $project->technologies()->sync($val_data['technologies']);
        }
        return to_route('admin.projects.index', $project)->with('message', "You updated project: $project->name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }

        if ($project->video) {
            Storage::disk('public')->delete($project->video);
        }
        $project->delete();
        return redirect()->back()->with('message', "You delete  project: $project->name");
    }
}
