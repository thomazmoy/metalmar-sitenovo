<?php

namespace App\Exports;

use App\Models\Newsletter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NewsletterExport implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        return Newsletter::all();
    }

    public function map($newsletter): array
    {
        return [
            $newsletter->id,
            $newsletter->email,
            $newsletter->situacao,
            $newsletter->created_at,
        ];
    }

    public function headings(): array
    {
        return ['#', 'Email', 'Situação', 'Data'];
    }
}
