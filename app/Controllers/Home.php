<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard Admin',
            // 'active' => 'active',
        ];
        return view('admin/home', $data);
    }

    public function dashboard(): string
    {
        $data = [
            'title' => 'Dashboard Dokter',
            // 'active' => 'active',
        ];
        return view('admin/home', $data);
    }
}
