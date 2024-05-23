<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Appointments;
use App\Models\Contact;
use App\Models\Online;
use App\Models\Package;
use App\Models\Patient;
use App\Models\Services;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Patient::where('isAdded', true)->count();
        $patient = Patient::where('isAdded', false)->count();
        $app = Appointments::count();
        return view('admin.dashboard',[
            'patient' => $patient,
            'user' => $user,        
            'app' => $app,
        ]);
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
        try {
            $online = Patient::find($id);
            $online->isAdded = true;
            $online->save();
            return redirect(route('a-online'))->with('success', 'Added Successfully.');
        } catch (Exception $e) {
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
    public function viewPatient($id)
    {
        $user = Patient::find($id);
        return view('admin.viewP', [
            'patient' => $user,
        ]);
    }
    public function services()
    {
        $services = Services::all();
        return view('admin.services', [
            'services' => $services,
        ]);
    }
    public function packages()
    {
        $packages = Package::all();
        return view('admin.package', [
            'packages' => $packages,
        ]);
    }
    public function addPackage()
    {
        $services = Services::all();
        return view('admin.addPackage', [
            'services' => $services,
        ]);
    }
    public function addService()
    {
        return view('admin.addService');
    }
    public function storeP(Request $request)
    {
        try {
            $temp = $request->input('service');
            $service = null;
            foreach ($temp as $s) {
                if ($service == null) {
                    $service = $s;
                } else {
                    $service = $service . ', ' . $s;
                }
            }
            Package::create([
                'name' => $request->name,
                'services' => $service,
                'fee' => $request->fee,
                'description' => $request->description,
            ]);
            return redirect(route('a-packages'))->with('success', 'Added Successfully.');
        } catch (Exception $e) {
            return redirect(route('a-addP'))->with('error', $e->getMessage());
        }
    }
    public function storeS(Request $request)
    {
        try{
            $temp = $request->input('day');
            $data = [];
            $data['day'] = null;
            foreach ($temp as $t){
                if($data['day'] == null){
                    $data['day'] = $t;
                }else{
                    $data['day'] = $data['day'].', '.$t;
                }
            }
            $data['name'] = $request->name;
            $data['description'] = $request->description;
            $data['fee'] = $request->fee;
            $data['reserve'] = $request->reserve;
            if(isset($request->require)){
                $data['recommend'] = true;
            }
            $imageData = file_get_contents($request->file('image')->getRealPath());
            $data['image_data'] = $imageData;
            Services::create($data);
            return redirect(route('a-addS'))->with('success', 'Successfully added service.');

        }catch(Exception $e){
            return redirect(route('a-addS'))->with('error', $e->getMessage());
        }
    }
    public function deletePackage($id)
    {
        try {
            $package = Package::find($id);
            $package->delete();
            return redirect(route('a-packages'))->with('delete', 'Deleted Successfully.');
        } catch (Exception $e) {
            return redirect(route('a-packages'))->with('error', $e->getMessage());
        }
    }
    public function editPackage($id)
    {
        $package = Package::find($id);
        $service = Services::all();
        return view('admin.editPackage', [
            'services' => $service,
            'edit' => $package,
        ]);
    }
    public function editS($id)
    {
        $service = Services::find($id);
        return view('admin.editService', [
            'data' => $service,
        ]);
    }
    public function updatePackage(Request $request, $id)
    {
        try {
            $temp = $request->input('service');
            $service = null;
            foreach ($temp as $s) {
                if ($service == null) {
                    $service = $s;
                } else {
                    $service = $service . ', ' . $s;
                }
            }
            $package = Package::find($id);
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'fee' => 'required|string|max:255',
            ]);
            $validated['services'] = $service;
            $package->update($validated);
            return redirect(route('a-packages'))->with('success', 'Updated Successfully.');
        } catch (Exception $e) {
            return redirect(route('a-packages'))->with('error', $e->getMessage());
        }
    }

    public function destroy($id, $route)
    {
        try {
            $user = Patient::find($id);
            $user->delete();
            if ($route == 'a-patients') {
                return redirect(route('a-patients'))->with('delete', 'Deleted Successfully.');
            } else if ($route == 'a-online') {
                return redirect(route('a-online'))->with('delete', 'Deleted Successfully.');
            }
        } catch (Exception $e) {
            if ($route == 'a-patients') {
                return redirect(route('a-patients'))->with('error', $e->getMessage());
            } else if ($route == 'a-online') {
                return redirect(route('a-online'))->with('delete', $e->getMessage());
            }
        }
    }

    public function queries(): View
    {
        $data = Contact::all();
        return view('admin.queries',[
            'data' => $data,
        ]);
    }
    public function appointments()
    {
        $data = Appointments::where('minified',true)->get();
        return view('admin.appointments', [
            'data' => $data,
        ]);
    }
}
