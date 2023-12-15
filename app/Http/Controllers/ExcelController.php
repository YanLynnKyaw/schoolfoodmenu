<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\DataExport;
use App\Models\Food;

class ExcelController extends Controller
{
    public function downloadExcel()
    {
        // Fetch your data (replace this with your actual data retrieval logic)
        $data = DB::select('SELECT * FROM food');

        // Export data to Excel using Laravel Excel
        return Excel::download(new DataExport($data), 'data.xlsx');
    }
}
