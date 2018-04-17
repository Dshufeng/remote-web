<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class GuacController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function generateToken(Request $request){
        $input = $request->request->all();
        $config = [
            "connection"=>[
                "type"=>$input['protocol'],
                "settings"=>[
                    'username'=>$input['user'],
                    "hostname"=>$input['hostname'], // the vnc server ip
                    "port"=>$input['port'],				// the vnc server port
                    "password"=>$input['password']   // the vnc server psssword
                ]
            ]
        ];

        $iv= substr(md5("cepo"),8,16);
        $value = \openssl_encrypt(
            json_encode($config),
            'AES-256-CBC',
            'MySuperSecretKeyForParamsToken12',
            0,
            $iv
        );

        if ($value === false) {
            throw new \Exception('Could not encrypt the data.');
        }

        $data = [
            'iv' => base64_encode($iv),
            'value' => $value,
        ];

        $json = json_encode($data);

        if (!is_string($json)) {
            throw new \Exception('Could not encrypt the data.');
        }

        // you token
        return base64_encode($json);
    }
    //
}
