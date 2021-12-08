<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Invoice</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>
<body class="login-page" style="background: white">

    <div>
        <div class="row">
            <div class="col-xs-7">
                <h4>From:</h4>
                <strong>Muskan Inc.</strong><br>
                Dhaka, Bangladesh Ltd. <br>
                P: (+880) 1924-770104 <br>
                E: muskan@gmail.com <br>

                <br>
            </div>

            <div class="col-xs-4 text-right">
                <img src="https://i.ibb.co/N6H8NXy/muskan-logo-front.png" alt="logo">
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-6">
                <h4>To:</h4>
                <address>
                    <strong>{{App\Models\User::find($order->user_id)->name}}</strong><br>
                    <span>{{App\Models\Order_Billing_details::find(App\Models\Order_Billing_details::where('order_id', $order->id)->first()->id)->address}}</span> <br>
                    <span>{{App\Models\City::find(App\Models\Order_Billing_details::where('order_id', $order->id)->first()->city_id)->name}}, {{App\Models\Country::find(App\Models\Order_Billing_details::where('order_id', $order->id)->first()->country_id)->name}}</span>
                </address>
            </div>

            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <th>Order Id:</th>
                            <td class="text-right">{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                        </tr>
                        <tr>
                            <th> Order Date: </th>
                            <td class="text-right">{{$order->created_at->format('d-M-Y')}}</td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-bottom: 0px">&nbsp;</div>

                <table style="width: 100%; margin-bottom: 20px">
                    <tbody>
                        <tr class="well" style="padding: 5px">
                            <th style="padding: 5px"><div> Amount </div></th>
                            <td style="padding: 5px" class="text-right"><strong> BDT {{$order->sub_total}} </strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <table class="table">
            <thead style="background: #F5F5F5;">
                <tr>
                    <th>Item List</th>
                    <th></th>
                    <th class="text-right">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Product::find(App\Models\Order_Product_Details::where('order_id', $order->id)->get('product_id')) as $item)
                <tr>
                    <td><div><strong>{{ $item->product_name }}</strong></div><p>
                        {{App\Models\Order_Product_Details::find(App\Models\Order_Product_Details::where('order_id', $order->id)->where('product_id', $item->id)->first()->id)->product_quantity}} Pcs.
                    </p>
                        </td>
                        <td></td>
                        <td class="text-right">BDT {{App\Models\Order_Product_Details::find(App\Models\Order_Product_Details::where('order_id', $order->id)->where('product_id', $item->id)->first()->id)->product_quantity * $item->product_price}} </td>
                </tr> 
                @endforeach               
            </tbody>
        </table>

            <div class="row">
                <div class="col-xs-6"></div>
                <div class="col-xs-5">
                    <table style="width: 100%">
                        <tbody>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Amount </div></th>
                                <td style="padding: 5px" class="text-right"><strong> BDT {{$order->sub_total}} </strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="margin-bottom: 0px">&nbsp;</div>

            <div class="row">
                <div class="col-xs-8 invbody-terms">
                    Thank you for your business. <br>
                    <br>
                    <h4>Payment Terms</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eius quia, aut doloremque, voluptatibus quam ipsa sit sed enim nam dicta. Soluta eaque rem necessitatibus commodi, autem facilis iusto impedit!</p>
                </div>
            </div>
        </div>

    </body>
    </html>