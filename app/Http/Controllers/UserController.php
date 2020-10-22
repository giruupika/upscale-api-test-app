<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Candra\UpscaleApiIntegration\UpscaleApiIntegration;

class UserController extends Controller
{
	//	Sementara disimpan disini, untuk di parsing ke package
	private $apiUrl = 'https://jsonplaceholder.typicode.com/users';

	//	Default, show all data
    public function index() 
    {
		$apiData 	= new UpscaleApiIntegration($this->apiUrl);
	    $users 	 	= $apiData->getAll();

	    return view('index', ["users" => $users]);
    }

    // Get user by id
    public function detail($userId)
    {
		$apiData 	= new UpscaleApiIntegration($this->apiUrl);
	    $user 		= $apiData->getSpecific($userId);

	    return view('detail', ["user" => $user]);
    }

}
