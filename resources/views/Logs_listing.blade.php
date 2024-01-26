<!DOCTYPE html>
<html>
<head>
    <title>Report Info</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/log.css')}}">
</head>
<body>
<button onclick="window.location.href='/'" class="btn btn-primary">Go back to Main Page</button>
<h1>Boss Report</h1>



@foreach ($queries as $fightID => $queryData)

@if(isset($queryData['data']))
    <div class="container">
        <div class="table">
            <div class="table-header">
                <div class="header__item"><a id="name_{{$fightID}}" class="filter__link" href="#">Info</a></div>
            </div>
            <div class="table-content">
                <div class="table-row">

    @foreach ($queryData['data']['reportData']['report']['fights'] as $fight)
                        <div class="table-data">Boss: {{$fight['name']}}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-data">Keystone Level: {{$fight['keystoneLevel'] ?? '-'}}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-data">
                            Difficulty:
                            @php
                            if ($fight['difficulty'] == 4) {
                                echo "Mythic";
                            } elseif ($fight['difficulty'] == 3) {
                                echo "HC";
                            } elseif ($fight['difficulty'] == 2) {
                                echo "Normal";
                            }
                            @endphp
                        </div>
                    </div>
                    <div class="table-row">
                        @php
                        $time = round((($queryData['data']['reportData']['report']['AllDataGraph']['data']['endTime']) - ($queryData['data']['reportData']['report']['AllDataGraph']['data']['startTime'])) / (1000 * 60), 2);
                        $minutes = floor($time);
                        $seconds = round(($time - $minutes) * 60);
                        $formatted_time = sprintf("%d:%02d", $minutes, $seconds);
                        @endphp
                        <div class="table-data">Time: {{$formatted_time}}</div>
                    </div>
    @endforeach

            </div>
        </div>
    </div>


@php
$DamageSeries = $queryData['data']['reportData']['report']['AllDataGraph']['data']['series'];
$healingSeries = $queryData['data']['reportData']['report']['HealingGraph']['data']['series'];
$damageTakenSeries = $queryData['data']['reportData']['report']['DamageTakenGraph']['data']['series'];

$dataMap = [];

// Combine data from different series based on character names
foreach ($DamageSeries as $damageData) {
    $name = $damageData['name'];

    if (!isset($dataMap[$name])) {
        $dataMap[$name] = [
            'name' => $name,
            'damage' => $damageData['total'] ?? 0,
            'healing' => 0,
            'damageTaken' => 0,
            'type'=> $damageData['type'],
        ];
    } else {
        $dataMap[$name]['damage'] = $damageData['total'] ?? 0;
    }
}

foreach ($healingSeries as $healingData) {
    $name = $healingData['name'];


    if (isset($dataMap[$name])) {
        $dataMap[$name]['healing'] = $healingData['total'] ?? 0;
    }
}

