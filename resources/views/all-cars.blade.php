<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Curd System - Ajax in Laravel </title>
</head>
<body>
   <div class="container">
    <div class="card mt-3">
        <div class="card-header">Curd System - Ajax in Laravel 
            <button class="btn btn-success btn-sm float-sm-end"  data-bs-toggle="modal" data-bs-target="#addModal">Add Car</button> </div>
            <span class="alert alert-success" id="alert-success" style="display:none"></span>
            <span class="alert alert-danger" id="alert-danger" style="display:none"></span>
   
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Car Name</th>
                    <th>Manufactur Year</th>
                    <th>Engine Capacity</th>
                    <th>Fule Type</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>

                <tbody>
           @if(count($all_cars)>0)
           @foreach($all_cars as $item)
           <tr>
            
              <td> {{$loop->iteration}}  </td>
              <td> <?php echo $item->name?> </td>
              <td> {{$item->manufactur_year}}</td>
              <td> {{$item->engine_capactiy}}</td>
              <td> {{$item->fuel_type}}</td>
              <td  style="width: 130px;"> <button type="button" class="btn btn-secondary btn-sm editBtn" data-id="{{$item->id}}"  data-name="{{$item->name}}" data-year="{{$item->manufactur_year}}"  data-capactiy="{{$item->engine_capactiy}}" data-fuel="{{$item->fuel_type}}"  data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                    <button type="button" class="btn btn-info btn-sm deleteBtn" data-id="{{$item->id}}"  data-name="{{$item->name}}" data-bs-toggle="modal" data-bs-target="#deletModal">Delete</button>
            </td>
              </tr>  
             @endforeach
             
             @else
              <td colspan="5"> NO found data</td>
             @endif
                </tbody>
            </table>
        </div>
   </div>
   </div>


   <!-- Add Car Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Car</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Crate a form here-->
        <form id="addCarForm">
            <div class="form-group">
                <label for="">Car Name</label>
                <input type="text" name="name" class="form-control" id="">
                <span id="name_error" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="">Manufactur Year</label>
                <input type="number" name="manufactur_year" class="form-control" id="">
                <span id="manufactur_year_error" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="">Engine Capacity</label>
                <input type="text" name="engine_capactiy" class="form-control" id="">
                <span id="engine_capactiy_error" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="">Fuel Type</label>
                <input type="text" name="fuel_type" class="form-control" id="">
                <span id="fuel_type_error" class="text-danger"></span>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary addBtn">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--Edit Modal-->

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Car</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Crate a form here-->
        <form id="editCarForm">
          <input type="hidden" id="car_id" name="car_id" >
            <div class="form-group">
                <label for="">Car Name</label>
                <input type="text" name="name" class="form-control" id="name">
                <span id="name_error" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="">Manufactur Year</label>
                <input type="number" name="manufactur_year" class="form-control" id="manufactur_year">
                <span id="manufactur_year_error" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="">Engine Capacity</label>
                <input type="text" name="engine_capactiy" class="form-control" id="engine_capactiy">
                <span id="engine_capactiy_error" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="">Fuel Type</label>
                <input type="text" name="fuel_type" class="form-control" id="fuel_type">
                <span id="fuel_type_error" class="text-danger"></span>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary editButton">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- create a delete modal here-->

<div class="modal fade" id="deletModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">delete Car</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      do you really want To delete <span class="car_name"></span> ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger deleteButton">Delete</button>
      </div>
  </div>
