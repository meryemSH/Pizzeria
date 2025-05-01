<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lesson;
use App\Models\Workshop;
use Illuminate\Http\Request;
use App\Enums\WorshopsTypeEnums;

class WorkshopController extends Controller
{

    public function enligne(Request $request)
    {
        $query = Workshop::published();
        
        // Filtre par catégorie seulement si un ID valide est fourni
        if ($request->filled('category_id') && $request->category_id !== 'all') {
            $query->where('category_item_id', $request->category_id);
        }
        
        $workshopEnLignes = $query->get();
        $categories = Category::where('is_enabled', true)->get();
        
        return view('workshop.workshop-enligne', compact('workshopEnLignes', 'categories'));
    }

    // public function offline()
    // {
    //     $workshopOffline = Workshop::published()
    //         ->where('type', WorshopsTypeEnums::offline)
    //         ->get();

    //     return view('workshop.workshop-horsLigne', compact('workshopOffline'));
    // }
    public function enligneShow($slug)
    {
        $workshopEnLigne = Workshop::where('slug', $slug)->firstOrFail();
        $workshopEnLignes = Workshop::where('is_published', true)
            ->latest('publish_date')
            ->take(3)
            ->get();

            // $lessons = Lesson::where('is_published', true)
            //     ->where('published_at', '<=', now())
            //     ->where('workshop_id', $workshopEnLigne->id)
            //     ->get();

            // $OtherLessons = Lesson::where('is_free', false)
            // ->where('is_published', true)
            // ->where('published_at', '<=', now())
            // ->where('workshop_id', $workshopEnLigne->id)
            // ->get();

        return view('workshop.workshop-detail-enligne', compact('workshopEnLigne', 'workshopEnLignes'));
    }

    public function offlineShow($slug)
    {
        $workshopOffline = Workshop::where('slug', $slug)->firstOrFail();
        $workshopOfflines = Workshop::where('is_published', true)
         
            ->latest('publish_date')
            ->take(3)
            ->get();

        return view('workshop.workshop-detail-offline', compact('workshopOffline', 'workshopOfflines'));
    }
}
