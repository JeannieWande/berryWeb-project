<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;


class CategoriesController extends Controller
{
    public function adminIndex(){
        //displaying/ fetching data from database to html elem
        $categoryData=category::all();
        return view('admin/category', compact('categoryData'));

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

    public function adminDestroy($id){
        $category= category::find($id);
        if(!$category){
            return redirect()->back()->with('message','category not found');
        }
        $maxId=category::max('id');

        $category->delete();

        if($id ==$maxId){
         
            \DB::statement('ALTER TABLE categories AUTO_INCREMENT= 1');
            
        }
        return redirect()->route('adminCatIndex')->with('message', 'you deleted a category');

    }

    
    public function adminEdit($id){
        $edit=category::findOrFail($id);
        return view('admin/edit', compact('edit'));
    }


    public function adminUpdate(Request $request,$id){
          //retrieve data from database
           $update=category::findOrFail($id);
           //if category exist
           if(!$update){
              return response()->json(['message'=>'Sorry category not found'], 404);
           }


           $validated= $request->validate([
            'categoryName'=>'required|string|max:255',
            'categoryImage'=>'required|image',
        ]);
     
           //updating the inputs 
           $update->category_name= $request->input('categoryName');
           if($request->hasFile('category_image')){
                if($update->category_image){
                    Storage::delete($update->category_image);
                }
            $update->category_image=$request->file('categoryImage')->store('public/images');
           }
        
           $update->save();
        
   
           return redirect()->route('adminCatIndex')->with('message', 'category updated successsful!');

    }

  



    
}










    /*public function index(){
        
    }

    public function store(Request $request){   
   
      
    }

   


    public function destroy($id){
      

    }*/