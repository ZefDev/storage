<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Services\FileService;

class DashboardController extends Controller
{
    protected $fileService;
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function index(){

        $listFiles = $this->fileService->getFiles(Auth::user()->id);

        return Inertia::render('Dashboard', [
            'listFiles' => $listFiles,
        ]);
    }

    public function indexBlock(){
        return Inertia::render('Block');
    }

    public function createFile(){

    }

    public function listFile(){
        $listFiles = $this->fileService->getFiles(Auth::user()->id);
        return response()->json(['listFiles'=>$listFiles]);
    }

    public function downloadFile($id){
        $file = $this->fileService->getFileById($id);
        return Storage::download($file->path);
    }

    public function uploadFile(Request $reguest){

        if($reguest->has('file')){
            $this->fileService->upload($reguest->file('file'),Auth::user());
        }
    }

    public function deleteFile($id){
        return $this->fileService->delete($id);
    }
    
}
