<?php


namespace App\Http\Controllers;

use App\Partner;
use App\PartnerAccount;
use App\Address;
use App\Picture;
use App\Phone;
USE App\Region;
USE App\RegionPoint;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\PartnerAccountRegisterController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PhoneController;
class PartnerController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:partner-account')->except('store', 'test');
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
        $this->validateRequest($request);
        $PartnerAccountRegisterController = new PartnerAccountRegisterController();
        $PartnerAccountRegisterController->validateRequest($request);
        
        $AddressController = new AddressController();
        $AddressController->validateRequest($request);
        
        $PictureController = new PictureController();
        $PictureController->validateRequest($request);
        
        $PhoneController = new PhoneController();
        $PhoneController->validateRequest($request);

        $RegionController = new RegionController();
        $RegionController->validateRequest($request);

        $RegionPointController = new RegionPointController();
        $RegionPointController->validateRequest($request);
        
        $partner = Partner::create([
            'company_name' => $request->company_name,
            'name' => $request->name,
            'about' => $request->about,
            'trade_registry' => $request->trade_registry,
            'ice' => $request->ice,
            'tax_id' => $request->tax_id,
            ]);

        $address = Address::create([
            'address' => $request->address,
            'address_two' => $request->address_two,
            'full_name' => $request->full_name,
            'country' => $request->country,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'addressable_type' => 'partner',
            'addressable_id' => $partner->id,
        ]);

        if($request->hasFile('path')) 
        {
            $picture = Picture::create([
                'name' => $request->company_name,
                'tag' => "partner_avatar",
                'path' => $request->file('path')->store('images/partners', 'public'),
                'extension' => $request->file('path')->extension(),
                'pictureable_type' => 'partner',
                'pictureable_id' => $partner->id,
            ]);
        }
        

        foreach($request->number as $key => $number)
        {
            if($number != null)
            {
                $phone = Phone::create([
                    'number' => $number,
                    'type' => 'fix',
                    'code_country_id' => $request->code_country[$key],
                    'phoneable_type' => 'partner',
                    'phoneable_id' => $partner->id,
                ]);
            }
        }

        if($request->fax_number)
            {
                $phone = Phone::create([
                    'number' => $request->fax_number,
                    'type' => 'fax',
                    'code_country_id' => $request->code_country[2],
                    'phoneable_type' => 'partner',
                    'phoneable_id' => $partner->id,
                ]);
            }

        $region = Region::create([
            'name' => $request->zone,
            'partner_id' => $partner->id,
        ]);
        foreach($request->region_points as $region_point)
        {
            if($region_point)
            {$point = explode(',', $region_point);
                RegionPoint::create([
                    'longitude' => $point[0],
                    'latitude' => $point[1],
                    'region_id' => $region->id,
                ]);
            }
        }

        $password = bcrypt($request->password);
        $name = str_before($request->email, '@');
        while(PartnerAccount::where('name', $name)->first()){
            $name = $name.'_'.rand(0,9);
        }
        $partner_account = PartnerAccount::create([
            'email' => $request->email,
            'password' => $password,
            'name' => $name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'partner_id' => $partner->id,
        ]);
        auth()->guard('partner-account')->login($partner_account);
        return redirect('/');
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
