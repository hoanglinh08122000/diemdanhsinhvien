<?php

namespace App\Imports;

use App\Models\Students;
use Maatwebsite\Excel\Concerns\ToModel;
use Classs;

class StudentsExcelClassImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $array= $array_filter($row);
        if (!empty($array)){
            $array=[
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'date' => date_format(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']),"Y/m/d"),
                'address' => $row['address'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'gender' => ($row['gender']=='nam') ? 1 : 0,
               // 'id_class' => Classs::firstOrCreate(['name_class'=>$row['name']])->id;

            ];
            return new Students($array);
        }
    }
}
