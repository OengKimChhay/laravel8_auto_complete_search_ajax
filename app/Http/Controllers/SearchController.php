<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('search');
    }
 
    /**
     * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function autocomplete(Request $req){
        if($req->ajax()){
            $data = Item::where('name', 'LIKE','%'.$req->searchData.'%')->get();
            if(count($data)>0){
                $output = '<div class="lists" style="padding:5px;">';
                foreach($data as $row){
                $output .= '<a href="#" style="text-decoration:none;">'.$row->code. " ".$row->name.'</a><br>';
                }
                $output .= '</div>';
                return $output;
            }else{
                return " "; //check ប្រសិនបើគ្មាន data ក្នុង database te
            }
        }
    }
}
