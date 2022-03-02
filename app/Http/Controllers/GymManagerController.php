<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGymManagerRequest;
use App\Http\Requests\UpdateGymManagerRequest;
use App\Models\GymManager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GymManagerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gymManagers = DB::table('users')->where('role_id', 3)->get();

        return view('gymManagers.index', [
            'gymManagers' => $gymManagers,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gymManagers.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGymManagerRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreGymManagerRequest $request)
    {

        //fetch request data
        $requestData = request()->all();

        // deal with image
        // $image = $request->img;

        // $imageName = time() . rand(1, 200) . '.' . $image->extension();
        // $image->move(public_path('dist/img/GymMgr'), $imageName);

        // store new data into data base
        GymManager::create([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password']),

            // 'profile_img' => $imageName,
            'profile_img' => 'gymMgr.png',
            'national_id' => $requestData['national_id'],

            'role_type' => 'Gym_Mgr',
            'role_id' => 3,
        ]);

        //redirection to posts.index
        return redirect()->route('gymManagers.index');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GymManager  $gymManager
     * @return \Illuminate\Http\Response
     */
    public function edit($gymManagerID)
    {
        $gymManager = GymManager::find($gymManagerID);

        return view('gymManagers.edit', [
            'gymManager' => $gymManager
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGymManagerRequest  $request
     * @param  \App\Models\GymManager  $gymManager
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGymManagerRequest $request, $gymManagerID)
    {
        //fetch request data
        $requestData = request()->all();

        // update new data into data base
        GymManager::find($gymManagerID)->update([

            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'national_id' => $requestData['national_id'],
        ]);

        //redirection to posts.index
        return redirect()->route('gymManagers.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GymManager  $gymManager
     * @return \Illuminate\Http\Response
     */
    public function destroy($gymManager)
    {
        GymManager::find($gymManager)->delete();
        return redirect()->route('gymManagers.index');
    }
}
