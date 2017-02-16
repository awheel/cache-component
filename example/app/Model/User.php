<?php

namespace App\Model;

use light\MedooModel\MedooModel;

/**
 * User Model
 *
 * @package App\Model
 */
class User extends MedooModel
{
    public $database = 'light';
    public $table = 'user';
    public $primary = 'id';
    public $timestamps = true;

    /**
     * get user info
     *
     * @param $user_id
     *
     * @return mixed
     */
    public function info($user_id)
    {
        $cacheKey = 'light:server:user:info:'.$user_id;
        $info = json_decode(app('cache')->get($cacheKey), true);

        if ($info && is_array($info)) {
            return $info;
        }

        $info = $this->get('*', ['id' => $user_id]);
        app('cache')->set($cacheKey, json_encode($info), 60);

        return $info;
    }
}
