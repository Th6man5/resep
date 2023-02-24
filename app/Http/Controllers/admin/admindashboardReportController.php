<?php

namespace App\Http\Controllers\Admin;

use App\Models\Recipe;
use App\Models\Report;
use Illuminate\Http\Request;

class admindashboardReportController
{
    public function index()
    {
        $report = Report::with('recipe', 'user')->paginate(9)->fragment('report');

        return view('dashboard.admindashboard.report.index', [
            'title' => 'Report List',
            'report' => $report,
        ]);
    }

    public function destroy(Report $report)
    {

        $report->delete();
        return redirect('admin/dashboard/report')->with('success', 'report is successfully deleted');
    }

    public function destroyWithRecipe($id)
    {
        $report = Report::findOrFail($id);
        $recipe = $report->recipe;

        // Delete all reports related to the recipe being deleted
        Report::whereHas('recipe', function ($query) use ($recipe) {
            $query->where('id', $recipe->id);
        })->delete();

        $recipe->delete();
        $report->delete();

        return redirect()->back()->with('success', 'Report and recipe deleted successfully!');
    }
}
