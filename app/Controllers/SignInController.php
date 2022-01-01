<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
 //  session_start();
 
 
class SigninController extends Controller
{   
    public function index()
    {
        
        helper(['form']);

        echo view('signin');
    } 
  
 
    public function loginAuth()
    { 
        $session = session();

        $userModel = new UserModel();

        $Username = $this->request->getPost('userName');
        $password = $this->request->getPost('password');
        
        $data = $userModel->where('userName', $Username)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'full_name' => $data['fullName'],
                    'user_name' => $data['userName'],
                    'isLoggedIn' => TRUE,
                   // 'account_type' => $data['role'], 
                ];
$_SESSION['userid']=$data['id']; $_SESSION['LoggedIn']=true; 
$_SESSION['account_type']=$data['role'];

                $session->set($ses_data);
                return redirect()->to('/artist-list');
            
            }else{
                $session->setFlashdata('msg', 'Sorry, we could not find an account with this username.
                 Please check you are using the right username and try again..');
                return redirect()->to('/signin');
            }

        }else{
            $session->setFlashdata('msg', 'User-name does not exist.');
            return redirect()->to('/signin');
        }
    }
   
   public function logout()
    {        helper(['form']);

        session_start();
        $_SESSION["LoggedIn"] = false;        
        redirect('signin');

    }

}