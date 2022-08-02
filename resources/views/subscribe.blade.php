
@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="/css/custom.css" rel="stylesheet">
<link href="/css/multistepform.css" rel="stylesheet">

<style>

</style>
<body>

<form id="regForm" action="/action_page.php">
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
  <div class="" style="width:100%; text-align:center;">
     <h5>Select Newspaper(s)</h5>
  </div>
    <ul class="check-card">
               @foreach($newspapers as $newspaper)
                   <li class="check-card-item" >
                       <input type="checkbox" id="{{$newspaper->shorthand}}" name="newscheck" value="{{$newspaper->id}}" onclick = "GetCostOfPaperPerMonth(this.id, {{$newspaper->price}}, {{$newspaper->deliveriesperweek}});">
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
                                   {{$newspaper->deliveriesperweek}} Deliveries per week
                               </p>
                           </div>

                       </div>
                   </li>
                   @endforeach
               </ul>

    <div class="pt-1" style="width:100%; text-align:center; border-top: 1px solid lightgray;">
         <h5>Select Subscription Package</h5>
     </div>
     <ul class="check-card" >
        @foreach($subscriptioncategories as $category)
            <li class="check-card-item">
                <input type="radio" class="form-check-input" id="{{$category->shorthand}}" name="category" value="{{$category->monthlyrate}}" onclick="GetSubscriptionPackage({{$category->numberofmonths}});"  >
                <label for="{{$category->shorthand}}" class="radio"></label>

                <div class="check-card-body">

                    <div class="check-card-body-in">
                        <h5 class="check-card-title">{{$category->name}}</h5>
                                <p class="check-card-description">
                                    MWK {{$category->monthlyrate}}/Month
                                </p>
                            </div>

                        </div>
                    </li>
                    @endforeach
                </ul>

 <div class="pt-1" style="width:100%; text-align:center; border-top: 1px solid lightgray;">
          <h5>Number of copies per delivery</h5>
      </div>

<p><input class="form-control" id="numberofcopies" type="number"  value = "1" name="numberofcopies" oninput="SetNumberOfCopies(this.value);"></p>
  </div>

  <p id="subtotal"></p>

  <div class="tab">Address:
  <div class="row mb-3">
     <label for="city" class="col-md-4 col-form-label text-md-end">City/Town</label>

        <div class="col-md-6">
            <select name="city" class="form-control" id="city">
               <option value="Lilongwe">Lilongwe</option>
               <option value="Mzuzu">Mzuzu</option>
               <option value="Balaka">Balaka</option>
               <option value="Neno">Neno</option>
            </select>
        </div>
  </div>
    <p><input placeholder="Address line 1" class="form-control" name="address1"></p>
    <p><input placeholder="Address line 2 (optional)..." class="form-control" name="address2"></p>
  </div>
  <div class="tab">Confirm:
    <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
    <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
    <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
  </div>
  <div class="tab">Payment:
   <div class="col-50">
               <h3>Payment</h3>
               <label for="fname">Accepted Cards</label>
               <div class="icon-container">
                 <i class="fa fa-cc-visa" style="color:navy;"></i>
                 <i class="fa fa-cc-amex" style="color:blue;"></i>
                 <i class="fa fa-cc-mastercard" style="color:red;"></i>
                 <i class="fa fa-cc-discover" style="color:orange;"></i>
               </div>
               <label for="cname">Name on Card</label>
               <input type="text" id="cname" class="form-control" name="cardname" placeholder="John More Doe">
               <label for="ccnum">Credit card number</label>
               <input type="text" class="form-control" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" >
               <label for="expmonth">Exp Month</label>
               <input type="text" class="form-control" id="expmonth" name="expmonth" placeholder="September" >

               <div class="row">
                 <div class="col-50">
                   <label for="expyear">Exp Year</label>
                   <input type="text" id="expyear" name="expyear" placeholder="2018" class="form-control">
                 </div>
                 <div class="col-50">
                   <label for="cvv">CVV</label>
                   <input type="text" class="form-control" id="cvv" name="cvv" placeholder="352">
                 </div>
               </div>
             </div>

  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>

  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}



 var selectedNewspapers = 0;
 var totalPrice = 0;
 var subscriptionRate = 0;
 var numberOfCopies = 0;

    GetNumberOfCopies();
    ShowSubTotal();

    function SetNumberOfCopies(num)
    {
        numberOfCopies = num;
        GetSubTotal();
        ShowSubTotal();
    }

    function ShowSubTotal()
    {
        document.getElementById("subtotal").innerHTML = "Sub Total: MWK " +GetSubTotal();
    }

    function GetNumberOfCopies()
    {
        var numberInput = document.getElementById("numberofcopies");

        numberOfCopies = numberInput.value;

    }

    function GetCostOfPaperPerMonth(id, price, deliveriesperweek)
    {
        //cost of the paper per month
        var rate = (price*deliveriesperweek)*4; //multiplied by four weeks
        var checkbox = document.getElementById(id);
        if(checkbox.checked)
        {
            totalPrice = totalPrice+rate;
            selectedNewspapers= selectedNewspapers+1;
        }
        else
        {
           selectedNewspapers= selectedNewspapers-1;
           totalPrice = totalPrice-rate;
        }
        ShowSubTotal();
    }

    function GetSubscriptionPackage(numOfMonths)
    {
         var getSelectedValue = document.querySelector(
                        'input[name="category"]:checked');
                    var rate = numOfMonths;
                    if(getSelectedValue != null) {
                        subscriptionRate = rate;
                    }
                    else {
                        window.alert("ah haaa" +numOfMonths);
                    }
           ShowSubTotal();
    }

    function GetSubTotal()
    {
        if(selectedNewspapers!=0)
            return (totalPrice*subscriptionRate)*numberOfCopies;
    }




