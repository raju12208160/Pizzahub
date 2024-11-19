@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

           <style>
            .card-title {
    float: none!important;
}
           </style>

@if(auth()->user())
    @if(auth()->user()->isAdmin == 1)
    <div class="col-12 row text-right py-3">
    <div class="div">
    <a class='btn btn-primary' href='{{route("pizza.create")}}'>Create</a>
    <a class='btn btn-success' href='{{route("pizza.index")}}'>View All</a>
    </div>
    </div>
    @endif
@endif

<div class="row col-12 py-5">
    <div class="col-6">
        <h3>PizzaHub</h3>

        <p>At PizzaHub, we don't just make pizza; we create moments of joy, laughter, and shared stories over a table full of flavor. Dive into a world where the crust is always golden, the cheese is perfectly melted, and each topping tells a tale. Whether you're a fan of classic Margherita or bold, new flavors, our kitchen is your gateway to taste that lingers long after the last bite.
</p><br>
{{-- <p>Satisfy your cravings, share a slice, and discover why every visit to PizzaHub turns into a cherished memory. Let’s make your meal a masterpiece!</p> --}}
    </div>
    <div class="col-6">

<div id="demo" class="carousel slide" data-ride="carousel">



<!-- The slideshow -->
<div class="carousel-inner">

@foreach($allPizzas as $key => $pizza)

  <div class="carousel-item ">
    <img src=" {{ Storage::url($pizza->image)}}"    width="100%" height="300">
  </div>

  @endforeach

</div>



<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>

    </div>
</div>


<div class="row col-12 py-5 text-center">
    All Products
</div>





<div class="col-12 row">

                    @foreach($allPizzas as $key => $pizza)
                    <div class="col-4">
                    <div class="card  text-center" >
                    <img  class="m-auto"  src=" {{ Storage::url($pizza->image)}}"  width='150' height='100'>
                    <div class="card-body  text-center">
                    <h4 class="card-title  text-uppercase"> {{ $pizza->name;}}</h4>
                    <p class="card-text text-center"> Rs. {{ $pizza->price;}}</p>
                    </div>
                </div>
                    </div>

                    @endforeach
                    </div>



        </div>
    </div>
</div>
@endsection

<script>
    setTimeout(() => {
        document.querySelectorAll('.carousel-item')[0].classList.add('active')
    }, 500);
</script>
