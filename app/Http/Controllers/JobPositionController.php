<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\JobPosition;
use Illuminate\Http\Request;

class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobs',['jobs'=>JobPosition::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = [
            'attr' => [
                'action' => route('jobs.store'),
            ],
            'fields' => [
                'title'=> [
                    'type'=> 'text',
                    'label' => 'Job Title',
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
                'advantages' => [
                    'type' => 'textarea',
                    'label'=> 'Advantages'
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
                    'type'=> 'text',
                    'label' => 'Photo',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'text' => 'Add Job Listing'
                ]
            ],
        ];

        return view('jobs_form',['form'=>$form]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $job = new JobPosition($request->sanitizedInputs());
        $job->save();

        return redirect(route('jobs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = JobPosition::find($id);
        $edit_route = route('jobs.edit', $job->id);

        $buttons = "<a href=$edit_route>Edit</a>" .
        view('partials.form.delete_button',['job_id' => $job->id]) .
        view('partials.form.job_application', ['job' => $job]);

        return view('jobs_show',['job'=>$job, 'buttons' => $buttons]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
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
                'advantages' => [
                    'type' => 'textarea',
                    'label'=> 'Privalumai',
                    'value' => $desc_fields['advantages']
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

        return view('jobs_form',['form'=>$form]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, $id)
    {
        $job = JobPosition::find($id);
        $job->update($request->sanitizedInputs());

        return redirect(route('jobs.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = JobPosition::find($id);
        $job->delete();

        return redirect(route('jobs.index'));
    }

    public function applied(){
        $data['jobs'] = JobPosition::all();
        foreach ($data['jobs'] as $key => $job){
            $rows = [];

            foreach ($job->applications as $application){
                $action_route = route('application.show',$application->id);
                $rows[] = [
                    $application->first_name . ' ' . $application->last_name,
                    $application->birth_date,
                    $application->location,
                    $application->education,
                    $application->languages,
                    $application->work_experience === 0 ? 'No experience' : 'Has experience',
                    $application->work_type,
                    "<a href=$action_route>View Application</a>"
                ];
            }

            $data['rows'][$key] = $rows;
        }

        return view('jobs_applied',[
            'jobs' => $data['jobs'],
            'rows' => $data['rows']
        ]);
    }
}
