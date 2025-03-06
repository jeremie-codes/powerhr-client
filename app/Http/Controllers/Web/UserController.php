<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = User:: with('personne', 'profile','ratings')->role(['candidate', 'employee'])->paginate(20);

        return view('user.index', [
            'members' => $members
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
         try {
            
            $client = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => now(),
                'password' => bcrypt($request->password),
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'current_team_id' => null,
            ]);
            
            $client->assignRole('customer');
            $client->save();
            
            return redirect()->route('dashboard')->with('success', 'Admin created successfully');
        } 
        catch (\Throwable $th) {
            // dd($th);
            return redirect()->route('dashboard')->with('error', 'Admin creation failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) //: View
    {
        $user = User::with('personne', 'profile')->findOrFail($id);
        $minutes = 5;
        views($user)
            ->cooldown($minutes)
            ->record();
        $view = views($user)->count();
        $jobs = Job::where('user_id', Auth::user()->id)->get();
        return view('user.show', [
            'user' => $user,
            'view' => $view,
            'jobs' => $jobs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('delete-success', 'User deleted successfully.');
    }
}
