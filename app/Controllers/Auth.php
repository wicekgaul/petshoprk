<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DokterModels;
use App\Models\UserModels;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{

    protected $User;
    protected $dokter;
    public function __construct() {
        $this->User = new UserModels();
        $this->dokter = new DokterModels();
    }

    public function index()
    {
        $User = $this->User->where('Username', 'admin')->first();
        if (!$User) {
            $this->User->insert([
                'Username' => 'admin',
                'Password' => Password_hash('admin123', PASSWORD_DEFAULT),
                'Email' => 'admin@gmail.com',
                'Role' => 'admin'
            ]);
        }
        return view('layout/login');
    }

    public function login()
    {
                $Username = $this->request->getVar('Username');
                $Password = $this->request->getVar('Password');
                
                $user = $this->User->where('Username', $Username)->first();

    
                if ($user) {

                    // cara 1 
                    // $pass = $user['Password'];
                    // $cekpassword = password_verify($Password, $pass);
                    // if ($cekpassword) {
                    //     $cekdata = [
                    //         'User_id' => $user['User_id'],
                    //         'Username' => $user['Username'],
                    //         'Role' => $user['Role'],
                    //         'Email' => $user['Email'],
                    //         'login' => TRUE
                    //     ];
                    //     session()->set($cekdata);

                    // cara 2
                    $User_id = $user['User_id'];
                    // Cari data dokter berdasarkan User_id
                    $dokter = $this->dokter->where('User_id', $User_id)->first();;
                    // Debug hasil dokter
                    // dd($dokter->Dokter_id);

                    // $user = $this->User->where('Username', $Username)->first();
                    if (Password_verify($Password, $user['Password'])) {
                        if(!isset($dokter->Dokter_id)){
                            session()->set('user', [
                                'User_id' => $user['User_id'],
                                'Username' => $user['Username'],
                                'Role' => $user['Role'],
                                'Email' => $user['Email'],
                                'login' => TRUE
                            ]);
                        }else{
                            session()->set('user', [
                                'User_id' => $user['User_id'],
                                'Dokter_id' => $dokter->Dokter_id,
                                'Nama' => $dokter->Nama,
                                'Username' => $user['Username'],
                                'Role' => $user['Role'],
                                'Email' => $user['Email'],
                                'login' => TRUE
                            ]);
                        }

                        if ($user['Role'] === 'admin') {
                            return redirect()->to('/Home');
                        } else {
                            return redirect()->to('/Dashboard');
                        }
                    } else {
                        return redirect()->back()->with('error', 'Password salah');
                    }
                } else {
                    return redirect()->back()->with('error', 'Usenamrtidak ditemukan');
                }
        return view('layout/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');

}
}