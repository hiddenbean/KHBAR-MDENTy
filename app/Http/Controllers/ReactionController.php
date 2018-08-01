<?php

namespace App\Http\Controllers;

use App\Khbar;
use App\Reaction;
use DateTime;
use App\PartnerAccount;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ReactionController extends Controller
{
    public function validateRequest(Request $request)
    {
    $request->validate([
        'khbar_id' => 'required',
        ]);
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name,$khbar)
    {
        $data['reactions'] = Reaction::where('khbar_id',$khbar)->get();
        // return $data['reactions'];
        return view('test',$data);
    }

    public function index2($subdomain, $khbar)
    {
        $khbar = Khbar::where('name', $khbar)->firstOrFail();
        $reactions = Reaction::where('khbar_id', $khbar->id)->where('reaction_id', null)->get();
        // if($reactions)
        // {
        //     $reactions = $this->sortReactions($reactions);
        // }
        return $reactions;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function show(Reaction $reaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Reaction $reaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reaction $reaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reaction $reaction)
    {
        //
    }

    public function sortReactions($reactions)
    {
        for($i = 0; $i<count($reactions); $i++)
        {
            for($j=0; $j<count($reactions)-1; $j++)
            {
                return $reactions[$j]->children ;$reaction1_trendance = $this->calculeTrendance($reactions[$j]);
                return $reactions[$j+1]->children;$reaction2_trendance = $this->calculeTrendance($reactions[$j+1]);
                if($reaction2_trendance > $reaction1_trendance)
                {
                    $var = $reaction[$j];
                    $reactions[$j] = $reactions[$j+1];
                    $reactions[$j+1] = $var;
                    $j--;
                }
            }
            if($j == count($reactions) )
            {
                break;
            }
        }
        return $reactions;
    }

    public function calculeTrendance($reaction)
    {
        $reaction_trendance = 0;
        if($reaction->children)
        {
            return 'hi';
        }
        $date = date('Y-m-d H:i:s', strtotime(date_format(new DateTime(), 'Y-m-d')));
        $diff = date(strtotime($date)-strtotime(date_format($reaction->created_at, 'Y-m-d')));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $reaction_trendance;
    }
}
