<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\JobApplicationRequest;
use App\JobPosition;
use App\Mail\ApplicationSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['create','store','apply']]);
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('applications.applications');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($job_id = null)
    {
        $form = [
            'attr' => [
                'action' => route('application.store'),
            ],
            'fields' => [
                'job_id' => [
                    'type' => 'hidden',
                    'value' => $job_id,
                ],
                'first_name'=> [
                    'type'=> 'text',
                    'label' => 'First Name',
                ],
                'last_name'=> [
                    'type'=> 'text',
                    'label' => 'Last Name',
                ],
                'phone'=> [
                    'type'=> 'text',
                    'label' => 'Phone Number',
                ],
                'email'=> [
                    'type'=> 'text',
                    'label' => 'Email',
                ],
                'birth_date' => [
                    'type' => 'date',
                    'label'=> 'Birth Date'
                ],
                'location' => [
                    'type' => 'text',
                    'label'=> 'Location'
                ],
                'education_degree' =>[
                    'type' => 'select',
                    'label' => 'Education Degree',
                    'value' => '',
                    'options' => [
                        Application::HIGH_SCHOOL_DEGREE =>'High School',
                        Application::BACHELOR_DEGREE =>'Bachelor Degree',
                        Application::MASTER_DEGREE =>'Master Degree',
                        Application::PHD_DEGREE =>'Phd Degree',
                    ]
                ],
                'education' => [
                    'type' => 'text',
                    'label'=> 'Education Field'
                ],
                'languages' => [
                    'type' => 'text',
                    'label'=> 'Languages'
                ],
                'status' => [
                    'type' => 'text',
                    'label'=> 'Occupation'
                ],
                'work_experience' => [
                    'type' => 'select',
                    'label'=> 'Do you have work experience?',
                    'value' => '',
                    'options' => [
                        1 => 'Yes',
                        0 => 'No'
                    ]
                ],
                'work_type' => [
                    'type' => 'select',
                    'label'=> 'What type of job are you looking for?',
                    'value' => '',
                    'options' => [
                        'temp' => 'Temporary job',
                        'full' => 'Full-time job',
                        'part' => 'Part-time job'
                    ]
                ],
            ],
            'buttons' => [
                'submit' => [
                    'text' => 'Send Application'
                ]
            ],
        ];

        return view('jobs.jobs_form',['form'=>$form]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {
        $application = new Application($request->sanitizedInputs());
        $application->save();

        if ($request->sanitizedInputs()['job_id']) {
            $application->jobs()->attach(JobPosition::find($request->sanitizedInputs()['job_id']));
        }
        Mail::to($application->email)->send(new ApplicationSuccess($application));

       return redirect(route('jobs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {
        $application = Application::find($id);
        $rows = [];
        foreach ($application->jobs as $key => $applied_job){

            $rows[$key] = [
                $applied_job->title,
                $applied_job->location,
                view('partials.link',['href'=> route('jobs.show',$applied_job->id), 'text' => 'View job'])
            ];
        }
        return view('applications.application_show',[
            'application'=> $application,
            'table'=>[
                'headers' => ['Title','Location','Actions'],
                'rows'=> $rows
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Add/Create the specified resource to storage & pivot.
     *
     * @param JobApplicationRequest $request
     * @param int $id
     * @return void
     */
    public function apply(JobApplicationRequest $request, $id)
    {
        $application = Application::firstwhere('email',$request->sanitizedInputs()['email']);
        if ($application){
            $jobs = [];
            foreach ($application->jobs as $applied_jobs){
                $jobs[] = $applied_jobs->id;
            }
            $jobs[] = JobPosition::find($id)->id;

            $application->jobs()->sync($jobs);

            return redirect(route('jobs.index'));
        } else {
            return $this->create($id);
        }
    }

    public function searchApplication(Request $request)
    {
        if ($request->search === null){
            return Application::all();
        } else {
            return Application::where($request->searchField, $request->search)
                ->orWhere($request->searchField, 'like', '%' . $request->search . '%')->get();
        }
    }
}
