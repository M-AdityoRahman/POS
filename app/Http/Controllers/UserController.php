<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
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
            'nama' => 'Pelanggan Pertama',
        ];
        
        UserModel::where('username', 'customer-1')->update($data);


        $users = UserModel::all();
        return view('user', ['users' => $users]);
    }
}
