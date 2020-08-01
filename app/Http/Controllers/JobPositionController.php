<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\JobPosition;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobPositionController extends Controller
{
    /**
     * JobPositionController constructor
     * Calls Auth middleware for all methods except index, show and searchJob
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show','searchJob']]);
        parent::__construct();
    }

    /**
     * Display all jobs with search capability
     */
    public function index()
    {
        return view('jobs.jobs');
    }

    /**
     * Show the form for creating a new job
     */
    public function create()
    {
        $form = [
            'attr' => [
                'action' => route('jobs.store'),
                'enctype' => 'multipart/form-data'
            ],
            'fields' => [
                'title'=> [
                    'type'=> 'text',
                    'label' => 'Job Title',
                ],
                'field' => [
                    'type' => 'text',
                    'label' => 'Job Field'
                ],
                'client_description' => [
                    'type' => 'textarea',
                    'label'=> 'Client Description'
                ],
                'description' => [
                    'type' => 'textarea',
                    'label'=> 'Job Description'
                ],
                'requirements' => [
                    'type' => 'textarea',
                    'label'=> 'Requirements'
                ],
                'offer' => [
                    'type' => 'textarea',
                    'label'=> 'Offer'
                ],
                'location'=> [
                    'type'=> 'text',
                    'label' => 'Location',
                ],
                'img'=> [
                    'type'=> 'file',
                    'label' => 'Photo',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'text' => 'Add Job Listing'
                ]
            ],
        ];

        return view('jobs.jobs_form',['form'=>$form]);
    }

    /**
     * Store a newly created job in MariaDB
     * Store img to storage and save as url in MariaDB
     *
     * @param JobRequest $request filters and sanitizes form inputs
     */
    public function store(JobRequest $request)
    {
        $job = new JobPosition($request->sanitizedInputs());
        $job->img = Storage::url(Storage::putFile('public/jobs',$job->img));

        $job->save();

        return redirect(route('jobs.index'));
    }

    /**
     * Display the specified job.
     */
    public function show($id)
    {
        $job = JobPosition::find($id);
        if (Auth::check()){
            $buttons = view('partials.link',['href'=> route('jobs.edit', $job->id), 'text' => 'Edit']) .
                view('partials.form.delete_button', ['route' => route('jobs.destroy', $job->id)]);
        } else {
            $buttons = view('partials.form.job_application', ['job' => $job]);
        }

        return view('jobs.jobs_show',['job'=>$job, 'buttons' => $buttons]);
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit($id)
    {
        $job = JobPosition::find($id);

        $desc_fields = [];
        foreach (json_decode($job->description) as $key => $desc){
            $string = '';
            foreach ($desc as $text){
                $string .= '||' . $text;
            }
            $desc_fields[$key] = $string;
        }

        $form = [
            'attr' => [
                'action' => route('jobs.update', $id),
                'method'=> 'POST'
            ],
            'fields' => [
                '_method' => [
                    'type' => 'hidden',
                    'value' => 'PUT'
                ],
                'title'=> [
                    'type'=> 'text',
                    'label' => 'Darbo Pozicija',
                    'value' => $job->title,
                ],
                'client_description' => [
                    'type' => 'textarea',
                    'label'=> 'Kliento aprasymas',
                    'value' => $job->client_description
                ],
                'description' => [
                    'type' => 'textarea',
                    'label'=> 'Darbo aprasymas',
                    'value' => $desc_fields['description']
                ],
                'requirements' => [
                    'type' => 'textarea',
                    'label'=> 'Reikalavimai',
                    'value' => $desc_fields['requirements']
                ],
                'offer' => [
                    'type' => 'textarea',
                    'label'=> 'Pasiulymas',
                    'value' => $desc_fields['offer']
                ],
                'location'=> [
                    'type'=> 'text',
                    'label' => 'Vieta',
                    'value' => $job->location
                ],
                'img'=> [
                    'type'=> 'text',
                    'label' => 'Nuotrauka',
                    'value' => $job->img
                ],
            ],
            'buttons' => [
                'submit' => [
                    'text' => 'Redaguoti skelbima'
                ]
            ],
        ];

        return view('jobs.jobs_form',['form'=>$form]);
    }

    /**
     * Update the specified job in MariaDB.
     *
     * @param JobRequest $request filters and sanitizes form inputs
     */
    public function update(JobRequest $request, $id)
    {
        $job = JobPosition::find($id);
        $job->update($request->sanitizedInputs());

        return redirect(route('jobs.index'));
    }

    /**
     * Remove the specified job from MariaDB.
     */
    public function destroy($id)
    {
        $job = JobPosition::find($id);
        $job->delete();

        return redirect(route('jobs.index'));
    }

    /**
     * Displays job list with related applications
     */
    public function applied()
    {
        return view('jobs.jobs_applied');
    }

    /**
     * Search method
     * If request null returns all jobs
     * If request !null returns required jobs
     */
    public function searchJob(Request $request)
    {
        if ($request->search === null){
            return JobPosition::all();
        } else {
            return JobPosition::where($request->searchField, $request->search)
                ->orWhere($request->searchField, 'like', '%' . $request->search . '%')->get();
        }
    }

    /**
     * Search method
     * If request null returns all applications
     * If request !null returns required applications
     *
     * Spins each job to get application relation
     */
    public function searchApplied(Request $request)
    {
        if ($request->search === null){
            $jobs = JobPosition::all();
        } else {
            $jobs = JobPosition::where($request->searchField, $request->search)
                ->orWhere($request->searchField, 'like', '%' . $request->search . '%')->get();
        }

        foreach ($jobs as $key => $job){
            $job->applications;
        }

        return $jobs;
    }
}
