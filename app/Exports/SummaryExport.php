<?php

namespace App\Exports;

use App\Models\DineinOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SummaryExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $totalorders;
    protected $totalamount;
    protected $totalcashamount;
    protected $totalcardamount;

    public function __construct($totalorders, $totalamount, $totalcashamount, $totalcardamount)
    {
        $this->totalorders = $totalorders;
        $this->totalamount = $totalamount;
        $this->totalcashamount = $totalcashamount;
        $this->totalcardamount = $totalcardamount;
    }

    public function collection()
    {
        $data = [
            [
                'Total Orders' => $this->totalorders,
                'Total Amount' => $this->totalamount,
                'Total Cash Amount' => $this->totalcashamount,
                'Total Card Amount' => $this->totalcardamount,
            ]
        ];
        return collect($data);
    }
    public function headings(): array
    {
        // Return the headings for your columns
        return [
            'Total Orders',
            'Total Amount',
            'Total Cash Amount',
            'Total Card Amount',
        ];
    }
}
