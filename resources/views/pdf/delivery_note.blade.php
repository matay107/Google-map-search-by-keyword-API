<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Delivery Note</title>
</head>

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

    body{
        font-family: 'THSarabunNew';
    }

    .page-break {
        page-break-after: always;
    }

    .vehicle-note {
        width: 100%;
    }

    .head-text {
        width: calc(100% - 30px);
        padding: 0px 15px;
        border: 2px solid black;
        margin-bottom: 10px;
    }

    .vehicle-detail {
        width: calc(100% - 30px);
        padding: 5px 15px;
        border: 2px solid black;
        margin-bottom: 10px;
    }

    .vehicle-note-image {
        width: calc(100% - 30px);
        padding: 5px 15px;
        border: 2px solid black;
    }

    .vehicle-note-image img {
        width: 100%;
        height: auto;
    }

    table {
        width: 100%;
    }

    .tb-head tr td:first-child,.tb-head tr td:last-child{
        width: 20%;
    }
</style>
<body>
    @forelse(collect($data)->chunk(4) as $index => $item)
    <div class="vehicle-note">
        <div class="head-text">
            <table class="tb-head">
                <tr>
                    <td>
                        <img width="50" src="https://mcwlogistics.com/home/images/MCW%20Light%20grey%20BG.png">
                    </td>
                    <td style="text-align: center;">
                        <h1 style="margin: 0px;padding: 0px;">AAT DOMESTIC DELIVERY NOTE</h1>
                    </td>
                    <td style="text-align: right;">
                        <span style="font-size: 14px;">SI. NO {{ $item->first()->load_number }}</span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="vehicle-detail">
            <table>
                <tr>
                    <td style="text-align: center;">No</td>
                    <td style="text-align: center;">VIN</td>
                    <td style="text-align: center;">LANE</td>
                    <td style="text-align: center;">COLOR NAME</td>
                    <td>DEALER NAME</td>
                    <td>DEALER CODE</td>
                    <td style="text-align: center;">SI DATE</td>
                </tr>
                @foreach($item as $i => $vehicle)
                    <tr>
                        <td style="text-align: center;">{{ ( $index * 4 ) + $i + 1 }}</td>
                        <td>{{ $vehicle->vin }}</td>
                        <td>{{ $vehicle->load_lane }}</td>
                        <td></td>
                        <td>
                            @if(collect($vehicle->destination)->isNotEmpty() && collect($vehicle->destination->dealer)->isNotEmpty())
                                {{ $vehicle->destination->dealer->dealer_name }}
                            @endif
                        </td>
                        <td>
                            @if(collect($vehicle->destination)->isNotEmpty() && collect($vehicle->destination->dealer)->isNotEmpty())
                                {{ $vehicle->destination->dealer->dealer_code }}
                            @endif
                        </td>
                        <td>{{ ($vehicle->deliver_date)?date('d/m/Y',strtotime($vehicle->deliver_date)):"" }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="vehicle-note-image">
            <img src="{{ asset('public/images/vehicle_note.png') }}" alt="vehicle note">
        </div>
    </div>
{{--    <div class="page-break"></div>--}}
    @empty
    @endforelse
</body>
</html>
