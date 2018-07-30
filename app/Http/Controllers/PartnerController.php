<?php


namespace App\Http\Controllers;

use App\Partner;

class PartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:partner-account')->except('index');
        $this->middleware('auth:staff,partner-account')->only('index');
    }

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
       $data['partners'] = Partner::all();
      
       return view('partners.index',$data);
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

    protected function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:partners,name',
            'company_name' => 'required',
            'trade_registry' => 'required',
            'ice' => 'required',
            'tax_id' => 'required',
            'about' => 'required',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(partner $partner)
    {
        //
    }
}
