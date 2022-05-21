<?php


namespace App\Services;

use App\Repositories\FileRepository;
use Illuminate\Support\Facades\Storage;
use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\Validator;

class FileService
{
    protected $fileRepository;
    /**
     * @return mixed
     */
    public function __construct(FileRepository $fileRepository)
    {
        $this->fileRepository = $fileRepository;

    }

    public function create(){

    }

    public function upload($files, $user){

        foreach ($files as $file) {
            $path = Storage::putFile($user->directory, $file, '');
            $size = number_format(Storage::size($path) / 1048576,2);

            $data = array(
                'name' => basename($path),
                'user_id' => $user->id,
                'path' => $path, //Storage::url(
                'size' => $size,
                'type' => '1',
                'file_uploaded_at' => now()->toDateTime(),
            );

            $this->fileRepository->save($data);
        }
    }
    public function getFileByid($id){
        return $this->fileRepository->getFileByid($id);
    }

    public function getFiles($id){
        return $this->fileRepository->getFiles($id);
    }

    public function update($id){
        return $this->fileRepository->delete($id);
    }
    
    public function delete($id){
        return $this->fileRepository->delete($id);
    }

}

