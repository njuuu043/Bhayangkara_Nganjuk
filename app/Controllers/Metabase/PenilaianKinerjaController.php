<?php

namespace App\Controllers\Metabase;

use Firebase\JWT\JWT;
use App\Controllers\BaseController;
use App\Models\KPI\PenilaianKinerjaModel;

class PenilaianKinerjaController extends BaseController
{
    protected $PenilaianKinerja;
    public function __construct()
    {
        $this->PenilaianKinerja = new PenilaianKinerjaModel();
    }
    public function dashboard()
    {
        if(isset($_GET['periode'])){
            $filter = intval($_GET['periode']);
        }else{
            $filter = (int)date('Y');
        }
        $metabaseSiteUrl = getenv('api.Metabase');
        $metabaseSecretKey = getenv('api.Key.Metabase');
        $payload = [
            'resource' => ['dashboard' => 12],
            'params' => (object)['tahun' => $filter],
            'exp' => time() + (10 * 60)
        ];
        $token = JWT::encode($payload, $metabaseSecretKey, 'HS256');
        $iframeUrl = "{$metabaseSiteUrl}/embed/dashboard/{$token}#theme=transparent&bordered=false&titled=false";
        $data = [
            'title' => 'Dashboard',


        ];
        return view('user/home', $data);
    }
}
