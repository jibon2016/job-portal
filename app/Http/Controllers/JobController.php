<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('employer')->get()->groupBy('featured');

        return Inertia::render('Jobs/Index',[
            'featured_jobs' => $jobs[1] ?? NULL,
            'jobs' => $jobs[0] ?? NULL,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $jobs = Job::where('employer_id', Auth::user()->id)->get();
        return Inertia::render('Jobs/All',[
            'jobs' => $jobs ?? Null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Jobs/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $attribute = $request->all();
        $imagePath = $request->company_image->store('/images/jobs/company');
        $attribute["employer_id"] = Auth::user()->id;
        $attribute["company_image"] = $imagePath;
        $attribute["featured"] = $request->featured ?? false;
        $job = Job::create($attribute);
        return Inertia::location(route('jobs.all'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return Inertia::render('Jobs/Edit',[
            'job' => $job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, $id)
    {
        $attribute = $request->all();
        $job = Job::findOrFail($id);
        if ($request->company_image) {
            $imagePath = $request->company_image->store('/images/jobs/company');
        }
        $attribute["company_image"] = $imagePath ?? $request->company_image;
        $attribute["featured"] = $request->featured ?? false;
        $job->update($attribute);
        return Inertia::location(route('jobs.all'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
