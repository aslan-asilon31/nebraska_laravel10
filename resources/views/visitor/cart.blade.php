@extends('../layouts/frontend')

@section('content')

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($cartItems as $item)
                        <tr>
                            <td class="align-middle"><img src="{{ $item->attributes->image }}" alt="" style="width: 50px;"> {{ $item->name }}</td>
                            <td class="align-middle">Rp {{ $item->price }}</td>
                            <td class="align-middle">
                                
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id}}" >
                                  <input type="text" name="quantity" value="{{ $item->quantity }}" 
                                  class="w-6 text-center h-6 text-gray-800 outline-none rounded border border-blue-600" style="width:75px;" />
                                  <button class="px-4 mt-1 py-1.5 text-sm rounded rounded shadow btn btn-sm btn-success">Update</button>
                                  </form>

                            </td>
                            <td class="align-middle">Rp {{ Cart::getTotal() }}</td>
                            {{-- <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td> --}}
                            <td>                          
                                <form action="{{ route('cart.clear') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Rp {{ Cart::getTotal() }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium"> <span class="badge badge-success">Free Ongkos Kirim</span> </h6>
                            <h6 class="font-weight-medium">Rp 0</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>Rp {{ Cart::getTotal() }}</h5>
                        </div>
                        <a href="{{ route('checkout') }}" type="" class="btn btn-block btn-primary font-weight-bold my-3 py-3" id="pay-button">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    {{-- <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
              /* You may add your own implementation here */
              alert("payment success!"); console.log(result);
            },
            onPending: function(result){
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          })
        });
    </script> --}}

@endsection
