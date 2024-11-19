
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
                    @if(count($errors)>0)

                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            <p>{{ $error }}</p>
                            </div>
                        @endforeach
                        @endif
                    </div>
                    <form action=" {{route('pizza.update', $pizzaCol->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="name">Name of Pizza</label>
                                    <input type="text" class="form-control" name="name" value="{{$pizzaCol->name}} ">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Description of Pizza</label>
                                    <textarea class="form-control" name="description"> {{$pizzaCol->name}}</textarea>
                                </div>
                                <div class="form-inline mb-4">
                                    <label>Pizza price(rs)</label>
                                    <div class="d-flex">
                                    <input type="text" name="price" class="form-control"
                                         value="{{$pizzaCol->price}}">
                                        </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" name="image">
                                    <img src="{{Storage::url($pizzaCol->image)}}" width="100">
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">Edit</button>
                                </div>
                            </div>
                        </form>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    @endsection
