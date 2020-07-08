<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Use Model
use App\TransactionIn;
use App\User;

date_default_timezone_set("Asia/Jakarta");

class TransactionInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find($request->user()->id);
        $trin = TransactionIn::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        $trtotal = TransactionIn::where('user_id', $user->id)->count();
        $trmoney = TransactionIn::where('user_id', $user->id)->sum('money');
        return view('user.in.index', ['trins' => $trin, 'user' => $user, 'trtotal' => $trtotal, 'trmoney' => $trmoney]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.in.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'money' => ['required'],
        ]);

        // dd(date('Y-m-d H:i'));
        TransactionIn::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'money' => $request->money,
            'datetime' => date('Y-m-d H:i')
        ]);

        $user = User::find($request->user()->id);
        $newBalance = $user->balance + $request->money;
        
        $user->update([
            'balance' => $newBalance
        ]);

        return redirect()->route('user.trin.index');
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
    public function edit($id)
    {
        $master = TransactionIn::find($id);
        return view('user.in.edit', ['goshujin_sama' => $master]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'money' => ['required'],
        ]);

        $id = TransactionIn::find($id);
        
        $user = User::find($request->user()->id);
        $newBalance = $user->balance - $id->money + $request->money;

        $id->update([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'money' => $request->money,
            'datetime' => date('Y-m-d H:i')
        ]);
        
        $user->update([
            'balance' => $newBalance
        ]);

        return redirect()->route('user.trin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $master = TransactionIn::find($id);
        $money = $master->money;
        $master->delete();

        $user = User::find($master->user_id);
        $user_balance = $user->balance;

        $newUserBalance = $user_balance - $money;

        $user->update([
            'balance' => $newUserBalance
        ]);

        return redirect()->back();
    }
}
