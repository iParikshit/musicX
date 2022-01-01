<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SignupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('signup', $data);
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'fullName'          => 'required|min_length[2]|max_length[50]',
            'userName'         => 'required|min_length[4]|max_length[100]|is_unique[users.userName]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]',
            'role' => 'required|',
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();

            $data = [
                'fullName'     => $this->request->getPost('fullName'),
                'userName'    => $this->request->getPost('userName'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'=> $this->request->getPost('role'),
                'created_at' => date('Y-m-d H:i:s'),
                // $this->load->helper('date'),

            ];
//var_dump($data);
if( $userModel->save($data)){
             echo view('signupAlert');


}
else{
print('Ops Something Went Wrong !!! try again next later.');
}


        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
          
    }
  
}