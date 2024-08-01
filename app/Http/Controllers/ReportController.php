<?php

namespace App\Http\Controllers;

use App\Http\Services\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(ReportService $reportService, Request $request) {
        $request->dump();
        $report = $reportService->createReport();

        // return view('report.index');
    }

    public function exportToExcel(ReportService $reportService) {

        $report = $reportService->createReport();

        return $report;

    }
}
