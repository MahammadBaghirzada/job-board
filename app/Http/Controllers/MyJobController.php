<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    public function index()
    {
        return view('my_job.index',
            [
            'jobs' => auth()->user()->employer
                ->jobs()
                ->with(['employer', 'jobApplications', 'jobApplications.user'])
                ->get()
            ]
        );
    }

    public function create()
    {
        return view('my_job.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:500',
            'description' => 'required|string',
            'experience' => 'required|in:' . implode(',', Job::$experience),
            'category' => 'required|in:' . implode(',', Job::$category),
        ]);
        auth()->user()->employer->jobs()->create($validatedData);

        return redirect()->route('my-jobs.index')
            ->with('success', 'İş uğurla əlavə olundu');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
