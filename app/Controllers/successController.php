<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
//use App\Models\albumModel;

  
class SuccessController extends Controller
{
    public function index()
    {
        $session = session();
        session_start();

        if(!$_SESSION['LoggedIn']){
            return redirect()->to('/signin');
        } 
//        $album = new AlbumModel();

//        echo "Hello : ".$session->get('name');
//        echo view('artist-list');

        // $dataAll['allAlbum'] = $album->findAll(); 
        // echo view('artist-list', $dataAll);
        echo view('successPage');
 
    }


}
