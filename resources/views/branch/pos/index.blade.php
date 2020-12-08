@include('branch.pos.inc.header')             
<!-- row -->
<div class="row row-sm">
    
    <div class="col-xl-7 col-lg-7 col-md-7 mb-1 mb-md-0">
        <div class="card">
            <div class="card-body pb-0">
                <div class="mb-4">
                    <div class="row row-sm">
                        <div class="col-md-6">
                            <label for="">Category</label>
                            <select name="category_id" id="foodCategory" class="form-control">
                                <option value="all">All</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="" class=""></label>
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row row-sm" id="myUL" style="height: 470px;overflow: scroll;">

                    @foreach ($foods as $food)
                        <li style="list-style: none;" class="col-md-3 col-lg-3 col-xl-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="pro-img-box">
                                        <div class="d-flex product-sale">
                                            {{-- <div class="badge bg-pink">20%</div> --}}
                                        </div>
                                        <img class="w-100" src="{{ asset('uploads/'.$food->foodDetails->picture) }}" alt="product-image" style="height: 88px !important">
                                        <a onclick="addToCart({ 'food_id': {{ $food->foodDetails->id }}, 'price': {{ $food->foodDetails->discount_price }} })" class="adtocart"> <i class="las la-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="text-center pt-3">
                                        <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{ $food->foodDetails->food_name }}</h3>
                                        <h6 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{ $food->foodDetails->discount_price }}৳ </h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-5 col-lg-5 col-md-5 mb-3 mb-md-0">
        <div class="card">

            <div class="card-body pb-0">
                <div class="mb-3 row">
                    <div class="col-md-4">
                        <h5>Food Items</h5>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label><b>Customer</b></label> 
                            </div> 
                            <div class="col-md-9">
                                <select id="customer_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value="" selected="selected">selecte customer</option>
                                    @foreach ($customers as $customer)                            
                                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div> <!-- /.form-group -->
                    </div>
                </div>
                <div class="table-responsive country-table" style="height: 350px;overflow: scroll;">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                            <tr>
                                <th class="wd-lg-25p">Name</th>
                                <th class="wd-lg-25p tx-right">Qty</th>
                                <th class="wd-lg-25p tx-right">Price</th>
                                <th class="wd-lg-25p tx-right">Action</th>
                            </tr>
                        </thead>
                        <tbody id="cartItems">
                            
                           
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-2">
                
                <div class="bg-secendory p-4">
                    <div class="row">

                        <div class="col-md-6">
                            <b><p>Total Amount =  <span id="cartTotalAmount"> </span></p></b>
                        </div>

                        <div class="col-md-6"></div>

                    </div>

                    <div class="row mt-2">
                          <div class="col-md-6">
                            <button type="button" data-toggle="modal" data-target="#exampleModalCenter" id="" class="btn btn-primary btn-block" title="Multiple Payments [Ctrl+M]">
                              <i class="fa fa-credit-card" aria-hidden="true"></i>
                              Multiple
                            </button>
                          </div>
                          <div class="col-md-6">
                                <form action="{{ route('sale.food') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="customer_id" value="" id="setCustomerId">
                                    <input type="hidden" name="payment_type" value="Cash">
                                    <button type="submit" id="show_cash_modal" class="btn btn-success btn-block" title="By Cash &amp; Save [Ctrl+C]">
                                        <i class="fa fa-money" aria-hidden="true"></i>
                                        Cash
                                    </button>
                                </form>
                          </div>
                    </div>


                </div>
              </div>


          </div>
      </div><!-- end col-->


        </div>
    </div>

</div>



<!-- Multiple Payment Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <form action="{{ route('sale.food') }}" method="POST">
                @csrf
                <input type="hidden" name="customer_id" value="" id="setCustomerIdInPaymentModel">
                <div class="form-group">
                    <label for="">Payment Type</label>
                    <select name="payment_type" id="" class="form-control" required>
                        <option value="">select</option>
                        <option value="bKash">bKash</option>
                        <option value="Rocket">Rocket</option>
                        <option value="Nagad">Nagad</option>
                        <option value="Card">Card</option>
                    </select>
                </div>

                <div class="text-right mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>

        </div>
      </div>
    </div>
</div>



<script>

function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("h3")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}


function increment_quantity(cart_id) {
    $.ajax({
        url: '/branch/cart/increment/'+cart_id,
        method: 'get',
        dataType: 'json',
        success: function(result) {
            $(`#inputQuantity-${cart_id}`).val(result.price.qty)
            $(`#totalPrice-${cart_id}`).text(result.price.total_price)
            $("#cartTotalAmount").text(result.total)
        }
    })
}

function decrement_quantity(cart_id) {
    $.ajax({
        url: '/branch/cart/decrement/'+cart_id,
        method: 'get',
        dataType: 'json',
        success: function(result) {
            $(`#inputQuantity-${cart_id}`).val(result.price.qty)
            $(`#totalPrice-${cart_id}`).text(result.price.total_price)
            $("#cartTotalAmount").text(result.total)
        }
    })
}


