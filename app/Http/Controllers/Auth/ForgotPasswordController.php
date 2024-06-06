<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\str;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm(){
        return view('authentification.auth.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users',
        ]);

        $token=Str::random(64);
        $validation_number= random_int(1, 100);
        
        DB::table('password_reset_tokens')->insert([
            'email'=>$request->email,
            'validation_number'=>$validation_number,
            'created_at'=>Carbon::now()
        ]);
       
        $user=User::where('email',$request->email)->first();

        Mail::send('authentification.email.forgetPassword',['validation_number'=>$validation_number,'userName'=>$user->userName],function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route('reset.password.get')->with('message','we have e-mailed your password reset link!');

        }

        public function showResetPasswordForm() { 
            return view('authentification.auth.forgetPasswordReset');
         }
    

        public function submitResetPasswordForm(Request $request){
            $request->validate([
            'validation_number'=>'required',
            'email' => 'required|email|exists:users',
              'password' => 'required|string|min:8|confirmed',
              'password_confirmation' => 'required|same:password',
            'validation_number'=>'required|min:0|max:100',
            ]);

            $updatePassword=DB::table('password_reset_tokens')
            ->where([
                'email'=>$request->email,
                'validation_number'=>$request->validation_number,
            ])->first();

            if(!$updatePassword){
                return back()->withInput()->with('error','Invalid Token');
            }
            
            User::where('email',$request->email)
            ->update(['password'=>Hash::make($request->password)]);

            DB::table('password_reset_tokens')->where(['email'=>$request->email])->delete();
            return redirect()->route('login.show')->with('message','Your Password has been changed!');
        }
};