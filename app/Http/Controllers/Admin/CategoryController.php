<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\File; 
class CategoryController extends Controller
{
   public function index(){
       $category=Categories::all();
       return view('admin.category.index',compact('category'));
   }
   public function add(){
    return view('admin.category.add');
    }
    public function save(request $request){
       $category= new Categories();
       if($request->hasFile('image')){
           $file=$request->file('image');
           $ext=$file->getClientOriginalExtension();
           $filename=time().'.'.$ext;
           $file->move('assets/uploads/category',$filename);
           $category->image=$filename;
       }
       $category->name=$request->input('name');
       $category->slug=$request->input('slug');
       $category->description=$request->input('description');
       $category->status=$request->input('status') == TRUE ?'1':'0';
       $category->popular=$request->input('popular') == TRUE ?'1':'0';
       $category->meta_title=$request->input('meta_title');
       $category->meta_descrip=$request->input('meta_descrip');
       $category->meta_keywords=$request->input('meta_keywords');
       $category->save();

        return view('admin.index')->with('status','category saved successfully');

    
    }
    public function edit($id){
        $category = Categories::find($id);
        return view('admin.category.edit',compact('category'));
        }
    public function update(Request $request,$id){
        
            $category = Categories::find($id);
            if($request->hasFile('image'))
            {
                  $path='assets/uploads/category/'.$category->image;
                  if(File::exists($path)){
                      File::delete($path);
                  }
                  $file=$request->file('image');
                  $ext=$file->getClientOriginalExtension();
                  $filename=time().'.'.$ext;
                  $file->move('assets/uploads/category',$filename);
                  $category->image=$filename;
            }
            $category->name=$request->input('name');
            $category->slug=$request->input('slug');
            $category->description=$request->input('description');
            $category->status=$request->input('status') == TRUE ?'1':'0';
            $category->popular=$request->input('popular') == TRUE ?'1':'0';
            $category->meta_title=$request->input('meta_title');
            $category->meta_descrip=$request->input('meta_descrip');
            $category->meta_keywords=$request->input('meta_keywords');
            $category->update();
            return redirect('category')->with('status','category updated successfully');
            }
        public function delete($id){
            $category = Categories::find($id);
            if($category->image)
            {
                  $path='assets/uploads/category/'.$category->image;
                  if(File::exists($path)){
                      File::delete($path);
                      }
            }
            $category->delete();
            return redirect('category')->with('status','Category deleted successfully');

            }  
}
