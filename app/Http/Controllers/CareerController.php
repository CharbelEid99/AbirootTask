<?php

namespace App\Http\Controllers;
use App\Models\Career;
use App\Models\Position;

use App\Notifications\AdminNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class CareerController extends Controller
{

    public function GetPositions() {
        $position = new Position();
        $allPositions = $position::where('Available' ,1)->get();
        return View('welcome', ['allPositions' => $allPositions]) ;
    }

    public function AddCareerInfo(Request $request) {

        $request->validate([
            'FirstName' => 'required|max:255',
            'LastName' => 'required|max:255',
            'email'=>'required|unique:Careers|email',
            'cv' => 'required|mimes:pdf,docx',
            'position'=>'required',
        ]);

        $FirstName=$request->input('FirstName') ;
        $LastName=$request->input('LastName') ;
        $email = $request->input('email');
        $positionId=$request->input('position');
        $description=$request->input('description') ;
        $cv = $request->file('cv');


        $extension = $cv->extension();
        $filename = $email.'_cv.'.$extension;

        $userUrl= url('/');
        $DownloadLink=$userUrl."/Files/".$filename ;


        if($extension=="pdf" || $extension=="docx"){
            $cv->move('Files/',$filename);
            $NewCareer=new Career() ;
            $NewCareer->first_name=$FirstName ;
            $NewCareer->last_name=$LastName ;
            $NewCareer->email=$email ;
            $NewCareer->cv=$filename ;
            $NewCareer->description=$description ;
            $NewCareer->position_id=$positionId ;
            $NewCareer->save() ;

           $us=Career::where('id' , 1)->get();
           if($us!=null){
               $data = array(
                   'first_name'=>$FirstName,
                   'last_name'=>$LastName,
                   'link'=>$DownloadLink,
                   'email' => $email,
               );

            Notification::send($us,new AdminNotification($data)) ;
               return redirect()->route('Home') ;
           }
        }else{

            echo '<script language="javascript">';
            echo 'alert("Please enter the asked format of the cv file.")';
            echo '</script>';

        }




    }










}
