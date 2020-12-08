@extends('layouts.branch_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>

<div class="row row-sm">
    <div class="col-md-12 col-xl-12">
        <div class=" main-content-body-invoice">
            <div class="card card-invoice">
                <div class="card-body">
                    <div class="invoice-header">
                        <h1 class="invoice-title">Invoice</h1>
                        <div class="billed-from">
                            <h6>{{ $restarunt->restaurant_name }}</h6>
                            <p>{{ $restarunt->address }}<br>
                            Tel No: {{ $restarunt->phone }}<br>
                            Email: {{ $restarunt->email }}</p>
                        </div><!-- billed-from -->
                    </div><!-- invoice-header -->
                    <div class="row mg-t-20">
                        <div class="col-md">
                        </div>
                        <div class="col-md">
                            <label class="tx-gray-600">Invoice Information</label>
                            <p class="invoice-info-row"><span>Invoice No</span> <span>RES-{{ $sale->id }}</span></p>
                            <p class="invoice-info-row"><span>Issue Date:</span> <span>{{ $sale->order_date }}</span></p>
                            <p class="invoice-info-row"><span>Total Amount:</span> <span>{{ $sale->orderFoods->sum('total_price') }}</span></p>
                        </div>

                    <div class="table-responsive mg-t-40">
                        <table class="table table-invoice border text-md-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="">SL. NO.</th>
                                    <th class="">Particulars</th>
                                    <th class="tx-center">Quantity</th>
                                    <th class="tx-center">Unit Price</th>
                                    <th class="tx-center">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sale->orderFoods as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->food->food_name }}</td>
                                        <td class="tx-center">{{ $item->qty }}</td>
                                        <td class="tx-center">{{ $item->price }}</td>
                                        <td class="tx-center">{{ $item->total_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="">
                    <div class=" mt-5">
                        <a href="#" class="btn btn-danger float-right mt-3 ml-2">
                            <i class="mdi mdi-printer mr-1"></i>Print
                        </a>
    
    
                        <form class="float-right mt-3 ml-2" action="{{ route('take.payment.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="total_amount" value="{{ $sale->orderFoods->sum('total_price') }}">
                            <input type="hidden" name="payment_type" value="Cash">
                            <input type="hidden" name="order_id" value="{{ $sale->id}}">
                            <button type="submit" class="btn btn-purple">
                                <i class="mdi mdi-currency-usd mr-1"></i>Hand Cash
                            </button>
                        </form>
                        
                        <a href="#" class="btn btn-success float-right mt-3">
                            <i class="mdi mdi-telegram mr-1"></i>Multple
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- COL-END -->
</div>


@endsection