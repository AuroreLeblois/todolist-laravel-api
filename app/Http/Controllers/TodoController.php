<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class TodoController extends Controller {

    /**
    * Instantiate a new controller instance.
    *
    * @return void
    */
    public function __construct(Request $request) {


    }
    /**
    * Endpoint call API for synchronizations POST and GET
    * @param  Request $request
    * @return json response
    */
   public function get(Request $request) {
     $response=[];
       try {
           // Récupération des actions non traitées
           $todoList = DB::select('SELECT * FROM task ORDER BY id');

           $response = ['success' => true, 'todoList' => $todoList];
       } catch (Exception $e) {
           $response = ['success' => false, 'message' => $e->getMessage(), 'line' => $e->getLine()];
       }
       return response()->json($response, 200);
   }
}
