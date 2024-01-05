<?php

namespace App\Exports;


use App\Models\late;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentExports implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        
        $groupedData = late::with('student')->get()->groupBy('student_id');

       
        $resultCollection = collect();

        foreach ($groupedData as $studentId => $lateData) {
            $totalKeterlambatan = $lateData->count();
            $firstLateData = $lateData->first(); 

            $resultCollection->push([
                'NIS' => $firstLateData->student->nis,
                'Nama' => $firstLateData->student->name,
                'Rombel' => $firstLateData->student->rombel->rombel,
                'Rayon' => $firstLateData->student->rayon->rayon,
                'Total Keterlambatan' => $totalKeterlambatan,
            ]);
        }

        return $resultCollection;
    }

    public function headings(): array
    {
        return [
            "NIS", "Nama", "Rombel", "Rayon", "Total Keterlambatan"
        ];
    }

    public function map($item): array
    {
        return [
            $item['NIS'],
            $item['Nama'],
            $item['Rombel'],
            $item['Rayon'],
            $item['Total Keterlambatan'],
        ];
    }
}
