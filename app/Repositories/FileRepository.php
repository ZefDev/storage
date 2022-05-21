<?php

namespace App\Repositories;

use App\Models\File;

class FileRepository{
    protected $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function save($data){
        $file = new $this->file;
        $file->name = $data['name'];
        $file->user_id = $data['user_id'];
        $file->path = $data['path'];
        $file->size = $data['size'];
        $file->file_uploaded_at = $data['file_uploaded_at'];
        return $file->save();
    }

    public function getFiles($id){

        return $this->file->select()->where([
            ['user_id', '=', $id]
        ])->get();

    }

    public function getFileById($id){
        return $this->file->find($id);
    }

}
