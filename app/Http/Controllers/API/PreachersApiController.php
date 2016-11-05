<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Preacher;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;



class PreachersApiController extends Controller
{
    

    public function allPreachersPaginated()
    {
        return Preacher::latest('created_at')->paginate(20);
    }

    public function allPreachersData()
    {
      return Preacher::latest('created_at')->get();

    }

    public function preacherSermonsData(Preacher $preacher)
    {
        return $preacher->sermons;

    }

    public function newPreacherData(Request $request)
    {
        $rules = array(
            'name' => 'required|max:30',
            'info' => 'max:100',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            return response($validator->errors()->getMessages(), 422);
        }
        else
            {
                $preacher = new Preacher;
                $preacher -> name = Input::get('name');
                $preacher -> info = Input::get('info');
                $preacher-> save();
            }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function destroy(Preacher $preacher)
    {
        $preacher->delete();
    }
}