function addToCart(data) {

    let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/branch/cart',
            method: 'post',
            data: {
                food_id : data.food_id,
                price : data.price,
                _token: _token,
            },
            success: function(result) {
                let items = ``
                result.cart.forEach(element => {
                    items += `
                        <tr>
                            <td>${element.food_name}</td>
                            <td class="tx-right tx-medium tx-inverse">

                                <div class="cart-info quantity">
                                    <div class="btn-increment-decrement" onClick="decrement_quantity(${element.id})">-</div><input class="input-quantity"
                                        id="inputQuantity-${element.id}" value="${element.qty}" readonly><div class="btn-increment-decrement"
                                        onClick="increment_quantity(${element.id})">+</div>
                                </div>

                            </td>
                            <td class="tx-right tx-medium tx-inverse" id="totalPrice-${element.id}"> ${element.total_price} </td>
                            <td class="tx-right tx-medium tx-danger">
                                <a onclick="removeCart(${element.id})" class="btn btn-sm btn-danger"><i class="typcn typcn-trash"></i></a>
                            </td>
                        </tr>
                    `
                })

                $("#cartItems").html(items)
                $("#cartTotalAmount").text(result.total)

            }
        })
}

$(document).ready(function() {
    
    $('body').on('change',"#foodCategory",function() {

        let category_id = $(this).val()
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/branch/food/category',
            method: 'post',
            data: {
                id : category_id,
                _token: _token,
            },
            success: function(result) {
                // console.log(result)
                let data = ``
                result.forEach(element => {
                    data += `
                    <li style="list-style: none;" class="col-md-3 col-lg-3 col-xl-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="pro-img-box">
                                        <div class="d-flex product-sale">
                                            
                                        </div>
                                        <img class="w-100" src="/uploads/${element.picture}" alt="product-image" style="height: 88px !important">
                                        <a href="#" class="adtocart"> <i class="las la-shopping-cart "></i>
                                        </a>
                                    </div>
                                    <div class="text-center pt-3">
                                        <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">${element.food_name}</h3>
                                        <h6 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">${element.discount_price}৳ </h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                    `
                })
                // console.log(data)
                $("#myUL").html(data)
            }
        })
    })

    // alert('kdldk')

    
})

$(document).ready(function() {
    $('body').on('change',"#customer_id",function() {
        let customer_id = $(this).val()
        $("#setCustomerId").val(customer_id)
        $("#setCustomerIdInPaymentModel").val(customer_id)
    })
})

$.ajax({
    url: '/branch/cart/list',
    method: 'get',
    dataType: 'json',
    success: function(result) {
        let items = ``
                result.cart.forEach(element => {
                    items += `
                        <tr>
                            <td>${element.food_name}</td>
                            <td class="tx-right tx-medium tx-inverse">

                                <div class="cart-info quantity">
                                    <div class="btn-increment-decrement" onClick="decrement_quantity(${element.id})">-</div><input class="input-quantity"
                                        id="inputQuantity-${element.id}" value="${element.qty}" readonly><div class="btn-increment-decrement"
                                        onClick="increment_quantity(${element.id})">+</div>
                                </div>

                            </td>
                            <td class="tx-right tx-medium tx-inverse" id="totalPrice-${element.id}"> ${element.total_price} </td>
                            <td class="tx-right tx-medium tx-danger">
                                <button onclick="removeCart(${element.id})" class="btn btn-sm btn-danger"><i class="typcn typcn-trash"></i></button>
                            </td>
                        </tr>
                    `
                })

            $("#cartItems").html(items)
            $("#cartTotalAmount").text(result.total)

    }
})

function removeCart(id) {
    $.ajax({
        url: '/branch/cart/remove/'+id,
        method: 'get',
        dataType: 'json',
        success: function(result) {
            let items = ``
                    result.cart.forEach(element => {
                        items += `
                            <tr>
                                <td>${element.food_name}</td>
                                <td class="tx-right tx-medium tx-inverse">

                                    <div class="cart-info quantity">
                                        <div class="btn-increment-decrement" onClick="decrement_quantity(1)">-</div><input class="input-quantity"
                                            id="input-quantity-1>" value="${element.qty}" readonly><div class="btn-increment-decrement"
                                            onClick="increment_quantity(1)">+</div>
                                    </div>

                                </td>
                                <td class="tx-right tx-medium tx-inverse"> ${element.total_price} </td>
                                <td class="tx-right tx-medium tx-danger">
                                    <button onclick="removeCart(${element.id})" class="btn btn-sm btn-danger"><i class="typcn typcn-trash"></i></button>
                                </td>
                            </tr>
                        `
                    })

                $("#cartItems").html(items)
                $("#cartTotalAmount").text(result.total)

        }
    })
}

</script>


<!-- row closed -->
@include('branch.pos.inc.footer')
