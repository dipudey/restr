@extends('layouts.branch_master')

@section('content')

<div class="breadcrumb-header justify-content-between"></div>

<div class="row row-sm">
    <div class="col-md-12">

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Stock Out</h4>
                            <i class="mdi text-gray">
                            </i>
                        </div>
                    </div>

                    <div class="card-body mt-4">
                        <div class="table-responsive">

                            <form action="{{ route('out.stock') }}" method="POST">
                                @csrf
                                <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap" id="">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p border-bottom-0">Name</th>
                                            <th class="wd-10p border-bottom-0">Quantity</th>
                                            {{-- <th class="wd-10p border-bottom-0">Price</th> --}}
                                            {{-- <th class="wd-10p border-bottom-0">Total</th> --}}
                                            <th class="wd-10p border-bottom-0">
                                                <button type="button" class="btn btn-success btn-sm add" id="add">+</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="item_table">
                
                                    </tbody>
                                </table>
                
                                <div class="float-right mt-4">
                                    <button class="btn btn-success" type="submit" id="submitbutton">Save</button>
                                </div>
                
                            </form>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>

    $(document).ready(function() {
        var count = 0;
        $('body').on('click',"#add",function() {
            // product list 
            let product = "";
            $.ajax({
                url: '/branch/product/json',
                method: 'get',
                dataType: 'json',
                async: false,
                success: function(data) {
                    let html = ""
                    html += "<option value=''>Select Product</option>"
                    data.forEach(element => {
                        html += `<option value="${element.id}">${element.product_name} >>> ${element.product_attribute} </option>`
                    })
                    
                    product = html;
                }
            })

            count++;

            var html = '';
            html += '<tr>';
            html += `<td><select class="form-control" id="product_list" name="product_id[]" data-price_id="${count}" required>${product}</select></td>`;
            html += `<td><input type="number" name="quantity[]" class="form-control quantityAdd${count}" id="quantityAdd" data-total_amount_id="${count} required"/></td>`;
            // html += `<td><input type="text" name="price[]" class="form-control" id="price${count}" readonly/></td>`;
            // html += `<td><input type="text" name="total[]" class="form-control total" value="0" id="totalPrice${count}" readonly/></td>`;
            html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span>-</button></td></tr>';
            $("#item_table").append(html)
        })



        $(document).on('click', '.remove', function(){
            $(this).closest('tr').remove();
            sumbitButton();
        });

        // $(document).on('input',"#quantityAdd",function(e) {
        //     let total_amount_id = $(this).data('total_amount_id')
        //     let price = $(`#price${total_amount_id}`).val()
        //     let val = e.target.value
        //     let total_price = val * price 
        //     $(`#totalPrice${total_amount_id}`).val(total_price)

        //     $("#add_total_amount").text(sum())
        //     $("#add_total_amount_input").val(sum())

        //     sumbitButton()

            
        // })

        // $(document).on('change','#product_list',function(){
        //     let price_id = $(this).data('price_id')
        //     let product_id = $(this).val()
            
        //     $(`.quantityAdd${price_id}`).removeAttr('disabled')
        //     $(this).attr('readonly',true)
            
        //     $.ajax({
        //         url: `/branch/product/${product_id}`,
        //         method: 'get',
        //         dataType: 'json',
        //         success: function(data) {
        //             console.log(data)
        //             $(`#price${price_id}`).val(data.selling_price)
        //         }
        //     })
        // })



        // budget data 
        // $(document).on('input',"#budget",function(e) {
        //     let val = e.target.value
        //     $("#add_budget").text(val)
        // })



        // total Amount 
        // function sum(){
        //     var total = 0;
        //     $('tr').each(function() {
        //         $(this).find('.total').html($('input:eq(0)', this).val() * $('input:eq(1)', this).val());
        //     });
        //     $('.total').each(function() {
        //         total += parseInt($(this).text(),10);
        //     });
        //     return total
        // }


        // function sumbitButton() {
        //     let budget = $("#budget").val()
        //     let total_amount = $("#add_total_amount_input").val()

        //     if (budget < sum()) {
        //         $("#alert").text("Your Total Amount Is High To Your Budget")
        //         $("#submitbutton").attr('disabled',true)
        //     }

        //     if(budget > sum()) {
        //         $("#alert").text(" ")
        //         $("#submitbutton").removeAttr('disabled')
        //     }

        //     if(budget == sum()) {
        //         $("#alert").text(" ")
        //         $("#submitbutton").removeAttr('disabled')
        //     } 
            
        // }


        
        
    })

</script>

@endsection