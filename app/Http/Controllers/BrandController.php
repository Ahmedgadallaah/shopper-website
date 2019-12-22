<?php

namespace App\Http\Controllers;
use DB;

use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_brands_info=DB::table('tbl_brand')->get();
        $manage_brand=view('admin.brand.all_brands')->
        with('all_brands_info',$all_brands_info);
        return view('admin_layout')->
        with('admin.brand.all_brands',$manage_brand);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.add_brand');
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
        $data['brand_id']=$request->brand_id;
        $data['brand_name']=$request->brand_name;
        $data['brand_description']=$request->brand_description;
        $data['publication_status']=$request->publication_status;

        DB::table('tbl_brand')->insert($data);
        Session::put('message','Brand Added Successfully !!');
        
        return Redirect::to('/add_brand');
  
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
    public function edit($brand_id)
    {
        $brand_info=DB::table('tbl_brand')
        ->where('brand_id',$brand_id)
        ->first();
       
        $brand_info=view('admin.brand.edit_brand')
        ->with('brand_info',$brand_info);

        return view('admin_layout')->
        with('admin.brand.edit_brand',$brand_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $brand_id)
    {
        echo $brand_id;
        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_description']=$request->brand_description;
        $data['publication_status']=$request->publication_status;
    
        DB::table('tbl_brand')
            ->where('brand_id',$brand_id)
            ->update($data);

        Session::put('message','Brand Updated Successfully !!');
        return Redirect::to('/all_brands');
    }


    public function InActive($brand_id)
    {
        DB::table('tbl_brand')
            ->where('brand_id',$brand_id)
            ->update(['publication_status' => 0]);
            Session::put('message','Brand InActivated Successfully !!');
            return Redirect::to('/all_brands');

    }

    public function Active($brand_id)
    {
        DB::table('tbl_brand')
            ->where('brand_id',$brand_id)
            ->update(['publication_status' => 1]);
            Session::put('message','Brand Activated Successfully !!');
            return Redirect::to('/all_brands');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($brand_id)
    {
        DB::table('tbl_brand')
            ->where('brand_id',$brand_id)
            ->delete();
            Session::put('message','brand Deleted Successfully !!');
            return Redirect::to('/all_brands');  
    }
}
