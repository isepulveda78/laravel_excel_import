<?php

namespace App\Imports;

use App\File;
use Throwable;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Illuminate\Support\Facades\Hash;

class UsersImport implements 
ToModel, 
WithHeadingRow, 
SkipsOnError, 
WithValidation, 
SkipsOnFailure,
WithBatchInserts,
WithChunkReading
{
    use Importable, SkipsErrors, SkipsFailures;

    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
            return new File([
                'user_id' => $row['user_id'],
                'style' => $row['style'],
                'upc' => $row['upc'],
                'total' => $row['total'],
                'retail' => $row['retail'],
                'total_cost' => $row['total_cost'],
                'total_wholesale' => $row['total_wholesale'],
                'sales' => $row['sales'],
                'sell_through' => $row['sell_through'],
                'ranking' => $row['ranking'],
                'season' => $row['season'],
            ]);
        
      }

        public function rules(): array
        {
            //Used with WithValidation
            return [
                '*.user_id' => 'required',
                '*.style' => 'required',
                '*.upc' => 'required',
                '*.total' => 'required',
                '*.retail' => 'required',
                '*.total_cost' => 'required',
                '*.total_wholesale' => 'required',
                '*.sales' => 'required',
                '*.sell_through' => 'required',
                '*.ranking' => 'required',
                '*.season' => 'required',
            ];
        }

        public function onFailure(Failure ...$failures)
        {
            session()->flash('alert', 'Check Headers');
            return back();
        }
    
        public function onError(\Throwable $e)
        {
            dd($e);
        }

        public function batchSize(): int
        {
            return 1000;
        }
        public function chunkSize(): int
        {
            return 1000;
        }
}
