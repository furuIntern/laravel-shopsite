@if ($order->isNotEmpty())    
    @foreach ($order as $infor)
        <div>
            <h4>Your Order</h4>
            <div class="card">
                <div class="row p-2">
                    <span class="col-md-4">Name: {{$infor->name}}</span>
                    <span class="col-md-4">Phone: {{$infor->phone}}</span>
                    <span class="col-md-4">Address: {{$infor->address}}</span>
                </div>
                <div class="row p-2">
                    <span class="col-md-4">Amount: {{$infor->total_amount}}</span>
                    <span class="col-md-4">Price: {{$infor->total_price}}</span>
                </div>
            </div>
        </div>
    
        <div class="d-flex justify-content-center">
            <a class="btn btn-primary m-3" href="" id="detailOG">Detail</a>
            <a class="btn btn-primary m-3" href="" id="deleteOG">Delete</a>
        </div>
    @endforeach
@else
    <div class="alert alert-danger text-center">Order Not Exict</div>
@endif
    