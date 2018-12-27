<?php

namespace App\Http\Controllers\App\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Tenant;
use App\Models\ClientProfile;
use Auth;
class PlanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('app.admin.plan.index', compact('plans'));
    }

  

    public function create()
    {

    return view('app.admin.plan.create');
    
    }

    public function store(Request $request){


     $this->validate($request, 
      [
            'name' => 'required|max:50|unique:plans,name',
            'amount' => 'required|numeric',
            'offers' =>'required|max:255',
            ]);


        $data = $request->all();

        //return dd($data);

        Plan::create([
            'name' => $data['name'],
            'amount'=>$data['amount'],
            'offers' => $data['offers'],
        ]);

    return redirect('/admin/plan/index')->with('flash_message', 'plan added');
 }
     public function edit($id)
    {
         $plan = Plan::find($id);       
       
            return view('app.admin.plan.edit', compact('plan'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'offers'  => 'required|string',
            
        ]);

        

        $plan = Plan::find($id);

        $data = array(
            'name' => $request->input('name'),
            'amount' => $request->input('amount'),
            'offers' => $request->input('offers')
         );
         
         Plan::where('id',$id)->update($data);

        $plan->update();

        return redirect('admin/plan/index')->with('flash_message', 'Plan Updated');
    }

      public function tenants()
    {
        $admin = Admin::where('id',Auth::user()->id)->first();
         $tenants = tenant::all();       
       
            return view('app.admin.tenants.index', compact('tenants','admin'));
    }

        public function activateTenant($id)
    {
         $tenant = Tenant::where('id',$id)->first();
        
         $tenant->status = '1';

        $tenant->update();

       return back()->with('flash_message', 'Activated');
            //return view('admin.tenants.index', compact('tenants','admin'));
    }


         public function deactivateTenant($id)
    {
       // $admin = Admin::where('id',Auth::user()->id)->first();
           $tenant = Tenant::where('id',$id)->first();
        
         $tenant->status = '0';

        $tenant->update();

       return back()->with('flash_message', 'Dectivated');
            //return view('admin.tenants.index', compact('tenants','admin'));
    }

     public function destroyTenant($id)
    {
        Tenant::where('id',$id)->delete();
         return redirect('/admin/tenants')->with('flash_message', 'deleted');
    }



      public function contentOwners()
    {
        $admin = Admin::where('id',Auth::user()->id)->first();
         $contentOwners = ClientProfile::join('users', 'client_profiles.id', '=', 'users.client_id')
    ->select('client_profiles.id', 'client_profiles.name', 'users.tenant_domain','users.email','client_profiles.status')->distinct()
    ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
    ->get();    
            return view('admin.contentowners.index', compact('contentOwners','admin'));
    }


         public function activateContentOwner($id)
    {
            $clientProfile = ClientProfile::where('id',$id)->first();
        
            $clientProfile->status = '1';

            $clientProfile->update();

            return back()->with('flash_message', 'Activated');
            //return view('admin.tenants.index', compact('tenants','admin'));
    }


         public function deactivateContentOwner($id)
    {
       // $admin = Admin::where('id',Auth::user()->id)->first();
            $clientProfile = ClientProfile::where('id',$id)->first();
        
            $clientProfile->status = '0';

            $clientProfile->update();

            return back()->with('flash_message', 'Dectivated');
            //return view('admin.tenants.index', compact('tenants','admin'));
    }

     public function destroyContentOwner($id)
    {
        ClientProfile::where('id',$id)->delete();
         return redirect('/admin/contentowners')->with('flash_message', 'deleted');
    }


}
