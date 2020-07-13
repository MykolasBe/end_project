<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests\ApplicationRequest;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'action' => route('application.store'),
            ],
            'fields' => [
                'first_name'=> [
                    'type'=> 'text',
                    'label' => 'Vardas',
                ],
                'last_name'=> [
                    'type'=> 'text',
                    'label' => 'Pavarde',
                ],
                'phone'=> [
                    'type'=> 'text',
                    'label' => 'Mobilus telefonas',
                ],
                'email'=> [
                    'type'=> 'text',
                    'label' => 'El.pastas',
                ],
                'birth_date' => [
                    'type' => 'date',
                    'label'=> 'Gimimo data'
                ],
                'location' => [
                    'type' => 'text',
                    'label'=> 'Gyvenamoji vieta'
                ],
                'education_degree' =>[
                    'type' => 'select',
                    'label' => 'Issilavinimas',
                    'value' => '',
                    'options' => [
                        Application::HIGH_SCHOOL_DEGREE =>'Vidurinis ugdymas',
                        Application::BACHELOR_DEGREE =>'Bakalauras',
                        Application::MASTER_DEGREE =>'Magistras',
                        Application::PHD_DEGREE =>'Dokturantura',
                    ]
                ],
                'education' => [
                    'type' => 'text',
                    'label'=> 'Studiju kryptis'
                ],
                'languages' => [
                    'type' => 'text',
                    'label'=> 'Kalbos'
                ],
                'status' => [
                    'type' => 'text',
                    'label'=> 'Uzimtumas'
                ],
                'work_experience' => [
                    'type' => 'text',
                    'label'=> 'Darbo patirtis'
                ],
                'work_from' => [
                    'type' => 'date',
                    'label'=> 'Nuo'
                ],
                'work_to' => [
                    'type' => 'date',
                    'label'=> 'Iki'
                ],
            ],
            'buttons' => [
                'submit' => [
                    'text' => 'Siusti anketa'
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
    public function store(ApplicationRequest $request)
    {
        $application = new Application($request->sanitizedInputs());
        $application->save();

        return redirect('jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
