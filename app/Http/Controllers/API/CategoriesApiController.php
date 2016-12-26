<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;



class CategoriesApiController extends Controller
{
    
    public function allCategoriesPaginated()
    {
        return Category::latest('created_at')->paginate(20);
    }

    public function allCategoriesData()
    {
        return Category::all();

    }

    public function categorySermonsData(Category $category)
    {
        /*get all sermons by the injected category*/
        return $category->sermons;

    }

    public function newCategoryData(Request $request)
    {
        $rules = array(
            'name' => 'required|max:32|unique:categories',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            $error = $validator->errors()->getMessages();
            return response($error, 422);
        }
        else
            {
                $category = new Category;
                $category -> name = Input::get('name');
                $category -> info = Input::get('info');
                $category-> save();
            }
            return response(201);
    }

    public function categoryEditSave(Request $request, $slug)
    {
        $rules = array(
            'name' => 'required|string|max:75',
            'info' => 'string|max:300',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            $error = $validator->errors()->getMessages();
            return response($error, 422);
        }
        else
            {
                $category = Category::whereSlug($slug)->first();
                $category -> name = $request-> name;
                $category -> info = $request-> info;
                $category -> save();                                  
            }
    }


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
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
    }
}
