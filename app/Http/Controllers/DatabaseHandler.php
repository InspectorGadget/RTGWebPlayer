<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseHandler extends Controller
{

    public function storeVideoData(array $data): bool {
        $result = DB::table(env("DB_VIDEO"))
            ->insert($data);

        return $result ? true : false;
    }

}
