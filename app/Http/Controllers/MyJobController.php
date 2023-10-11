<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
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

    public function store(JobRequest $request)
    {
        auth()->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'İş uğurla əlavə olundu');
    }

    public function edit(Job $myjob)
    {
        return view('my_job.edit', ['job' => $myjob]);
    }

    public function update(JobRequest $request, Job $myjob)
    {
        $myjob->update($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'İş uğurla yeniləndi');
    }

    public function destroy(string $id)
    {
        //
    }
}
