<?php

namespace App\Http\Controllers;

use App\PartnerAccount;
use Illuminate\Http\Request;

class PartnerAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partner-account');
    }

    protected function validateRequest(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:partner_accounts,email',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('partners.home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'You Are A Partner '.Auth::id();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $this->validateRequest($request);
        $password = bcrypt($request->password);
        $name = str_before($request->email, '@');
        while(PartnerAccount::where('name', $name)->first()){
            $name = $name.'_'.rand(0,9);
        }

        $partnerAccount = new PartnerAccount();
        $partnerAccount->first_name = $request->first_name;
        $partnerAccount->last_name = $request->last_name;
        $partnerAccount->name = $name;
        $partnerAccount->password = $password;
        $partnerAccount->partner_id = $id;
        $partnerAccount->save();

        return $partnerAccount;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
