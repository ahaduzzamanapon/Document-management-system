<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Setting;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

 
    public function showLoginForm(Request $request)
    { 
        return view('auth.login');
    }


    public function getToken(){
         
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://prp.parliament.gov.bd/api/authentication/external?action=token',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
             "username": "mysoftheaven",
             "password": "QwBEq[6P"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response)->payload;
    }

    public function ssoUserLogin($username, $password){

        $verify_token = $this->getToken();
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://prp.parliament.gov.bd/api/secure/external?action=emp_verify',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
             "username": '.$username.',
             "password": '.$password.'
        }',
          CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization:'. $verify_token,
            'Cookie: JSESSIONID=3CB970D5CE11906298BB0EEC2285C2C1'
          ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response_data = [
            'message' => json_decode($response)->msg,
            'data' => json_decode($response),
        ];

        return $response_data;
    }



    /**
     * Store SSO user to our DB
     *
     * @return void
     */


    public function storeSSOUser($response, $username, $password){
        $userIfExsists = User::where('username', $username)->first();

        if($userIfExsists == null){
          if(!empty($response) && isset($response['data']->payload)){
            //byte array to binary string
            $img_data = implode('', array_map(function($e) {
                return pack("C*", $e);
            }, $response['data']->payload->photo));
            $image = base64_encode($img_data);
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = $response['data']->payload->empId.'.'.'png';
            \File::put(public_path(). '/uploads/prp-users/' . $imageName, base64_decode($image));


            $designInfos = [
              'officeId' => $response['data']->payload->designationInfos[0]->officeId,
              'officeNameEn' => $response['data']->payload->designationInfos[0]->officeNameEn,
              'officeNameBn' => $response['data']->payload->designationInfos[0]->officeNameBn,
              'designationId' => $response['data']->payload->designationInfos[0]->designationId,
              'designationNameEn' => $response['data']->payload->designationInfos[0]->designationNameEn,
              'designationNameBn' => $response['data']->payload->designationInfos[0]->designationNameBn,
            ];

            User::create([
              'nameEn' => $response['data']->payload->nameEng,
              'nameBn' => $response['data']->payload->nameBng,
              'username' => $response['data']->payload->username,
              'photo' => $imageName,
              'email' => $response['data']->payload->officialEmail,
              'phone' => $response['data']->payload->mobileNumber,
              'empId' => $response['data']->payload->empId,
              'designationInfos' => json_encode($designInfos),
              'password' => Hash::make($password),
              'status' => 1,
            ]);
          }
        }


    }
 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    { 
        if (Setting::user_login()==0) {
          return redirect()->back()->with('error', __('messages.user_login_disabled'));
        };
        $validation = Validator::make($request->all(),
        [ 
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if($validation->fails())
        {
            return back()
            ->withInput()
            ->withErrors($validation);
        }

        $username = $request->username;
        $password = $request->password;

        $response = $this->ssoUserLogin($username, $password);
        

        if(isset($response) && !empty($response))
        {
          if($response['message'] == 'Success'){
              //store sso user info
              $this->storeSSOUser($response, $username, $password);

                if(Auth::attempt(['username'=>$username,'password'=>$password]) or Auth::attempt(['email'=>$username,'password'=>$password]))
                {
                    if(auth()->user()->status == 1)
                    {
                      return redirect()->route('index');
                    }else{
                        Auth::logout();
                        return redirect()->back()->with('error', 'Invalid user..!');
                    }

                } else {
                    Auth::logout();
                    return redirect()->back()->with('error', __('messages.Email or Phone or Password is invalid'));
                }

            }else{
              if(Auth::attempt(['username'=>$username,'password'=>$password]) or Auth::attempt(['email'=>$username,'password'=>$password]))
              {
                  if(auth()->user()->status == 1)
                  {
                    return redirect()->route('index');
                  }else{
                      Auth::logout();
                      return redirect()->back()->with('error', 'Invalid user..!');
                  }

              } else {
                  Auth::logout();
                  return redirect()->back()->with('error', __('messages.Email or Phone or Password is invalid'));
              }
            }
        }else{
          return redirect()->back()->with('error', 'Parliament user error OR May be internet error occured');
        }
 

    }






}
