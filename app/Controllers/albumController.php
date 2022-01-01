<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\albumModel;


  
class albumController extends Controller
{
    public function index()
    {
        $session = session();
        session_start();
//$user_id = $_SESSION['user_id'];
        if(!$_SESSION['LoggedIn']){
            return redirect()->to('signin/');
        }  
        $album = new AlbumModel();
        $userId_Ses= $_SESSION['userid']; 
$account_type = $_SESSION['account_type'];

if($account_type == "User"){
        $data['album'] = $album->where('user_id', $userId_Ses)->find();
        echo view('manageAlbum', $data);
       // echo view('manageAlbum');
}
else{
    $dataAll['album'] = $album->findAll(); 
    echo view('manageAlbum', $dataAll);

}


    }

    public function upload()
    { 
        helper(['form']);
        $rules = [
            'artist'          => 'required',
            'album'         => 'required',
            'year'      => 'required',
            

        ];
          
//        if($this->validate($rules)){
            $userModel = new AlbumModel(); 
            $data = [
                'artist'     => $this->request->getPost('artist'),
                'album'    => $this->request->getPost('album'),
                'year' => $this->request->getPost('year'),
                'created_at' => date('Y-m-d H:i:s'),
                'approve'=>0,  
                'user_id'=> $this->request->getPost('test'),
            ];
//var_dump($data);
if( $userModel->save($data)){
             echo 
"<center>Successfully uploaded, Admin will review, stay connected.<br>
<a href='http://localhost:8080/manageAlbum'><button>Upload More!</button></a> </center>"             
             ;
 }
else{
    echo '
    <script type="text/javascript">alert("Ops!! some tech issue.");</script>
    ';
}


        // }else{
        //     $data['validation'] = $this->validator;
        //     echo '
        //     <script type="text/javascript">alert("Kindly fill fields of form properly");</script>
        //     ';
        // }
          
    }
  
public function approval($post_id = null)
{
        helper(['form']);
    $approvalModel = new AlbumModel(); 
    $dataApprove = [
'approve'    => 1,

    ];

    $approvalModel->update($post_id, $dataApprove);

    return view('successPage');

}

public function delete($post_id = null){ print('wjbfj');
    helper(['form']);
    $deleteModel = new AlbumModel(); 
$deleteModel->delete($post_id);
return redirect()->back()->with('status', 'Post deleted successfully');
}

}