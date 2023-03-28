<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>




    @foreach ( $subchecklist as $sub )




    <div class="card">
       <div class="card-body">
           <label for="scales"><h6> {{$sub->nombre}} </h6> </label>

           <input value="{{$sub->id}}" type="checkbox" id="scales" name="opc[]" >

       </div>
     </div>


       @endforeach

       <hr style="border-color:red;">

</body>
</html>
