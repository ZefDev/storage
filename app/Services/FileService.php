<?php


namespace App\Services;

use App\Repositories\FileRepository;
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

    public function create($id){
        return $this->fileRepository->delete($id);
    }

    public function update($id){
        return $this->fileRepository->delete($id);
    }
    
    public function delete($id){
        return $this->fileRepository->delete($id);
    }

}