foreach ($damageTakenSeries as $damageTakenData) {
    $name = $damageTakenData['name'];

    if (isset($dataMap[$name])) {
        $dataMap[$name]['damageTaken'] = $damageTakenData['total'] ?? 0;
    }
}
@endphp
    <div class="container2">
    <div class="table2">
        <div class="table-header2">
            <div class="header__item2"><a id="name_{{$fightID}}" class="filter__link2" href="">Character</a></div>
            <div class="header__item2"><a id="damage_{{$fightID}}" class="filter__link2" href="">Damage</a></div>
            <div class="header__item2"><a id="healing_{{$fightID}}" class="filter__link2" href="" >Healing</a></div>
            <div class="header__item2"><a id="damageTaken_{{$fightID}}" class="filter__link2" href="">DamageTaken</a></div>
        </div>
        <div class="table-content" id="tableContent_{{$fightID}}">
        @foreach($dataMap as $data)
                <div class="table-row2">
                    <div class="table-data2"> 
                    @if(isset($data['name']))
                    <span style="color: 
                    @if($data['type'] == 'Warrior') rgb(161, 136, 127)
                    @elseif ($data['type'] == 'Warlock') rgb(179, 157, 219)
                    @elseif ($data['type'] == 'Rogue') rgb(255, 238, 88)
                    @elseif ($data['type'] == 'Hunter') rgb(102, 187, 106)
                    @elseif ($data['type'] == 'Shaman') rgb(159, 168, 218)
                    @elseif ($data['type'] == 'Paladin') rgb(240, 98, 146)
                    @elseif ($data['type'] == 'Monk') rgb(77, 182, 172)
                    @elseif ($data['type'] == 'Mage') rgb(41, 182, 246)
                    @elseif ($data['type'] == 'DeathKnight') rgb(229, 115, 115)
                    @elseif ($data['type'] == 'Druid') rgb(239, 108, 0)
                    @elseif ($data['type'] == 'Priest') rgb(224, 224, 224)
                    @elseif ($data['type'] == 'DemonHunter') #a330c9 !important
                    @elseif ($data['type'] == 'Pet') white !important
                    @endif
                ">
                {{ $data['name'] }}
                </span>
                    @else
                    N/A
                    @endif
                    </div>
                    <div class="table-data2"> 
                    @if(isset($data['damage']))
                    @if(intval($data['damage']) >= 10000)
                        {{ round($data['damage'] / 1000000, 2) }}M
                        @elseif ($data['damage'] <= 99999)
                        {{ round($data['damage'] / 1000, 2) }}K
                        @else
                        {{ $data['damage'] }}
                        @endif
                    @else
                    0
                    @endif
                    </div>
                <div class="table-data2"> 
                @if(isset($data['healing']))
                    @if(intval($data['healing']) >= 10000)
                        {{ round($data['healing'] / 1000000, 2) }}M
                        @elseif ($data['healing'] <= 9999)
                        {{ round($data['healing'] / 1000, 2) }}K
                        @else
                        {{ $data['healing'] }}
                        @endif
                    @else
                    0
                    @endif
                    </div>
                    <div class="table-data2"> 
                    @if(isset($data['damageTaken']))
                    @if(intval($data['damageTaken']) >= 10000)
                        {{ round($data['damageTaken'] / 1000000, 2) }}M
                        @elseif ($data['damageTaken'] <= 99999)
                        {{ round($data['damageTaken'] / 1000, 2) }}K
                        @else
                        {{ $data['damageTaken'] }}
                        @endif
                    @else
                    0
                    @endif
                    </div>
                    </div>
            @endforeach
        </div>
    </div>
</div>


<script>
        document.addEventListener("DOMContentLoaded", function () {
            const headers = {
                damage: document.getElementById("damage_{{$fightID}}"),
                healing: document.getElementById("healing_{{$fightID}}"),
                damageTaken: document.getElementById("damageTaken_{{$fightID}}"),
                name: document.getElementById("name_{{$fightID}}"),
            };

            const tableContent = document.getElementById("tableContent_{{$fightID}}");
            const rows = Array.from(tableContent.getElementsByClassName("table-row2"));

            for (const sortBy in headers) {
                if (headers.hasOwnProperty(sortBy)) {
                    headers[sortBy].addEventListener("click", function () {
                        sortTable(sortBy);
                    });
                }
            }

            function sortTable(sortBy) {
                rows.sort(function (a, b) {
                    const valueA = getValue(a, sortBy);
                    const valueB = getValue(b, sortBy);

                    if (sortBy === "damage" || sortBy === "healing" || sortBy === "damageTaken") {
                        return valueB - valueA;
                    } else {
                        return valueA.localeCompare(valueB);
                    }
                });

                rows.forEach(function (row) {
                    tableContent.appendChild(row);
                });
            }
            function parseValue(valueStr) 
            {
                    const num = parseFloat(valueStr);
                    if (valueStr.endsWith("K")) {
                        return num * 1000;
                    } else if (valueStr.endsWith("M")) {
                        return num * 1000000;
                    } else {
                        return num;
                    }
            }
            

function getValue(row, sortBy) {
    if (sortBy === "damage") {
        return parseValue(row.querySelector(".table-data2:nth-child(2)").textContent);
    } else if (sortBy === "healing") {
        return parseValue(row.querySelector(".table-data2:nth-child(3)").textContent);
    } else if (sortBy === "damageTaken") {
        return parseValue(row.querySelector(".table-data2:nth-child(4)").textContent);
    } else {
        return row.querySelector(".table-data2:nth-child(1)").textContent.trim();
    }
}
           
        });
    </script>
    @endif
@endforeach

</body>
</html>