</script>

</body>
</html>



<!--<head>
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/css/multistepform.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script type="text/javascript" src="/multistepform.js"></script>

</head>

<div class="container d-flex">
<form action="" method="get" class="justify-content-center" style="width:100%;">
 <div class="d-flex" >

           <ul class="check-card">
           @foreach($newspapers as $newspaper)
               <li class="check-card-item" >
                   <input type="checkbox" id="{{$newspaper->shorthand}}" name="newscheck" value="{{$newspaper->id}}" onclick = "GetNumberOfSelectedNewspapers(this.id);">
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

                   </div>
               </li>
               @endforeach
           </ul>

    </div>

   <div class="pt-5" style="width:100%; text-align:center; border-top: 1px solid lightgray;">
   <h5>Select subscription package</h5>
   </div>

    <div class="d-flex tab">

           <ul class="check-card" >
               @foreach($subscriptioncategories as $category)
               <li class="check-card-item">
                   <input type="radio" class="form-check-input" id="{{$category->shorthand}}" name="category" value="{{$category->monthlyrate}}" onclick="GetSubscriptionPackage({{$category->numberofmonths}});"  >
                   <label for="{{$category->shorthand}}" class="radio"></label>

                   <div class="check-card-body">

                       <div class="check-card-body-in">
                           <h5 class="check-card-title">{{$category->name}}</h5>
                           <p class="check-card-description">
                               MWK {{$category->monthlyrate}}/Month
                           </p>
                       </div>

                   </div>
               </li>
               @endforeach
           </ul>

    </div>

    <div class="pt-5" style="width:100%; text-align:center; border-top: 1px solid lightgray;">
       <h5>Number of copies</h5>
    </div>

    <div class="row mb-3">
       <label for="email" class="col-md-4 col-form-label text-md-end"> </label>

           <div class="col-md-6">
               <input id="numberofcopies" type="number" class="form-control @error('email') is-invalid @enderror" name="numberofcopies" placeholder="number of copies per delivery">

           </div>
    </div>

   </form>
</div>

@endsection('content')

<script>
    var selectedNewspapers = 0;
    var totalPrice = 0;
    function GetNumberOfSelectedNewspapers(id)
    {
        var checkbox = document.getElementById(id);
        if(checkbox.checked)
        {
            selectedNewspapers= selectedNewspapers+1;
        }
        else
        {
           selectedNewspapers= selectedNewspapers-1;
        }

    }

    function GetSubscriptionPackage(numOfMonths)
    {
         var getSelectedValue = document.querySelector(
                        'input[name="category"]:checked');

                    if(getSelectedValue != null) {
                        totalPrice = getSelectedValue.value * numOfMonths * selectedNewspapers;
                    }
                    else {
                        window.alert("ah haaa" +numOfMonths);
                    }
        window.alert(GetSubTotal());
    }

    function GetSubTotal()
    {
        if(selectedNewspapers!=0)
            return totalPrice;
    }



</script>

