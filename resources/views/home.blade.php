@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Background image -->
          <div
            class="p-5 text-center bg-image"
            style="
              background-image: url('images/newspapers.jpg');
              height: 400px; mask-image: radial-gradient(black 50%, rgba(0, 0, 0, 0.5)); background-repeat: no-repeat; background-size: cover;
            "
          >
              <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                  <h1 class="mb-3">News at your doorstep</h1>
                  <h4 class="mb-3">Start your subscription today</h4>
                  <a class="btn btn-outline-light btn-lg" style="background-color: #3FC4E7; border: none;" href="#!" role="button"
                  >Subscribe</a
                  >
              </div>
            </div>
          </div>
          <!-- Background image -->
          <div class="row justify-content-center pt-5">
                <div class="pt-3">
                    <h3>Our Newspapers</h3>
                </div>
                <div class = "d-flex flex-sm-row flex-column justify-content-center">
                    <div class="card mx-3 mt-1" style="">
                        <img class="card-img-top" src="/images/istockphoto-1179978472-612x612.jpg" alt="weekend nation newspaper">
                            <div class="card-body">
                                <h5 class="card-title">Weekend Nation</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras at arcu quis sapien mollis condimentum.</p>
                                <a href="#" class="btn btn-primary" style="background-color: #3FC4E7; border: none;">Subscribe</a>
                            </div>
                    </div>

                    <div class="card mx-3 mt-1" style="">
                        <img class="card-img-top" src="/images/family-reading-kitchen-newspaper-65327593.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Nation on Sunday</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras at arcu quis sapien mollis condimentum.</p>
                                <a href="#" class="btn btn-primary" style="background-color: #3FC4E7; border: none;">Subscribe</a>
                            </div>
                    </div>

                    <div class="card mx-3 mt-1" style="">
                        <img class="card-img-top" src="/images/istockphoto-168580604-612x612.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">The Nation</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras at arcu quis sapien mollis condimentum.</p>
                                <a href="#" class="btn btn-primary" style="background-color: #3FC4E7; border: none;" >Subscribe</a>
                            </div>
                    </div>
                </div>
          </div>

    </div>
</div>
@endsection
