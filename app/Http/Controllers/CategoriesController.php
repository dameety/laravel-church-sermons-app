<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\Sermon;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Input;



class CategoriesController extends Controller
{
    public function allCategoriesPage()
    {
    	return view('category.allCategories');
    }


    public function categorySermonsData(Category $category)
    {
    	/*get all sermons by the injected category*/
    	return $category->sermons;

    }

    public function newCategoryData(Request $request)
    {
        $rules = array(
            'name' => 'max:24',
            'info' => 'max:75',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            $categories = $validator->messages();
            return redirect()->route('allsermons_path');
        }
        else
            {
                $category = new Category;
                $category -> name = Input::get('name');
                $category -> info = Input::get('info');
                $category-> save();
            }

    }

    public function destroy(Category $category)
    {
        $category->delete();
    }


}
