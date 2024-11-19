
@extends('layouts.app')

@section('content')
@include('sidebar')
<div class="content-wrapper">

    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-body">

@if(session('message'))
    <div class="alert alert-success" role="alert">
        {{session('message')}}
    </div>
@endif

<table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Desc</th>
        <th>Price </th>
        <th>Image </th>
        <th>Action </th>
      </tr>
    </thead>
    <tbody>
      @if(count($all_Pizzas)>0)
     @foreach($all_Pizzas as $key => $pizza)
         <tr>
         <th>{{$key+1}}</th>
            <th>{{$pizza->name}}</th>
            <th>{{$pizza->description}}</th>
            <th>{{$pizza->price}} </th>
            <th><img src="{{ Storage::url($pizza->image)}}" width="100"></th>
            <th>
              <a href='{{route("pizza.edit",$pizza->id)}}' class='btn btn-primary'>Edit</a>
               <button class='btn btn-danger' data-toggle="modal" data-target="#myModal{{$pizza->id}}">Delete</button>
               </th>
        </tr>

        <!-- The Modal -->
  <div class="modal" id="myModal{{$pizza->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('pizza.delete', $pizza->id)}}"  method='post'>
            @csrf @method('DELETE')

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>



        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" >Delete</button>
        </div>
    </form>
      </div>
    </div>
  </div>
     @endforeach
     @else
          <p>Nothing to show</p>
     @endif
    </tbody>
  </table>

  {{$all_Pizzas->links()}}







</div>

</div>
</div>
</div>
</div>
</section>
</div>
@endsection
