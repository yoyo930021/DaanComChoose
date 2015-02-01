<?php
class StudentController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function login()
    {
    	$setting=Setting::find(1);
    	if($setting->open==1)
    	{	
        		$account=Input::get('inputAccount');
    	    	$password=Input::get('inputPassword');
   	        	$student=Student::where('account','=',$account)->count();
   	        	if($student>0)
   	        	{
   		      	  $student=Student::where('account','=',$account)->firstOrFail();;
   		       	 if($student->password == $password)
   		        	{
   		        	        Session::regenerate();
   			        Session::put('studentlogin',true);
   			        Session::put('id',$student->id);
   			        Session::put('account',$student->account);
   			        Session::put('name', $student->name);
   			        Session::put('class',$student->class);
   			        Session::put('seat',$student->seat);
   			        return Redirect::to('/choose');
   		  	 }
   		        	else
   		       	 {
   			        return Redirect::to('/')->with('error', '#');
   		        	}
   	       	 }
   	       	 else
   	      	{
   			return Redirect::to('/')->with('error', '#');
   	        	}
        	}
        	else
        	{
        		return Redirect::to('/');
        	}
   }

   public function choose()
   {
   	if(Session::get('studentlogin')==true)
   	{
   		$classall=ClassAll::all();
   		$setting=Setting::find(1);
   		return View::make('choose')->with('classall',$classall)->with('setting',$setting);
   	}
   	else
   	{
   		return Redirect::to('/');
   	}
   }

    public function logout()
    {
    	Session::regenerate();
    	Session::flush();
    	return Redirect::to('/')->with('logout', '#');
    }
}