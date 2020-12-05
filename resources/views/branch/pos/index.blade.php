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
                <div class="row row-sm" id="myUL" style="height: 350px;overflow: scroll;">

                    @foreach ($foods as $food)
                        <li style="list-style: none;" class="col-md-3 col-lg-3 col-xl-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="pro-img-box">
                                        <div class="d-flex product-sale">
                                            {{-- <div class="badge bg-pink">New</div> --}}
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
                <div class="mb-5">
                    <h5>Cart Item</h5>
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
                        <tbody>
                            
                            <tr>
                                <td>dgdfgfsad</td>
                                <td class="tx-right tx-medium tx-inverse">

                                    <div class="cart-info quantity">
                                        <div class="btn-increment-decrement" onClick="decrement_quantity(1)">-</div><input class="input-quantity"
                                            id="input-quantity-1>" value="12"><div class="btn-increment-decrement"
                                            onClick="increment_quantity(1)">+</div>
                                    </div>

                                </td>
                                <td class="tx-right tx-medium tx-inverse">$658.20</td>
                                <td class="tx-right tx-medium tx-danger">
                                    <a href="" class="btn btn-sm btn-danger"><i class="typcn typcn-trash"></i></a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
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
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    var newQuantity = parseInt($(inputQuantityElement).val())+1;
    save_to_db(cart_id, newQuantity);
}

function decrement_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    if($(inputQuantityElement).val() > 1) 
    {
    var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
    save_to_db(cart_id, newQuantity);
    }
}

function save_to_db(cart_id, new_quantity) {
	var inputQuantityElement = $("#input-quantity-"+cart_id);
    $.ajax({
		url : "update_cart_quantity.php",
		data : "cart_id="+cart_id+"&new_quantity="+new_quantity,
		type : 'post',
		success : function(response) {
			$(inputQuantityElement).val(new_quantity);
		}
	});
}

function addToCart(data) {
    console.log(data)
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
                console.log(result)
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

})

</script>


<!-- row closed -->
@include('branch.pos.inc.footer')
