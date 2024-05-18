<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Service;

class servicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('adminDashboard',compact('services'));
    }


    //add service data
    public function create()
    {
        return view('addService');
    }

    public function insert(Request $request)
    {
        Service::create(
            [
                'name'=>$request->name,
                'category'=>$request->category,
                'descripition'=>$request->descripition,
                
            ]
        );

        return redirect('/admin/dashboard');
    }


    //update service data
    public function update($id)
    {
        return view('updateService')->with('id', $id);
    }

    public function store(request $request, $id)
    {
        $service=Service::findorFail($id);
        $service->update([
            'name'=>$request->name,
            'descripition'=>$request->descripition,
            'category'=>$request->category,

        ]);
        
        return redirect('/admin/dashboard');
    }



    //delete service 
    public function delete($id)
    {
        Service::findorFail($id)->delete();
        return redirect('/admin/dashboard');
    }
}

