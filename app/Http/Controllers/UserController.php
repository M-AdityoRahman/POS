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
    UserModel::where('username', 'manager_tiga')->delete();
    UserModel::create($data);

    $user = UserModel::where('username', 'manager9')->firstOrFail();

    return view('user', ['data' => $user]); 
}

}

