<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\detailsModel;

class detailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AllDetails = detailsModel::all();
        return view('showDetails',compact('AllDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $details = detailsModel::find($id);
        if($request->Paidto != '' ){
        $details->PaidTo = $request->PaidTo;
        $details->PaidAt = $request->PaidAt;
        $details->save();    
        
        }
        return redirect('details');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
