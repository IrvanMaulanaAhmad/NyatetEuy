<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\User;
use App\TransactionIn;
use App\TransactionOut;

class DashboardController extends Controller
{
    public function index()
    {
    	$userlist = $allBalance = User::where('roles', 'user')->get();
    	$allBalance = User::where('roles', 'user')->sum('balance');
    	$allTrin = TransactionIn::all()->sum('money');
    	$allTrout = TransactionOut::all()->sum('money');
    	return view('admin.dashboard', ['allBalance' => $allBalance, 'allTrin' => $allTrin, 'allTrout' => $allTrout, 'users' => $userlist]);
    }

    public function show($id)
    {
    	$user = User::find($id);
    	$trinTotal = TransactionIn::where('user_id', $id)->sum('money');
    	$troutTotal = TransactionOut::where('user_id', $id)->sum('money');

    	$trin = TransactionIn::where('user_id', $id)->get();
    	$trout = TransactionOut::where('user_id', $id)->get();
    	return view('admin.detail', ['user' => $user, 'trinTotal' => $trinTotal, 'troutTotal' => $troutTotal, 'trins' => $trin, 'trouts' => $trout]);
    }
}
