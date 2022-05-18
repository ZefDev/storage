<?php

namespace App\Repositories;

use App\Models\File;

class FileRepository{
    protected $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function save($id){
//        $user = $this->user->find($id);
//        $user->isDelete = true;
//        $user->name = "Deleted User";
//        $user->email = "Deleted User";
//        return $user->save();
    }

}
