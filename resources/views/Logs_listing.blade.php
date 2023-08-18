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
@dd($queries);
@foreach ($queries as $fightID => $queryData)
    <div class="container">
        <div class="table">
            <div class="table-header">
                <div class="header__item"><a id="name" class="filter__link" href="#">Info</a></div>
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
                    $time = round((($queryData['data']['reportData']['report']['damageDoneGraph']['data']['endTime']) - ($queryData['data']['reportData']['report']['damageDoneGraph']['data']['startTime'])) / (1000 * 60), 2);
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
    $series = $queryData['data']['reportData']['report']['AllDataGraph']['data']['series'];
    
    @endphp
    <div class="container2">
    <div class="table2">
        <div class="table-header2">
            <div class="header__item2"><a id="name" class="filter__link2" href="#">Character</a></div>
            <div class="header__item2"><a id="damage" class="filter__link2" href="#">Damage</a></div>
        </div>
        <div class="table-content" id="tableContent">
            @foreach($series as $data)
                <div class="table-row2">
                    <div class="table-data2"> 
                        @if (isset($data['name']))
                            {{ $data['name'] }}
                        @else
                            N/A
                        @endif
                    </div>
                    <div class="table-data2"> 
                        @if (isset($data['total']))
                            {{ $data['total'] }}
                        @else
                            N/A
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endforeach
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const damageHeader = document.getElementById("damage");
        const nameHeader = document.getElementById("name");
        const tableContent = document.getElementById("tableContent");
        const rows = Array.from(tableContent.getElementsByClassName("table-row2"));

        damageHeader.addEventListener("click", function () {
            sortTable("damage");
        });

        nameHeader.addEventListener("click", function () {
            sortTable("name");
        });

        function sortTable(sortBy) {
            rows.sort(function (a, b) {
                const valueA = getValue(a, sortBy);
                const valueB = getValue(b, sortBy);

                if (sortBy === "damage") {
                    return valueB - valueA;
                } else {
                    return valueA.localeCompare(valueB);
                }
            });

            rows.forEach(function (row) {
                tableContent.appendChild(row);
            });
        }

        function getValue(row, sortBy) {
            if (sortBy === "damage") {
                return parseInt(row.querySelector(".table-data2:nth-child(2)").textContent);
            } else {
                return row.querySelector(".table-data2:nth-child(1)").textContent.trim();
            }
        }
    });
</script>



</body>
</html>