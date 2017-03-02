<?php

class UserSeed
{
    public function run()
    {
        $user = new User();
        $user->username = 'Test User';
        $user->save();
    }
}
