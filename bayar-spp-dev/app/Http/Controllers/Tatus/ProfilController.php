<?php

namespace App\Http\Controllers\Tatus;

use App\Http\Controllers\Controller;
use App\Models\Tatus;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function edit(Tatus $tatus)
    {
        return view('tatus/profil/form', [
            'tatus' => $tatus,
            'title' => 'Edit Pengguna'
        ]);
    }

    public function update()
    {
    }
}
