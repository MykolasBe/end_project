<?php

namespace App\Http\Controllers;

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
                    'label' => 'Darbo Pozicija',
                ],
                'client_description' => [
                    'type' => 'textarea',
                    'label'=> 'Kliento aprasymas'
                ],
                'description' => [
                    'type' => 'textarea',
                    'label'=> 'Darbo aprasymas'
                ],
                'location'=> [
                    'type'=> 'text',
                    'label' => 'Vieta',
                ],
                'img'=> [
                    'type'=> 'file',
                    'label' => 'Nuotrauka',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'text' => 'Add achievement'
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
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('jobs_show',['job'=>JobPosition::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPosition $jobPosition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobPosition $jobPosition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPosition $jobPosition)
    {
        //
    }


}
