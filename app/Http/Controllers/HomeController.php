<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Workshop;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Enums\WorshopsTypeEnums;
use App\Models\SchoolPartnership;
use App\Enums\SchoolPartnershipEnums;

class HomeController extends Controller
{
    public function index()
    {
        $workshopEnLigne = Workshop::published()
                                   ->take(5)
                                   ->get();

        $workshopOffline = Workshop::published()
                                   ->take(3)
                                   ->get();

        $testimonials = Testimonial::limit(9)
                                    ->get();

        $partenaires = SchoolPartnership::published()
                                        ->where('status', SchoolPartnershipEnums::accepted)
                                        ->orderBy('published_at', 'desc')
                                        ->limit(4)
                                        ->get();

        $faqs = Faq::whereIsPublished(true)->limit(5)->get();

        return view('Home.home', compact('workshopEnLigne' , 'workshopOffline', 'testimonials','partenaires', 'faqs'));
    }




}
