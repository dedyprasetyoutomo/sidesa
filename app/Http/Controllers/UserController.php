<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function account_request_view()
    {
        $user = User::where('status', 'submitted')->get();
        return view('pages.account-request.index',[
            'users' => $user,
        ]);
    }

    public function account_approval(Request $request, $userId)
    {
        $request->validate([
            'for' => ['required', Rule::in('approve', 'reject', 'activate', 'deactivate')],
        ]);

        $for = $request->input('for');
        $user = User::findOrFail($userId);
        $user->status = ($for == 'approve' || $for == 'activate') ? 'approved' : 'rejected';

        $user->save();
        
        if($for == 'activate'){
        return back()->with('success', 'Berhasil mengaktifkan akun');
        }else if($for == 'deactivate'){
        return back()->with('success','Berhasil menon-aktifkan akun');
        }

        return back()->with('success', $for == 'approve' ? 'Berhasil menyetujui akun' : 'Berhasil menolak akun');
    }

    public function account_list_view()
    {
        $users = User::where('role_id', 2)->where('status','!=', 'submitted')->get();
        return view('pages.account-list.index',[
            'users' => $users,
        ]);
    }
    public function profile_view()
    {
        return view('pages.profile.index');
    }
    public function change_password_view()
    {
        return view('pages.profile.change-password');
    }
}
