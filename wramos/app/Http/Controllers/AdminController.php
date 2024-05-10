<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Online;
use App\Models\Patient;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    public function online()
    {
        $online = Patient::where('isAdded', false)->paginate(10);
        return view('admin.online', [
            'online' => $online,
        ]);
    }
    public function onlineUpdate($id)
    {
        try{
            $online = Patient::find($id);
            $online->isAdded = true;
            $online->save();
            return redirect(route('a-online'))->with('success', 'Added Successfully.');
        }catch(Exception $e){
            return redirect(route('a-online'))->with('error', $e->getMessage());
        }
    }
    public function patients()
    {
        $patient = Patient::where('isAdded', true)->paginate(10);
        return view('admin.patients', [
            'patient' => $patient,
        ]);
    }
    public function viewPatient($id){
        $user = Patient::find($id);
        return view('admin.viewP', [
            'patient' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $route)
    {
        try{
            $user = Patient::find($id);
            $user->delete();
            if($route == 'a-patients'){
                return redirect(route('a-patients'))->with('delete', 'Deleted Successfully.');
            }else if($route == 'a-online'){
                return redirect(route('a-online'))->with('delete', 'Deleted Successfully.');
            }        
        }catch(Exception $e){
            if($route == 'a-patients'){
                return redirect(route('a-patients'))->with('error', $e->getMessage());
            }else if($route == 'a-online'){
                return redirect(route('a-online'))->with('delete', $e->getMessage());
            }    
        }
    }
}
