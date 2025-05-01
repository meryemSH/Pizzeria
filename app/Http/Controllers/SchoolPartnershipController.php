<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolPartnership;
use App\Enums\SchoolPartnershipEnums;

class SchoolPartnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partenaires = SchoolPartnership::published()
            ->where('status', SchoolPartnershipEnums::accepted)
            ->orderBy('published_at', 'desc')
            ->get();

        return view('SchoolPartnership.nos-partenaire', compact('partenaires'));
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
    public function show(SchoolPartnership $schoolPartnership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolPartnership $schoolPartnership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolPartnership $schoolPartnership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolPartnership $schoolPartnership)
    {
        //
    }
}
