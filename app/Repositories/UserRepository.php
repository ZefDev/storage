<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getActiveUsers(){
        return $this->user->select()->where([
            ['isDelete','=',false],
        ])->orderBy('id', 'ASC')->get();
    }
    public function delete($id){
        $user = $this->user->find($id);
        $user->isDelete = true;
        $user->name = "Deleted User";
        $user->email = "Deleted User";
        return $user->save();
    }

    public function setBlock($id){
        $user = $this->user->find($id);
        $user->isBlock = !$user->isBlock;
        return $user->save();
    }

    public function setAdmin($id){
        $user = $this->user->find($id);
        $user->isAdmin = !$user->isAdmin;
        return $user->save();
    }
}
