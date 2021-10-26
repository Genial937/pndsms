<?php

namespace App\Imports;


use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $contacts = new Contact([
            'clientid' => Auth::user()->id,
            'name' => 'No Name',
            'email' => 'aicnandi@gmail.com',
            'phone' => '+254'.$row['phone'],
        ]);

        return $contacts;
    }
}
