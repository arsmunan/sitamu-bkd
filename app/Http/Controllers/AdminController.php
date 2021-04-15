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
        //$data = Purpose::all();
        //$data = Guest::with(['purposes'])->get();
        $data = Purpose::with(['guests','fields','services'])->orderBy('created_at', 'DESC')->get();

        //$data = Guest::with(['fields','services'])->orderBy('created_at', 'DESC')->get();
        //$purposedata = Purpose::all();
        //$dataguest = Guest::find($purposedata->id);
        //$data = Guest::with(['fields','services'])->orderBy('created_at', 'DESC')->get();
        //$roles = App\Guest::find(1)->fields()->orderBy('created_at')->get();
        //$fields = Field::with(['services'])->orderBy('created_at', 'DESC')->get();
        //$fields = Field::all();
        // $data_guest = Guest::find($data->first()->id_guest);
        // $data_field = Field::find($data->first()->id_field);
        // return $data->first()->nama;
        //return view('data', compact('data','data_guest','data_field'));
        return view('admin.purpose.index', compact('data'));
        //return view('data');
        //return response()->json(['data' => $data]);
    }
}
