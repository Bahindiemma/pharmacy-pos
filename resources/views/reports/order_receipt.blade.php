<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt - Order #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            font-size: 12px;
            line-height: 1.4;
        }
        #invoice-POS {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 0 auto;
            width: 80mm;
            background: #FFF;
        }
        #top, #mid, #bot {
            border-bottom: 1px solid #EEE;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        #invoice-POS .logo {
            width: 60px;
            height: 60px;
            background-size: 60px 60px;
            background-repeat: no-repeat;
            margin: 0 auto;
        }
        #invoice-POS h2, #invoice-POS h3 {
            margin: 5px 0;
            font-weight: bold;
            color: #333;
        }
        #invoice-POS p {
            margin: 2px 0;
        }
        #invoice-POS table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        #invoice-POS .tabletitle {
            background: #EEE;
            font-weight: bold;
        }
        #invoice-POS .service {
            border-bottom: 1px solid #EEE;
        }
        #invoice-POS .itemtext {
            text-align: center;
        }
        #invoice-POS .legalcopy {
            text-align: center;
            font-size: 10px;
            margin-top: 15mm;
        }
        #invoice-POS .legal {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="invoice-POS">
        <center id="top">
            <div class="logo" style="background-image: url('{{ asset('dash/img/favicon.png') }}');"></div>
            <div class="info">
                <h2>Pharmacy Inc</h2>
            </div>
        </center>

        <div id="mid">
            <div class="info">
                <h2>Contact Info</h2>
                <p>
                    Address: business address</br>
                    Email: business email</br>
                    Phone: 555-555-5555</br>
                </p>
            </div>
        </div>

        <div id="bot">
            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="Rate"><h4>#</h4></td>
                        <td class="item"><h4>ITEM(s)</h4></td>
                        <td class="Hours"><h4>QTY</h4></td>
                        <td class="Hours"><h4>UNIT</h4></td>
                        <td class="Hours"><h4>DISC</h4></td>
                        <td class="item"><h4>SUB TOTAL</h4></td>
                    </tr>

                    @foreach ($order->orderdetail as $key => $detail)
                        <tr class="service">
                            <td class="tableitem"><p class="itemmake">{{ $key + 1 }}</p></td>
                            <td class="tableitem"><p class="itemmake">{{ $detail->pdt->product_name }}</p></td>
                            <td class="tableitem"><p class="itemtext">{{ $detail->quantity }}</p></td>
                            <td class="tableitem"><p class="itemtext">{{ number_format($detail->unit_price, 2) }}</p></td>
                            <td class="tableitem"><p class="itemtext">{{ $detail->discount ? number_format($detail->discount, 2) : '0.00' }}</p></td>
                            <td class="tableitem"><p class="itemmake">{{ number_format($detail->amount, 2) }}</p></td>
                        </tr>
                    @endforeach

                    <tr class="tabletitle">
                        <td colspan="4"></td>
                        <td class="Rate"><h4>Total:</h4></td>
                        <td class="payment"><h4>{{ number_format($order->orderdetail->sum('amount'), 2) }}</h4></td>
                    </tr>

                </table>
            </div>

            <div id="legalcopy">
                <p class="legal"><strong>Thank you for your business!</strong></p>
            </div>
        </div>
    </div>
</body>
</html>
