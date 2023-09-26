<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<style>
    #invoice-POS {
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 46mm;
        background: #FFF;
        background-repeat: no-repeat;
    }

    #invoice-POS ::selection {
        background: #f31544;
        color: #FFF;
    }

    #invoice-POS ::moz-selection {
        background: #f31544;
        color: #FFF;
    }

    #invoice-POS h1 {
        font-size: 1.5em;
        color: #222;
    }

    #invoice-POS h2 {
        font-size: .9em;
    }

    #invoice-POS h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    #invoice-POS p {
        font-size: .7em;
        color: #666;
        line-height: 1.2em;
    }

    #invoice-POS #top,
    #invoice-POS #mid,
    #invoice-POS #bot {
        /* Targets all id with 'col-' */
        border-bottom: 1px solid #EEE;
    }

    #invoice-POS #top {
        min-height: 100px;
    }

    #invoice-POS #mid {
        min-height: 80px;
    }

    #invoice-POS #bot {
        min-height: 50px;
    }

    #invoice-POS #top .logo {
        height: 60px;
        width: 60px;
        background: url({{ asset('dash/img/favicon.png') }}) no-repeat;
        background-size: 60px 60px;
    }

    #invoice-POS .clientlogo {
        float: left;
        height: 60px;
        width: 60px;
        background-size: 60px 60px;
        border-radius: 50px;
    }

    #invoice-POS .info {
        display: block;
        margin-left: 0;
    }

    #invoice-POS .title {
        float: right;
    }

    #invoice-POS .title p {
        text-align: right;
    }

    #invoice-POS table {
        width: 100%;
        border-collapse: collapse;
    }

    #invoice-POS .tabletitle {
        font-size: .5em;
        background: #EEE;
    }

    #invoice-POS .service {
        border-bottom: 1px solid #EEE;
    }

    #invoice-POS .item {
        width: 24mm;
    }

    #invoice-POS .itemtext {
        font-size: .5em;
        text-align: center;
    }

    #invoice-POS .itemmake {
        font-size: .5em;
        text-align: left;
    }

    #invoice-POS .payment {
        font-size: 10px;

    }

    #invoice-POS #legalcopy {
        margin-top: 5mm;
    }

</style>

<body>

    <div id="invoice-POS">

        <center id="top">
            <div class="logo"></div>
            <div class="info">
                <h2>Pharmacy Inc</h2>
            </div>
            <!--End Info-->
        </center>
        <!--End InvoiceTop-->

        <div id="mid">
            <div class="info">
                <h2>Contact Info</h2>
                <p>
                    Address : business address</br>
                    Email : business email</br>
                    Phone : 555-555-5555</br>
                </p>
            </div>
        </div>
        <!--End Invoice Mid-->

        <div id="bot">

            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="Rate">
                            <h2>#</h2>
                        </td>
                        <td class="item">
                            <h2>ITEM(s)</h2>
                        </td>
                        <td class="Hours">
                            <h2>QTY</h2>
                        </td>
                        <td class="Hours">
                            <h2>UNIT</h2>
                        </td>
                        <td class="Hours">
                            <h2>DISC</h2>
                        </td>
                        <td class="item">
                            <h2>SUB TOTAL</h2>
                        </td>
                    </tr>


                    @foreach ($order_receipt as $key => $receipt)
                        <tr class="service">
                            <td class="tableitem">
                                <p class="itemmake">{{ $key + 1 }}.</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemmake">{{ $receipt->product->product_name }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ $receipt->quantity }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ number_format($receipt->unitprice, 2) }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ $receipt->discount ? ' ' : '0' }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemmake">{{ number_format($receipt->amount, 2) }}</p>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="tabletitle">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="Rate">
                            <h2>Total: </h2>
                        </td>
                        <td class="payment">
                            <h2>#{{ number_format($order_receipt->sum('amount'), 2) }}</h2>
                        </td>
                    </tr>

                </table>
            </div>
            <!--End Table-->

            <div id="legalcopy">
                <p class="legal"><strong>Thank you for your business!</strong>
                </p>
            </div>

        </div>
        <!--End InvoiceBot-->
    </div>
    <!--End Invoice-->


</body>

</html>
