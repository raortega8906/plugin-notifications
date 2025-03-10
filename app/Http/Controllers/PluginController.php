<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePluginRequest;
use App\Http\Requests\UpdatePluginRequest;
use App\Models\Plugin;
use App\Models\Project;

class PluginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $plugins = Plugin::where('project_id', $project->id)->latest()->get();;

        return view('projects.show', compact('plugins', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('plugins.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePluginRequest $request, Project $project)
    {
        $validated = $request->validated();
        $validated['project_id'] = $project->id;

        Plugin::create($validated);

        return redirect()->route('plugins.index', compact('project'))->with('success', 'Plugin creado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Plugin $plugin) 
    {
        return view('plugins.edit', compact('plugin', 'project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePluginRequest $request, Project $project, Plugin $plugin)
    {
        $validated = $request->validated();
        $plugin->update($validated);

        return redirect()->route('plugins.index', compact('project'))->with('success', 'Plugin actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Plugin $plugin)
    {
        $plugin->delete();

        return redirect()->route('plugins.index', compact('project'))->with('danger', 'Plugin eliminado exitosamente');
    }

    public function pluginsMonitoring()
    {
        $plugins = Plugin::latest()->get();

        return view('plugins.index', compact('plugins'));
    }
}
