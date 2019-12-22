<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_categories_info=DB::table('tbl_category')->get();
        $manage_category=view('admin.category.all_Categories')->
        with('all_categories_info',$all_categories_info);
        return view('admin_layout')->
        with('admin.category.all_Categories',$manage_category);
        // return view('admin.category.all_Categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add_Category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=array();
        $data['category_id']=$request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;

        DB::table('tbl_category')->insert($data);
        Session::put('message','Category Added Successfully !!');
        
        return Redirect::to('/add-category');
    }

    public function InActive($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update(['publication_status' => 0]);
            Session::put('message','Category InActivated Successfully !!');
            return Redirect::to('/all-categories');

    }

    public function Active($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update(['publication_status' => 1]);
            Session::put('message','Category Activated Successfully !!');
            return Redirect::to('/all-categories');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $category_info=DB::table('tbl_category')
        ->where('category_id',$category_id)
        ->first();
       
        $category_info=view('admin.category.edit_category')
        ->with('category_info',$category_info);

        return view('admin_layout')->
        with('admin.category.edit_category',$category_info);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        echo $category_id;
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        
        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update($data);

        Session::put('message','Category Updated Successfully !!');
        return Redirect::to('/all-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->delete();
            Session::put('message','Category Deleted Successfully !!');
            return Redirect::to('/all-categories');            
    }
}
