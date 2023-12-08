<?php

namespace App\Controllers;
use App\Models\newModel;

class mainController extends BaseController {

    protected $firstModel;
    public function __construct(){
        $this->newModel = new newModel();
    }
    public function test(): string{

        $result = $this->newModel->initialize();
        return view('view',['data' => $result]);
    }

    public function create_stud(){
        return view('create');
    }

    public function save_student(){

        $data = [
            'fname' => htmlspecialchars($this->request->getPost('stud_fname'), ENT_QUOTES),
            'lname'  =>htmlspecialchars($this->request->getPost('stud_course'), ENT_QUOTES),
            'department' =>htmlspecialchars($this->request->getPost('student_department'), ENT_QUOTES),
            'course'  =>htmlspecialchars($this->request->getPost('stud_course'), ENT_QUOTES),
        ];

        $this->newModel->save_student($data);
        return redirect()->to('/create');
    }
    public function delete_student($id){
        $this->newModel->delete_student($id);
        return redirect()->to('/view');
    }

    public function edit_student($id){
        $result =  $this->newModel->get($id);
        print_r($result);
        return view('editAugh', ['data' => $result]);
    }

    public function save(){

        $data = [
            'id' => $this->request->getPost('idstudents'),
            'fname' => htmlspecialchars($this->request->getPost('stud_fname'), ENT_QUOTES),
            'lname' => htmlspecialchars($this->request->getPost('stud_fname'), ENT_QUOTES),
            'department' =>htmlspecialchars($this->request->getPost('student_department'),ENT_QUOTES),
            'course'  =>htmlspecialchars($this->request->getPost('stud_course'), ENT_QUOTES),
        ];
        $this->newModel->save_student($data);
        return redirect()->to('/view');
    }
}
