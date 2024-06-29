<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function __invoke()
    {
        $jobs = Job::where('job_title', 'LIKE', '%'. request('q').'%')->with('employer')->get();

        return Inertia::render('Jobs/Result',[
            'jobs' => $jobs ?? Null,
            'search' => request('q'),
        ]);
    }
}
