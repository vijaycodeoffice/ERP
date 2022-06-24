<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Products;
use App\Models\Sales;
use Illuminate\Support\Facades\DB;
use Session;
use Hash;
use Carbon\Carbon;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.signin');
    }  
      

    public function createSignin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Logged-in');
        }
    
        return redirect("login")->with('success','Credentials are wrong.');
       // return redirect("login")->withSuccess('Credentials are wrong.');
    }


    public function signup()
    {
        return view('auth.signup');
    }
      

    public function customSignup(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->createUser($data);
        return redirect("dashboard")->withSuccess('Successfully logged-in!');
    }


    public function createUser(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function dashboardView(User $user)
    {

        if(Auth::check()){

            $saleschart = Sales::select(\DB::raw("sum(net_amount) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');
		
            
            $salesmonth = Sales::select(\DB::raw("(DATE_FORMAT(`created_at`, '%M')) as month"))
            ->whereYear('created_at', date('Y'))
			->groupBy(\DB::raw("Month(created_at)"))
             ->pluck('month');
			 
		

            $productcount = DB::table('products')
            ->select(DB::raw('COUNT(id) AS totalproduct'))
            ->where('status', '1')->get();
           

            $totalsales = DB::table('sales')
            ->select(DB::raw('SUM(net_amount) AS tscount'))
            ->whereYear('created_at', date('Y'))
            ->pluck('tscount');
            $totalsalesr = DB::table('salesreturns')
            ->select(DB::raw('SUM(sale_return) AS tsrcount'))
            ->whereYear('created_at', date('Y'))
            ->pluck('tsrcount');


            $totalpurchases = DB::table('purchases')
            ->select(DB::raw('SUM(net_amount) AS tpcount'))
            ->whereYear('created_at', date('Y'))
            ->pluck('tpcount');

            $totalpurchaser = DB::table('purchasereturns')
            ->select(DB::raw('SUM(purchase_return) AS tprcount'))
            ->whereYear('created_at', date('Y'))
            ->pluck('tprcount');



            return view('auth.dashboard', compact('productcount','saleschart','salesmonth','totalsales','totalsalesr','totalpurchases','totalpurchaser'));
        }
        return redirect("login")->withSuccess('Access is not permitted');
    }
    





    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}