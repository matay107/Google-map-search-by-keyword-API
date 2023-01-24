<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Parking Slip</title>


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
        body{
            font-family: 'THSarabunNew';
        }
        .printarea {
            margin: 0 auto;
            width: calc(100vw);
            overflow: hidden;
        }
        .table, .table th, .table td {
            border: 2px solid black;
            border-collapse: collapse;
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

        .tb tr.title td {
            padding: 2px 10px;
            text-align: center;
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
            <td colspan="4">
                <img width="50" src="https://mcwlogistics.com/home/images/MCW%20Light%20grey%20BG.png">
            </td>
            <td colspan="4" class="center">
                <h2>Parking slip</h2>
            </td>
            <td colspan="4" class="right">
                Printed Date : {{ date("d/m/Y") }}
            </td>
        </tr>
    </table>


    <table class="tb table">
        <tr class="title">
            <td>Load Number</td>
            <td>Vin</td>
            <td>Make</td>
            <td>Model</td>
            <td>Color</td>
            <td>Parking Location</td>
            <td>Load Lane</td>
            <td>Truck Number</td>
            <td>Destination</td>
        </tr>
        @forelse($data as $item)
            <tr>
                <td class="center">{{ $item->load_number }}</td>
                <td class="center">{{ $item->vin }}</td>
                <td class="center">{{ $item->make_code }}</td>
                <td class="center">{{ $item->model_code }}</td>
                <td class="center">{{ $item->exterior_color }}</td>
                <td class="center">{{ $item->vin_parking_location }}</td>
                <td class="center">{{ $item->load_lane }}</td>
                <td class="center">{{ $item->license_number }}</td>
                <td class="">
                    @if(collect($item->destination)->isNotEmpty() && collect($item->destination->dealer)->isNotEmpty())
                    {{ $item->destination_code.' '.$item->destination->dealer->dealer_name }}
                    @endif
                </td>
            </tr>
        @empty
        @endforelse
    </table>
</div>

</body>
</html>
