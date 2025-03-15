<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function profile($id, $name)
    {
        return view('user', ['id' => $id, 'name' => $name]);
    }

    public function index()
{
    $data = [
        'level_id' => 2,
        'username' => 'manager_tiga',
        'nama' => 'Manager 3',
        'password' => Hash::make('12345')
    ];

    // Gunakan updateOrCreate agar tidak menambah data duplikat
    UserModel::updateOrCreate(
        ['username' => 'manager_tiga'], 
        $data
    );

    // Hitung jumlah user dengan level_id = 2
    $userCount = UserModel::where('level_id', '2')->count();

    return view('user', ['data' => $userCount]); 
}


}

