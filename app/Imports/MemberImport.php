<?php

namespace App\Imports;

use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class MemberImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Member([
            //
                'id'     => $row[0],
                'name'    => $row[1], 
                'email'    => $row[2], 
                'password' => Hash::make($row[3]),
                'role'    => $row[4],
                'foto'    => $row[5],
             ]);
    }
}
