<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    public function index()
    {
        $this->authorize('viewAnyEmployer', Job::class);
        return view('my_job.index',
            [
            'jobs' => auth()->user()->employer
                ->jobs()
                ->with(['employer', 'jobApplications', 'jobApplications.user'])
                ->withTrashed()
                ->latest()
                ->get()
            ]
        );
    }

    public function create()
    {
        $this->authorize('create', Job::class);
        return view('my_job.create');
    }

    public function store(JobRequest $request)
    {
        $this->authorize('create', Job::class);
        auth()->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'İş uğurla əlavə olundu');
    }

    public function edit(Job $myJob)
    {
        $this->authorize('update', $myJob);
        return view('my_job.edit', ['job' => $myJob]);
    }

    public function update(JobRequest $request, Job $myJob)
    {
        $this->authorize('update', $myJob);
        $myJob->update($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'İş uğurla yeniləndi');
    }

    public function destroy(Job $myJob)
    {
        $myJob->delete();

        return redirect()->route('my-jobs.index')
            ->with('success', 'İş silindi');
    }
}
