
<head>
    <link href="/css/custom.css" rel="stylesheet">
</head>
@extends('layouts.app')

@section('content')

<div style="width:100%; text-align:center;">
<h5>Select Newspaper(s) to subscribe to</h5>
</div>
<div class="container d-flex">

<form action="" method="get" class="justify-content-center" style="width:100%;">
<div class="d-flex justify-content-center" >
@foreach($newspapers as $newspaper)
        <ul class="check-card">
            <li class="check-card-item" style="display:inline-block; float:left;">
                <input type="checkbox" id="{{$newspaper->shorthand}}" name="newscheck" value="{{$newspaper->id}}">
                <label for="{{$newspaper->shorthand}}" class="radio"></label>
                <div class="check-card-bg"></div>
                <div class="check-card-body">
                    <div class="check-card-toggle">
                        <span></span>
                        <span></span>
                    </div>
                    <div class="check-card-body-in">
                        <h5 class="check-card-title">{{$newspaper->name}}</h5>
                        <p class="check-card-description">
                            MWK {{$newspaper->price}}
                        </p>
                    </div>
                    <!--<div class="check-card-cancel">CANCEL</div>-->
                </div>
            </li>
        </ul>
 @endforeach
 </div>

<div class="pt-5" style="width:100%; text-align:center; border-top: 1px solid;">
<h5>Select subscription package</h5>
</div>

 <div class="d-flex justify-content-center " style="">
@foreach($subscriptioncategories as $category)
        <ul class="check-card">
            <li class="check-card-item" style="display:inline-block; float:left;">
                <input type="radio" id="{{$category->shorthand}}" name="category" value="1">
                <label for="{{$category->shorthand}}" class="radio"></label>
                <div class="check-card-bg"></div>
                <div class="check-card-body">
                    <div class="check-card-toggle">
                        <span></span>
                        <span></span>
                    </div>
                    <div class="check-card-body-in">
                        <h5 class="check-card-title">{{$category->name}}</h5>
                        <p class="check-card-description">
                            MWK {{$category->monthlyrate}}/Month
                        </p>
                    </div>
                    <!--<div class="check-card-cancel">CANCEL</div>-->
                </div>
            </li>
        </ul>
 @endforeach
 </div>
   </form>
</div>
@endsection('content')
