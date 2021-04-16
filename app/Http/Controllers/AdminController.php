<?php
namespace App\Http\Controllers;
use App\Guest;
use App\Field;
use App\Purpose;
use App\Service;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $data = Purpose::with(['guests','fields','services'])->orderBy('created_at', 'DESC')->get();
        return view('admin.purpose.index', compact('data'));
    }
}
