<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurdController extends Controller
{
    // here we will preform curd operation

    public function showAllCars(){
        $all_cars=Car::all(); 
        return view('all-cars',compact('all_cars'));
    }

    public function addCar(Request $request){
        // preform form validations here
        // gönderilen tüm verileri alir ve bir dizi olarak döndürür
        $validator=Validator::make($request->all(),[
          'name'=>'required',
          'manufactur_year'=>'required', 
          'engine_capactiy'=>'required', 
          'fuel_type'=>'required', 

        ]);

        if( $validator->fails())
        {
            return response()->json(['msg'=>$validator->errors()->toArray()]);
        }
      else{
        try
        { 
          $addcar= new Car();
          $addcar->name= $request->name;
          $addcar->manufactur_year= $request->manufactur_year;
          $addcar->engine_capactiy= $request->engine_capactiy;
          $addcar->fuel_type= $request->fuel_type;
          $addcar->save();
            return response()->json(['success'=>true,'msg'=>'car added success']);
         
        }
        catch(\Exception $e){
              return response()->json(['success'=>false,'msg'=> $e->getMessage()]);
        }
      }
    }

    public function deleteCar($id){
        try{
         // delete komut
         //delete() fonksiyondur dikkat  delete değil 
        $delete_Car=Car::where('id',$id)->delete();

          return response()->json(['success'=>true,'msg'=> 'car delete success']);

        }
        catch(Exception $e){
          return response()->json(['success'=>false,'msg'=> $e->getMessage()]);

        }
    }

    public function editCar(Request $request){
   //   echo $request->car_id;
      $validator=Validator::make($request->all(),[
        'name'=>'required',
        'manufactur_year'=>'required', 
        'engine_capactiy'=>'required', 
        'fuel_type'=>'required', 

      ]);


      if( $validator->fails())
      {
          return response()->json(['msg'=>$validator->errors()->toArray()]);
      }
    else{
      try
      { 

        Car::where('id',$request->car_id)->update([
          'name'=>$request->name,
          'manufactur_year'=>$request->manufactur_year,
          'engine_capactiy'=>$request->engine_capactiy,
          'fuel_type'=>$request->fuel_type,


        ]);

          return response()->json(['success'=>true,'msg'=>'car edit success']);
       
      }
      catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=> $e->getMessage()]);
      }
    }

    }
}
