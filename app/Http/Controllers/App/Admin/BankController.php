<?php
namespace App\Http\Controllers\App\Admin;

use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;
 use App\Models\Admin;
 use App\Models\Bank;
 use App\Models\TelvidaBank;
 use Auth;


Class BankController extends Controller{

public function __construct()
    {
        $this->middleware('auth:admin');
    }

 public function index()
 {
 	$banks = Bank::all();
 	return view('app.admin.bank.index',compact('banks'));	
 }

 public function create(){

 	return view('app.admin.bank.create',compact('banks'));
 }


 public function store(Request $request){


   $this->validate($request, 
      [
            'bankName' => 'required|max:50|unique:banks,name',
            'accountNumber' =>'required|digits:10',
            'sortcode' => 'required|digits:9',
            ]);

       /*	$bank = new bank;

       	$bank->name = $request->input('bankName');

       	$bank->account_number = $request->input('accountNumber');

        $bank->sort_code = $request->input('sortcode');

       	$bank->save();*/


       /*  $this->validate($request, [
            'bankName' => 'required',
            'accountNumber' => 'required|string|max:255',
            'sortcode' => 'required|integer|max:10',
        ]);*/

        $data = $request->all();

        //return dd($data);

        Bank::create([
            'name' => $data['bankName'],
            'account_number' => $data['accountNumber'],
            'sort_code' => $data['sortcode'],
        ]);

 	return redirect('/admin/bank/index')->with('flash_message', 'Bank added');
 }

 public function edit($id)
    {




        $admin = Admin::where('id',Auth::user()->id)->first();
        $bank = Bank::find($id);
       
        return view('app.admin.bank.edit', compact('admin','bank'));
    }


     public function update(Request $request, $id)
    {

        

         $bank = Bank::find($id);
         //return dd($telvidaBank);
          $bank->name = $request->input('bankName');
          $bank->account_number = $request->input('accountNumber');
          $bank->sort_code = $request->input('sortcode');
          $bank->update();
         
        return redirect('/admin/bank/index')->with('flash_message', 'update Successful');
    }



}