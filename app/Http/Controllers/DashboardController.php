<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

use App\Services\FileService;

class DashboardController extends Controller
{
    protected $fileService;
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
//    public function index(){
//
//        $lastTask = $this->taskService->getLastTasks(4);
//        $topTask = $this->taskService->getTopTasks(4);
//
//        return Inertia::render('Dashboard', [
//            'lastTask' => $lastTask,
//             'topTask' => $topTask
//        ]);
//    }

    public function indexBlock(){
        return Inertia::render('Block');
    }

    public function createFile(){

    }

    public function updateFile(){

    }

    public function uploadFile(Request $reguest){

        if($reguest->has('file')){
            $this->fileService->upload($reguest->file('file'),Auth::user());
        }
    }

    public function deleteFile(){

    }
    
}
