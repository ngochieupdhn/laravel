<?php

namespace App\Http\Controllers;
use Request;
use DB;
use Validator;
use Redirect;
use Illuminate\Routing\Controller as BaseController;


class AdminController extends BaseController {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $items = DB::table('products')->get();
		return view("admin.index", array('items' => $items));
    }

    public function add() {
        if (Request::isMethod('POST')) {
            $data = Request::all();
            // thiet lap check thong tin submit
            $rules = array(
                'name' => 'required',
                'price' => 'required',
                'category' => 'required'
            );

            $validator = Validator::make($data, $rules);
            if ($validator->fails()){
                // báo loi ra view
                return Redirect::to('/admin/add')->withErrors($validator);
            }else {
                // insert vao db
                $newdata = array(
                    'name' => Request::get('name'),
                    'price' => Request::get('price'),
                    'description' => Request::get('description'),
                    'active' => Request::get('active'),
                    'category' => Request::get('category'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                // Neu submit co kem theo file (hinh anh) thi no se upload vao thu muc: product
                if (Request::hasFile('file')) {
                    // ten thu muc, nam o public/product
                    $destinationPath = 'product';
                    // Lay duoi cua file: .jpg, .png
                    $extension = Request::file('file')->getClientOriginalExtension();
                    // Ten file: thoi gian + duoi, 3824723894.jpg
                    $fileName = time().'.'.$extension;
                    // thuc hien upload hinh vao thu muc product
                    Request::file('file')->move($destinationPath, $fileName);
                    $newdata['file'] = $fileName;
                }
                // insert du lieu vao product
                $new = DB::table('products')->insert($newdata);
                if($new){
                    return Redirect::to('/');
                } else {
                    Session::flash('error', "Something wrong!"); 
                }
            }
        }
        $category = DB::table('categories')->get();
		return view("admin.add", array('categories' => $category));
    }
}