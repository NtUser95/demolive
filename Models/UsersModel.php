<?php

namespace Models;

use App\App;
use App\Model;
use App\User;

class UsersModel extends Model
{
    public function getUsers(int $limit = 50) : array
    {
        $users = [];
        $query = 'SELECT * FROM cities JOIN users USING(city_id) LIMIT ' . $limit;
        $data = App::$db->execute($query);
        foreach ($data as $user_data) {
            $user = new User();
            $user->setName($user_data['name']);
            $user->setAge($user_data['age']);
            $user->setCityName($user_data['city_name']);
            $users[] = $user;
        }

        return $users;
    }
}