<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\category;

class CategoriesController extends Controller
{
    public function home(){
        $categoryData=category::all();
        return view('user.homepage', compact('categoryData'));
    }

    public function index(){
        //displaying/ fetching data from database to html elem
        $categoryData=category::all();
        return view('admin.category', compact('categoryData'));
    }
    public function store(Request $request){   
        $validated= $request->validate([
            'categoryName'=>'required|string|max:255',
            'categoryImage'=>'required|image',
        ]);

        //storing data in database 
        $category = new category;
        $category-> category_name= $request->input('categoryName');
        $category->category_image=$request->file('categoryImage')->store('public/images');
        $category->save();
        //dd($request->all());

        return redirect()->back()->with('message', 'category added successsful!');
      
    }
    public function destroy($id){
        $category= category::find($id);
        if(!$category){
            return redirect()->back()->with('message','category not found');
        }
        $maxId=category::max('id');

        $category->delete();

        if($id ==$maxId){
         
            \DB::statement('ALTER TABLE categories AUTO_INCREMENT= 1');
        }
        return redirect()->route('category.index')->with('message', 'you deleted a category');

    }
}