</div>

  <script>
    $(document).ready(function(){

        $('#addCarForm').submit(function(e)
        {
            e.preventDefault();
            let formData=$(this).serialize();
            $.ajax({
                url:'{{route("addCar")}}',
                data:formData,
                contentType:false,
                processData:false,
                beforeSend:function(){
                    $('.addBtn').prop('disabled',true);
                },
                complete: function(){
                    $('.addBtn').prop('disabled',false);
                },
                success: function(data){
                // this is the correct way to close model 
                    if(data.success ==true){
                        $('#addModal').modal('hide');
                        printSuccessMsg(data.msg);
                        var reloadInterval=5000;//page reload delay duration
                        //function to reload the whole page
                        function reloadPage(){
                            location.reload(true); //Pass ture to force a reload from 
                        }
                        //Set an interval to reload the page after the specified time  
                        var intervalId=setInterval(reloadPage,reloadInterval);
                     
                    }
                    else if(data.success ==false){
                        printErrorMsg(data.msg);
                    }
                    else{
                        printValidationError(data.msg)
                    }
                }
            });
            return false;
            // the three  functions for the flash message

        });


   
       // get all car data that we passed on the edit button
       $('.editBtn').on('click',function(){
             var car_id=$(this).attr('data-id');
             var car_name=$(this).attr('data-name');
             var car_year=$(this).attr('data-year');
             var car_capactiy=$(this).attr('data-capactiy');
             var car_fuel=$(this).attr('data-fuel');

       // then display them inn a edit form 
       $('#name').val(car_name);
       $('#manufactur_year').val(car_year);
       $('#engine_capactiy').val(car_capactiy);
       $('#fuel_type').val(car_fuel);
    
       //the car id will be hidden on the edit form so assign it as hidden input 
       $('#car_id').val(car_id);
       //then submit the form
        
       $('#editCarForm').submit(function(e) {
        e.preventDefault();
            let formData=$(this).serialize();

            $.ajax({
                url:'{{route("editCar")}}',
                data:formData,
                contentType:false,
                processData:false,
                beforeSend:function(){
                    $('.editButton').prop('disabled',true);
                },
                complete: function(){
                    $('.editButton').prop('disabled',false);
                },
                success: function(data){
                // this is the correct way to close model 
                    if(data.success ==true){
                        $('#editModal').modal('hide');
                        printSuccessMsg(data.msg);
                        var reloadInterval=5000;//page reload delay duration
                        //function to reload the whole page
                        function reloadPage(){
                            location.reload(true); //Pass ture to force a reload from 
                        }
                        //Set an interval to reload the page after the specified time  
                        var intervalId=setInterval(reloadPage,reloadInterval);
                     
                    }
                    else if(data.success ==false){
                        printErrorMsg(data.msg);
                    }
                    else{
                        printValidationError(data.msg)
                    }
                }
            });


       });


       });
         
         //perform delete functionality here
          /*
          $(this): Bu kod, this anahtar sözcüğünü kullanarak,
           üzerinde çalışılan DOM öğesini seçer. Bu, bir düğme, bağlantı veya başka herhangi bir HTML öğesi olabilir.
           jQuery attr() method
           replace() methodu, bir metin içindeki tüm eşleşmeleri değiştirir.
          car_id değişkeninin değeri, bir metin dizesi veya sayı olabilir.
          Bu kod, URL'nin sorgusunda car_id parametresini değiştirir. URL'nin diğer bölümlerini de değiştirebilirsiniz.
          */
     $('.deleteBtn').on('click',function()

         {
        var car_id=$(this).attr('data-id');
         var car_name=$(this).attr('data-name');

         $('.car_name').html(''+car_name+'');
        $('.deleteButton').on('click',function(){
          var url="{{route('deleteCar','car_id')}}";  
            url=url.replace('car_id',car_id); 
            //console.log(url);


            $.ajax({
                url:url,
                type:'GET',
                contentType:false,
                processData:false,
                beforeSend:function(){
                    $('.deleteButton').prop('disabled',true);
                },
                complete: function(){
                    $('.deleteButton').prop('disabled',false);
                },
                success: function(data){
                // this is the correct way to close model 
                    if(data.success ==true){
                        $('#deletModal').modal('hide');
                        printSuccessMsg(data.msg);
                        var reloadInterval=5000;//page reload delay duration
                        //function to reload the whole page
                        function reloadPage(){
                            location.reload(true); //Pass ture to force a reload from 
                        }
                        //Set an interval to reload the page after the specified time  
                        var intervalId=setInterval(reloadPage,reloadInterval);   
                    }
                    else{
                        printErrorMsg(data.msg);
                    }
  
                }
            });

           });
         });


         // the three  functions  for flash messages
         function printValidationError(msg){
                $.each(msg,function(field_name,error){
                 // console.log();
                 // this will find a input id for error 
                  $(document).find('#'+field_name+'_error').text(error);
                });
            }

            function printErrorMsg(msg){
                $('#alert-danger').html('');
                $('#alert-danger').css('display','block');
                $('#alert-danger').append(''+msg+'');
            }

            function printSuccessMsg(msg){
                $('#alert-success').html('');
                $('#alert-success').css('display','block');
                $('#alert-success').append(''+msg+'');
                document.getElementById('addCarForm').reset();   

            }
   
          });
  </script>

</body>
</html>