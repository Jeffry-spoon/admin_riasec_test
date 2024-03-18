<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ExportResult implements FromView
{
    protected $stackings;

    // Konstruktor untuk menerima variabel $stackings
    public function __construct($stackings)
    {
        $this->stackings = $stackings;
    }

    public function view(): View
    {
        // Mengirimkan data $stackings ke view 'components.table.resultTable'
        return view('components.table.resultTable', ['stackings' => $this->stackings]);
    }
}
