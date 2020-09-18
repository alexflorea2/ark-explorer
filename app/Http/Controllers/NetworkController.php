<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

class NetworkController extends BaseController
{
    public function changeNetwork(Request $request)
    {
        $currentNetwork = session('ARK_NET') ?? env('ARK_NET', 'main');
        $network = $request->get('network');

        if (in_array($network, ['main', 'dev'])) {
            $currentNetwork = $network;
        } else {
            if ($currentNetwork == 'main') {
                $currentNetwork = 'dev';
            } else {
                $currentNetwork = 'main';
            }
        }

        session(['ARK_NET' => $currentNetwork]);

        return response()->json(['network' => $currentNetwork]);
    }
}
