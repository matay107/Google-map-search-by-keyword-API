<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Transport Order</title>


    <style>

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('public/fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ asset('public/fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ asset('public/fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ asset('public/fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
        .page-break {
            page-break-after: always;
        }
        html {
            margin: 0;
        }
        body{
            font-family: 'THSarabunNew';
            /*font-size: 20px;*/
        }
        .printarea {
            margin: 0 auto;
            width: calc(100vw);
            overflow: hidden;
        }

        .tb {
            width: 100%;
        }

        .col {
            width: calc(100%/12);
        }

        p {
            margin-top: 0;
            margin-bottom: 15px;
        }

        .tb h2 {
            font-size: 32px;
            font-weight: bold;
            margin: 0;
        }

        .tb .right {
            text-align: right;
        }

        .tb .left {
            text-align: left;
        }

        .tb .center {
            text-align: center;
        }

        .tb-content tr.title td {
            padding: 2px 10px;
        }

        .tb-content tr td {
            text-align: center;
        }

        .image-container {
            vertical-align: bottom;
        }

        img {
            vertical-align: bottom;
            /*margin-bottom: 5px;*/
            bottom: 0px;
            /*max-width: 50px;*/
        }

        img.barcode {
            width: 150px;
            height: 30px;
        }

    </style>
</head>
<body>

<div class="printarea">


    <table class="tb">
        <tr>
            <td class="col"></td>
            <td class="col"></td>
            <td class="col"></td>
            <td class="col"></td>
            <td class="col"></td>
            <td class="col"></td>
            <td class="col"></td>
            <td class="col"></td>
            <td class="col"></td>
            <td class="col"></td>
            <td class="col"></td>
            <td class="col"></td>
        </tr>
        <tr>
            <td colspan="2">
                <img width="50" src="https://mcwlogistics.com/home/images/MCW%20Light%20grey%20BG.png">
            </td>
            <td colspan="6">
                <h2>Transport Order</h2>
            </td>
            <td colspan="4" class="right">
                Printed Date : {{ date("d/m/Y") }}
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: left;">
                <img class="barcode" src="data:image/png;base64,{!! DNS1D::getBarcodePNG($load->load_number,"C128") !!}">
                <p style="margin-bottom: 0px;">
                    Load Number : {{ $load->load_number }}
                </p>
            </td>

            <td colspan="6" style="text-align: right;">
                @if($load->customer_load_no )
                    <img class="barcode" src="data:image/png;base64,{!! DNS1D::getBarcodePNG($load->customer_load_no,"C128") !!}">
                    <p style="margin-bottom: 0px;">
                        Customer Load No : {{ $load->customer_load_no }}
                    </p>
                @endif
            </td>
        </tr>
        <tr style="font-size: 20px;">
            {{--<td colspan="2" class="image-container">
                <img class="barcode" src="data:image/png;base64,{!! DNS1D::getBarcodePNG($data->first()->load_number,"C128") !!}">
                <span style="margin-left: 5px; vertical-align: middle;">
                    Load Number : {{ $data->first()->load_number }}
                </span>
            </td>
            <td colspan="2" class="{{ ($data->first()->customer_load_no )?"image-container":"" }}">
                @if(!$data->first()->customer_load_no )
                    <img class="barcode" src="data:image/png;base64,{!! DNS1D::getBarcodePNG($data->first()->load_number,"C128") !!}">
                @endif
                <span style="margin-left: 5px; vertical-align: middle;">
                    Customer Load No : {{ $data->first()->customer_load_no }}
                </span>
            </td>--}}
            <td>Customer Name : {{ $load->custormer_code }}</td>
            <td>Carrier : {{ $load->carrier_code }}</td>
            <td>Load Lane : {{ $load->load_land }}</td>
            <td>Truck Number : {{ $load->license_number }}</td>
            <td colspan="8" style="text-align: center;">
                @if(collect($data)->isNotEmpty() && collect($data->first()->destination)->isNotEmpty())
                <span style="color: red; font-weight: bold;font-size: 32px;margin-top: 10px;">
                    {{--กิ่งไม้ต่ำเยอะมาก--}}
                    {{ $data->first()->destination->remark }}
                </span>
                @endif
            </td>
        </tr>
    </table>
    <hr>

    <table class="tb tb-content">
        <tr class="title">
            <td>Vin</td>
            <td>Make/Model/Color</td>
            <td>Origin</td>
            <td>Destination</td>
            <td>Address</td>
            <td>Load Position</td>
            <td>ETD Depart Date/Time</td>
            <td>ETA Arrive Date/Time</td>
        </tr>
        @forelse($data as $item)
            <tr style="margin-bottom: 25px;">
                <td class="image-container">
                    <img class="barcode" src="data:image/png;base64,{!! DNS1D::getBarcodePNG($item->vin,"C128") !!}">
                    <p style="margin-bottom: 5px;">{{ $item->vin }}</p>
                </td>
                <td class="">{{ $item->make_code }}</td>
                <td class="">{{ $item->yard_code }}</td>
                <td class="left">
                    @if(collect($item->destination)->isNotEmpty() && collect($item->destination->dealer)->isNotEmpty())
                        {{ $item->destination_code.' '.$item->destination->dealer->dealer_name }}
                    @endif
                </td>
                <td class="left">
                    @if(collect($item->destination)->isNotEmpty() && collect($item->destination->dealer)->isNotEmpty())
                        {{ $item->destination->dealer->address }}
                    @endif
                </td>
                <td class="">{{ @$item->load_position }}</td>
                <td class="">
                    {{ ($item->ETA_ship_date)? date("Y-m-d H:i:s", strtotime($item->ETA_ship_date)):'' }}
                </td>
                <td class="">
                    {{ ($item->ETD_delivery_date)? date("Y-m-d H:i:s", strtotime($item->ETD_delivery_date)):'' }}
                </td>
            </tr>
        @empty
        @endforelse
    </table>
</div>
{{--<div class="page-break"></div>--}}
</body>
</html>
