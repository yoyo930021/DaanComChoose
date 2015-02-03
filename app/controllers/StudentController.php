<?php
  //學生前端所有控制器
class StudentController extends BaseController {
  /**
  * Show the profile for the given user.
  */

  //登入 控制器
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
        $student=Student::where('account','=',$account)->firstOrFail();
        if($student->password == $password)
        {
          Session::regenerate();
          Session::put('studentlogin',true);
          Session::put('id',$student->id);
          Session::put('account',$student->account);
          Session::put('name', $student->name);
          Session::put('class',$student->class);
          Session::put('seat',$student->seat);
          if($setting->result==0)
          {
            if(Choose::where('stu_id','=',Session::get('id'))->count()==0)
            {
              return Redirect::to('/choose');
            }
            else
            {
              return Redirect::to('/chooseresult');
            }
          }
          else if($setting->result==1)
          {
            return Redirect::to('/result');
          }
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

  //選填志願 控制器
  public function choose()
  {

    if(Session::get('studentlogin')==true)
    {
      $classall=ClassAll::all();
      $setting=Setting::find(1);
      if(Choose::where('stu_id','=',Session::get('id'))->count()==0)
      {
        return View::make('choose')->with('classall',$classall)->with('setting',$setting);
      }
      else
      {
        $wishresult=Choose::where('stu_id','=',Session::get('id'))->firstOrFail();
        $wishall=explode(",",$wishresult->choosed);
        for($i=0;$i<count($wishall);$i++)
        {
          for ($y=0; $y < ClassAll::all()->count(); $y++) 
          { 
            $value[$i][$wishall[$i]]="selected";
          }
        }
        return View::make('choose')->with('classall',$classall)->with('setting',$setting)->with('value',$value);
      }
    }
    else
    {
      return Redirect::to('/');
    }
  }

  //確認志願 控制器
  public function wishchecked()
  {
    if(Session::get('studentlogin')==true)
    {
      $setting=Setting::find(1);
      $wish=Input::get('wish');
      //return $wish;
      for($i=0;$i<count($wish);$i++)
      {
        if($wish[$i]=="x")
        {
          return Redirect::to('/choose')->with('error', '1');
        }
      }
      $temp=array_unique($wish);
      if(count($wish)==count($temp))
      {
        for($i=0;$i<count($wish);$i++)
        {
          $tesult[$i]=ClassAll::where('id','=',$wish[$i])->firstOrFail();
        }
        return View::make('wishchecked')->with('wishresult',$tesult);
      }
      else
      {
        return Redirect::to('/choose')->with('error','2');
      }
    }
    else
    {
      return Redirect::to('/');
    }
  }

  //寫入志願 控制器
  public function writeresult()
  {
    if(Session::get('studentlogin')==true)
    {
      $wish=Input::get('wish');
      if(Choose::where('stu_id','=',Session::get('id'))->count()==0)
      {
        $choose=new Choose;
        $choose->stu_id=Session::get('id');
        $choose->choosed=implode(",",$wish);
        $choose->save();
        $student=Student::where('id','=',Session::get('id'))->firstOrFail();
        $student->chosen='1';
        $student->save();
        return Redirect::to('/chooseresult')->with('sussces','1');
      }
      else
      {
        $choose=Choose::where('stu_id','=',Session::get('id'))->firstOrFail();
        $choose->choosed=implode(",",$wish);
        $choose->save();
        return Redirect::to('/chooseresult')->with('sussces','2');
      }
    }
    else
    {
      return Redirect::to('/');
    }
  }

  //志願結果 控制器
  public function wishresult()
  {
    if(Session::get('studentlogin')==true)
    {
      $wishresult=Choose::where('stu_id','=',Session::get('id'))->firstOrFail(); 
      $wishall=explode(",",$wishresult->choosed);
      for($i=0;$i<count($wishall);$i++)
      {
        $tesult[$i]=ClassAll::where('id','=',$wishall[$i])->firstOrFail();  
      }
      return View::make('wishresult')->with('wishresult',$tesult);
    }
    else
    {
      return Redirect::to('/');
    }
  }
  
  //公告結果 控制器
  public function result()
  {
    if(Session::get('studentlogin')==true)
    {
      if(Choose::where('stu_id','=',Session::get('id'))->count()==0)
      {
        return View::make('result')->with('noresult','1');
      }
      else if(Choose::where('stu_id','=',Session::get('id'))->firstOrFail()->result==0 )
      {
        return View::make('result')->with('noresult','2');
      }
      else
      {
        $choose=Choose::where('stu_id','=',Session::get('id'))->firstOrFail(); 
        $result=ClassAll::where('id','=',$choose->result)->firstOrFail();
        return View::make('result')->with('result',$result->name);
      }
    }
    else
    {
      return Redirect::to('/');
    }
  }

  //登出 控制器
  public function logout()
  {
    Session::regenerate();
    Session::flush();
    return Redirect::to('/')->with('logout', '#');
  }
}
