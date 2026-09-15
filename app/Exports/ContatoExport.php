<?php

namespace App\Exports;

use App\Models\Contato;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContatoExport implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        return Contato::all();
    }

    public function map($contato): array
    {
        return [
            $contato->id,
            $contato->nome,
            $contato->email,
            $contato->telefone,
            $contato->assunto,
            $contato->mensagem,
            $contato->situacao,
            $contato->created_at,
        ];
    }

    public function headings(): array
    {
        return ['#', 'Nome', 'Email', 'Telefone', 'Assunto', 'Mensagem', 'Situação', 'Data'];
    }
}
