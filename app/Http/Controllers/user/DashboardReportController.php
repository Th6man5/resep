<?php

namespace App\Http\Controllers\User;

use App\Models\Recipe;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class DashboardReportController extends Controller
{

    public function index()
    {
        $recipeIds = Recipe::where('user_id', auth()->user()->id)->pluck('id');

        $saved = Bookmark::whereIn('recipe_id', $recipeIds)
            ->whereHas('user', function ($query) {
                $query->where('id', '<>', auth()->id());
            })
            ->with('user', 'recipe')
            ->get()
            ->groupBy('recipe_id')
            ->map(function ($bookmarks) {
                return [
                    'recipe' => $bookmarks->first()->recipe,
                    'savedBy' => $bookmarks->pluck('user')->unique(),
                ];
            });

        return view('dashboard.userdashboard.report.index', [
            'title' => 'Report',
            'active' => 'report',
            'saved' => $saved,
            'recipe' => Recipe::where('user_id', auth()->user()->id)->orderBy('reads', 'DESC')->paginate(15)->onEachSide(1)->fragment('recipe'),
            'view' => Recipe::where('user_id', auth()->user()->id)->sum('reads')
        ]);
    }

    public function downloadPDF()
    {
        $recipeIds = Recipe::where('user_id', auth()->user()->id)->pluck('id');

        $saved = Bookmark::whereIn('recipe_id', $recipeIds)
            ->whereHas('user', function ($query) {
                $query->where('id', '<>', auth()->id());
            })
            ->with('user', 'recipe')
            ->get()
            ->groupBy('recipe_id')
            ->map(function ($bookmarks) {
                return [
                    'recipe' => $bookmarks->first()->recipe,
                    'savedBy' => $bookmarks->pluck('user')->unique(),
                ];
            });

        $recipe = Recipe::where('user_id', auth()->user()->id)->orderby('reads', 'DESC')->get();
        $view = Recipe::where('user_id', auth()->user()->id)->sum('reads');

        $pdf = PDF::loadView('pdf.report', [
            'recipe' => $recipe,
            'view' => $view,
            'saved' => $saved,
        ]);

        $filename = 'recipe-report.pdf'; // customize the filename

        // return the PDF with headers to download the file and save it
        return $pdf->stream();
        // return $pdf->download($filename, [
        //     'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        // ]);
    }
}
