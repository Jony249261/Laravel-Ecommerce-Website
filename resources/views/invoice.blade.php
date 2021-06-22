
@extends('layouts.frontend_master');
@section('custom_css')
<style>

    /* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: center; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }



/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: green; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em .5em; }
header address { float: left; font-size: 95%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
article address.norm h4 {
	font-size: 125%;
	font-weight: bold;
}
article address.norm { float: left; font-size: 95%; font-style: normal; font-weight: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th:first-child {
	width:50px;
}
table.inventory th:nth-child(2) {
	width:300px;
}
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: center; width: 12%; }
table.inventory td:nth-child(4) { text-align: center; width: 12%; }
table.inventory td:nth-child(5) { text-align: center; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: center; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

table.sign {
	float: left;
	width: 220px;
}
table.sign img {
	width: 100%;
}
table.sign tr td {
	border-color: transparent;
}
@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
</style>
@endsection

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        @php
                            $category = App\Category::where('status', 1)->latest()->get();
                        @endphp

                        <ul>
                        @foreach($category as $row)
                            <li><a href="{{url('category/'.$row->id)}}">{{$row->category_name}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{route('search')}}" method="get">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" name="search" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+01767100058</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Order Invoice</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Invoice</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

         <!-- Checkout Section Begin -->
    <section class="checkout spad" >
        <div class="container" id="mySelector">
            <header>
			<h1>Invoice</h1>
			<address >
				<p> jony.jusr.cse@gmail.com </p>
				<p> Mirpur 12 Dhaka Bangladesh </p>
				<p> P: 01767100058 </p>
				<p> Business Number: 01567890910 </p>
			</address>
			<span></span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address class="norm">
				<h4>{{$shipping->shipping_first_name}} {{$shipping->shipping_last_name}}</h4>
				<p> Email: {{$shipping->shipping_email}} <br>
				<p> Phone: {{$shipping->shipping_phone}}<br>
				<p> Address: {{$shipping->shipping_address}}</p>
			</address>
			
			<table class="meta">
				<tr>
					<th><span >Invoice #</span></th>
					<td><span >{{$order->invoice_no}}</span></td>
				</tr>
				<tr>
					<th><span >Date</span></th>
					<td><span >January 1, 2019</span></td>
				</tr>
				<tr>
					<th><span >Amount</span></th>
					<td><span id="prefix" >$</span><span>{{$order->total}}</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span >S. No</span></th>
						<th><span >Product Name</span></th>
						<th><span >Image</span></th>
						<th><span >Qty</span></th>
						<th><span >Price</span></th>
						<th><span >Amount</span></th>
					</tr>
				</thead>
				<tbody >
          @php
              $i = 1;
          @endphp
          @foreach ($orderitems as $orders)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$orders->product->product_name}}</td>
						<td><img src="{{ asset($orders->product->image_one) }}" width="50px" height="50px" alt=""></td>
						<td>{{$orders->product_qty}}</td>
						<td>${{$orders->product->price}}</td>
						<td>${{$orders->product->price * $orders->product_qty}}</td>
					</tr>
          @endforeach
				</tbody>
			</table>
			<table class="sign">
				<tr>
					<td></td>
				</tr>
			</table>

			<table class="balance">
      <tr>
					<th><span >Subtotal</span></th>
					<td><span data-prefix>$</span><span>{{$order->subtotal}}</span></td>
				</tr>
        <tr>
					<th><span >Discount</span></th>
					<td><span data-prefix>$</span><span>{{$order->subtotal - $order->total}}</span></td>
				</tr>
				<tr>
					<th><span >Total</span></th>
					<td><span data-prefix>$</span><span>{{$order->total}}</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span >Additional Notes</span></h1>
			<div >
				<p>We offer limited 10 days refund policy and 30 days workmanship warranty on all of our services. For more details, please read our refund policy below.</p>
			</div>
		</aside>
       
    </section>
<div class="hidden-print" style="margin-top:-50px; margin-bottom:70px; padding-right:175px;">
                                <div class="pull-right">
                                    <button id="print" class="btn btn-success btn-lg waves-effect waves-light"><i class="fa fa-print"></i></button>
                                </div>
                            </div>
        </div>
    @endsection

    @section('custom_script')
      <script>
        $('#print').click(function (){
        $("#mySelector").printThis({
            debug: false,               // show the iframe for debugging
            importCSS: true,            // import parent page css
            importStyle: true,         // import style tags
            printContainer: true,       // print outer container/$.selector
            loadCSS: "",                // path to additional css file - use an array [] for multiple
            pageTitle: "",              // add title to print page
            removeInline: false,        // remove inline styles from print elements
            removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
            printDelay: 333,            // variable print delay
            header: null,               // prefix to html
            footer: null,               // postfix to html
            base: false,                // preserve the BASE tag or accept a string for the URL
            formValues: true,           // preserve input/form values
            canvas: true,              // copy canvas content
            doctypeString: '...',       // enter a different doctype for older markup
            removeScripts: false,       // remove script tags from print content
            copyTagClasses: false,      // copy classes from the html & body tag
            beforePrintEvent: null,     // function for printEvent in iframe
            beforePrint: null,          // function called before iframe is filled
            afterPrint: null            // function called before iframe is removed
        });
        })
    </script>
    @endsection