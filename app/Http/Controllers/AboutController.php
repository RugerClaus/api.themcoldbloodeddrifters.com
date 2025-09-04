<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BandMembers;
use App\Models\Band;

class AboutController extends Controller
{
    public function load_about_data()
    {
        $band = Band::first();
        $members = BandMembers::all();

        return response()->json([
            "status" => "success",

            'members' => $members->map(fn($m) => [
                'name' => $m->name,
                'instrument' => $m->instrument,
                'bio' => $m->bio,
                'portrait' => $m->portrait
            ]),
            'theband' => [
            'name' => $band->name,
            'band_list_left_to_right' => $band->band_list_left_to_right,
            'bio' => $band->bio,
            'image' => $band->image,
            'imgalt' => $band->image_alt
            ]
        ]);
    }
}
