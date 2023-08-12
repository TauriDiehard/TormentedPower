<!DOCTYPE html>
<html>
<head>
    <title>Report Info</title>
    <style>
        body {
            font-family: Roboto, Open-Sans, "Helvetica Neue", Arial, sans-serif !important;
            margin: 20px;
            font-weight: 400;
            font-size: 0.875rem;
            line-height: 1.5;
            background-color: rgb(33, 33, 33);
            color:white;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        thead th {
            background-color: #121212;
            text-align: left;
        }

        tbody td {
            text-align: center;
        }
    </style>
</head>
<body>
<button onclick="window.location.href='/'" class="btn btn-primary">Go back to Main Page</button>
<!--Első Első Első Első Első Első Első Első Első Első Első-->
    @php
    $damageDoneSeries = $out['data']['reportData']['report']['damageDoneGraph']['data']['series'];
    $damageTakenSeries = $out['data']['reportData']['report']['damageTakenGraph']['data']['series'];
    $healingDoneSeries = $out['data']['reportData']['report']['healingDoneGraph']['data']['series'];
    $dispellSeries = $out['data']['reportData']['report']['dispellgDoneGraph']['data']['series'];
    $deathSeries = $out['data']['reportData']['report']['DeathGraph']['data']['series'];
    
    $groupedData = [];
    @endphp
    <h1>Boss Report</h1>
    <table>
        <thead>
            <tr>
                <th>Boss Name</th>
                <th>Difficulty</th>
                <th>Key</th>
                <th>Deaths</th>
            </tr>
        </thead>
        <tbody>
    @php
        $totalDeaths = count($deathSeries);
       
    
    @endphp
            @foreach ($out['data']['reportData']['report']['fights'] as $fight)
            <tr>
                <td>{{ $fight['name'] }}</td>
                <td>
                @if ($fight['difficulty'] == 4)
                Heroic
                @endif
                @if ($fight['difficulty'] == 5)
                Mythic
                @endif
                @if ($fight['difficulty'] == 3)
                Normal
                @endif

                </td>
                <td>{{ $fight['keystoneLevel'] }}</td>
                <td>{{ $totalDeaths }}</td>
                
            </tr>
            @endforeach

        </tbody>
    </table>

    <h2>Graph Data</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Damage Done</th>
                <th>Damage Taken</th>
                <th>Healing Done</th>
                
            </tr>
        </thead>
        <tbody>
        @php
    foreach ($damageDoneSeries as $key => $series) {
        $name = $series['name'];

        if (!isset($groupedData[$name])) {
            $groupedData[$name] = [
                'damageDone' => $series['total'] ?? '',
                'type' => $series['type'] ?? '0',
                'damageTaken' => $series['damageTaken'] ?? '0',
                'healingDone' => '0',
                'dispell' => '0',
            ];
        }   
    }
    foreach ($damageTakenSeries as $key => $series) {
        $name = $series['name'];

        if (isset($groupedData[$name])) {
            $groupedData[$name]['damageTaken'] = $series['total'] ?? '';
        }
    }
        
    foreach ($healingDoneSeries as $key => $series) {
        $name = $series['name'];

        if (isset($groupedData[$name])) {
            $groupedData[$name]['healingDone'] = $series['total'] ?? '';
        
    }

    foreach ($dispellSeries as $key => $series) {
        $name = $series['name'];

        if (isset($groupedData[$name])) {
            $groupedData[$name]['dispell'] = $series['total'] ?? '';
        }
    }

    }

    

    
@endphp
@php
    $sortedData = $groupedData;
    array_multisort(array_column($sortedData, 'damageDone'), SORT_DESC, $sortedData);
@endphp

@foreach ($sortedData as $name => $data)
    <tr>
<td>
@if ($data['type'] == 'Warrior')<span style="color: rgb(161, 136, 127);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Warrior-class-icon.png"</span>@endif
    @if ($data['type'] == 'Warlock')<span style="color: rgb(179, 157, 219);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Warlock-class-icon.png"</span>@endif
    @if ($data['type'] == 'Rogue')<span style="color: rgb(255, 238, 88);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Rogue-class-icon.png"</span>@endif
    @if ($data['type'] == 'Hunter')<span style="color: rgb(102, 187, 106);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Hunter-class-icon.png"</span>@endif
    @if ($data['type'] == 'Shaman')<span style="color: rgb(159, 168, 218);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Shaman-class-icon.png"</span>@endif
    @if ($data['type'] == 'Paladin')<span style="color: rgb(240, 98, 146);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Paladin-class-icon.png"</span>@endif
    @if ($data['type'] == 'Monk')<span style="color: rgb(102, 187, 106);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/monk-class-icon.png"</span>@endif
    @if ($data['type'] == 'Mage')<span style="color: rgb(41, 182, 246);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Mage-class-icon.png"</span>@endif
    @if ($data['type'] == 'DeathKnight')<span style="color: rgb(229, 115, 115);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Death-Knight-class-icon.png"</span>@endif
    @if ($data['type'] == 'Druid')<span style="color: rgb(239, 108, 0);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Druid-class-icon.png"</span>@endif
    @if ($data['type'] == 'Priest')<span style="color: rgb(224, 224, 224);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Priest-class-icon.png"</span>@endif
    @if ($data['type'] == 'DemonHunter')<span style="color: #a330c9 !important;vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Demon-Hunter-class-icon.png"</span>@endif
    @if ($data['type'] == 'Pet')<span style="color: white !important;vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Pet-Icon.png"</span>@endif

    {{ $name }}</td>

        @php    
        $damagedone = 0;
        if (is_numeric($data['damageDone']) && $data['damageDone'] >= 1000000) {
            $damagedone = round($data['damageDone'] / 1000000, 1) . " M";
        } 
        elseif (is_numeric($data['damageDone']) && $data['damageDone'] >= 999)
        {
            $damagedone = round($data['damageDone'] / 1000, 1) . " K";
            
        }else
        {
        $damagedone = $data['damageDone'];
        }

        $healingdone = 0;
        if (is_numeric($data['healingDone']) && $data['healingDone'] >= 1000000) {
            $healingdone = round($data['healingDone'] / 1000000, 1) . " M";
        } elseif (is_numeric($data['healingDone']) && $data['healingDone'] >= 999)
        {
            $healingdone = round($data['healingDone'] / 1000, 1) . " K";
            
        }else
        {
        $healingdone = $data['healingDone'];
        }

        $damagetaken = 0;
        if (is_numeric($data['damageTaken']) && $data['damageTaken'] >= 1000000) {
            $damagetaken = round($data['damageTaken'] / 1000000, 1) . " M";
        } elseif (is_numeric($data['damageTaken']) && $data['healingDone'] >= 999 )
         {
            $damagetaken = round($data['damageTaken'] / 1000, 1) . " K";
            
        }else
        {
        $damagetaken = $data['damageTaken'];
        }
        @endphp


        <td>{{$damagedone}}</td>
        <td>{{  $damagetaken}}</td>
        <td>{{  $healingdone}}</td>
        

    </tr>
@endforeach


        </tbody>
    </table>

    <hr>
    <br>
    <!--Masodik Masodik Masodik Masodik Masodik Masodik Masodik Masodik-->
  @php
    $damageDoneSeries = $outmasodik['data']['reportData']['report']['damageDoneGraph']['data']['series'];
    $damageTakenSeries = $outmasodik['data']['reportData']['report']['damageTakenGraph']['data']['series'];
    $healingDoneSeries = $outmasodik['data']['reportData']['report']['healingDoneGraph']['data']['series'];
    $dispellSeries = $outmasodik['data']['reportData']['report']['dispellgDoneGraph']['data']['series'];
    $deathSeries = $outmasodik['data']['reportData']['report']['DeathGraph']['data']['series'];
    
    $groupedData = [];
    @endphp
    <h1>Boss Report</h1>
    <table>
        <thead>
            <tr>
                <th>Boss Name</th>
                <th>Difficulty</th>
                <th>Key</th>
                <th>Deaths</th>
            </tr>
        </thead>
        <tbody>
    @php
        $totalDeaths = count($deathSeries);
       
    
    @endphp
            @foreach ($outmasodik['data']['reportData']['report']['fights'] as $fight)
            <tr>
                <td>{{ $fight['name'] }}</td>
                <td>
                @if ($fight['difficulty'] == 4)
                Heroic
                @endif
                @if ($fight['difficulty'] == 5)
                Mythic
                @endif
                @if ($fight['difficulty'] == 3)
                Normal
                @endif

                </td>
                <td>{{ $fight['keystoneLevel'] }}</td>
                <td>{{ $totalDeaths }}</td>
                
            </tr>
            @endforeach

        </tbody>
    </table>

    <h2>Graph Data</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Damage Done</th>
                <th>Damage Taken</th>
                <th>Healing Done</th>
                
            </tr>
        </thead>
        <tbody>
        @php
    foreach ($damageDoneSeries as $key => $series) {
        $name = $series['name'];

        if (!isset($groupedData[$name])) {
            $groupedData[$name] = [
                'damageDone' => $series['total'] ?? '',
                'type' => $series['type'] ?? '0',
                'damageTaken' => $series['damageTaken'] ?? '0',
                'healingDone' => '0',
                'dispell' => '0',
            ];
        }   
    }
    foreach ($damageTakenSeries as $key => $series) {
        $name = $series['name'];

        if (isset($groupedData[$name])) {
            $groupedData[$name]['damageTaken'] = $series['total'] ?? '';
        }
    }
        
    foreach ($healingDoneSeries as $key => $series) {
        $name = $series['name'];

        if (isset($groupedData[$name])) {
            $groupedData[$name]['healingDone'] = $series['total'] ?? '';
        
    }

    foreach ($dispellSeries as $key => $series) {
        $name = $series['name'];

        if (isset($groupedData[$name])) {
            $groupedData[$name]['dispell'] = $series['total'] ?? '';
        }
    }

    }

    

    
@endphp
@php
    $sortedData = $groupedData;
    array_multisort(array_column($sortedData, 'damageDone'), SORT_DESC, $sortedData);
@endphp

@foreach ($sortedData as $name => $data)
    <tr>
<td>
@if ($data['type'] == 'Warrior')<span style="color: rgb(161, 136, 127);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Warrior-class-icon.png"</span>@endif
    @if ($data['type'] == 'Warlock')<span style="color: rgb(179, 157, 219);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Warlock-class-icon.png"</span>@endif
    @if ($data['type'] == 'Rogue')<span style="color: rgb(255, 238, 88);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Rogue-class-icon.png"</span>@endif
    @if ($data['type'] == 'Hunter')<span style="color: rgb(102, 187, 106);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Hunter-class-icon.png"</span>@endif
    @if ($data['type'] == 'Shaman')<span style="color: rgb(159, 168, 218);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Shaman-class-icon.png"</span>@endif
    @if ($data['type'] == 'Paladin')<span style="color: rgb(240, 98, 146);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Paladin-class-icon.png"</span>@endif
    @if ($data['type'] == 'Monk')<span style="color: rgb(102, 187, 106);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/monk-class-icon.png"</span>@endif
    @if ($data['type'] == 'Mage')<span style="color: rgb(41, 182, 246);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Mage-class-icon.png"</span>@endif
    @if ($data['type'] == 'DeathKnight')<span style="color: rgb(229, 115, 115);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Death-Knight-class-icon.png"</span>@endif
    @if ($data['type'] == 'Druid')<span style="color: rgb(239, 108, 0);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Druid-class-icon.png"</span>@endif
    @if ($data['type'] == 'Priest')<span style="color: rgb(224, 224, 224);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Priest-class-icon.png"</span>@endif
    @if ($data['type'] == 'DemonHunter')<span style="color: #a330c9 !important;vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Demon-Hunter-class-icon.png"</span>@endif
    @if ($data['type'] == 'Pet')<span style="color: white !important;vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Pet-Icon.png"</span>@endif

    {{ $name }}</td>

        @php    
        $damagedone = 0;
        if (is_numeric($data['damageDone']) && $data['damageDone'] >= 1000000) {
            $damagedone = round($data['damageDone'] / 1000000, 1) . " M";
        } 
        elseif (is_numeric($data['damageDone']) && $data['damageDone'] >= 999)
        {
            $damagedone = round($data['damageDone'] / 1000, 1) . " K";
            
        }else
        {
        $damagedone = $data['damageDone'];
        }

        $healingdone = 0;
        if (is_numeric($data['healingDone']) && $data['healingDone'] >= 1000000) {
            $healingdone = round($data['healingDone'] / 1000000, 1) . " M";
        } elseif (is_numeric($data['healingDone']) && $data['healingDone'] >= 999)
        {
            $healingdone = round($data['healingDone'] / 1000, 1) . " K";
            
        }else
        {
        $healingdone = $data['healingDone'];
        }

        $damagetaken = 0;
        if (is_numeric($data['damageTaken']) && $data['damageTaken'] >= 1000000) {
            $damagetaken = round($data['damageTaken'] / 1000000, 1) . " M";
        } elseif (is_numeric($data['damageTaken']) && $data['healingDone'] >= 999 )
         {
            $damagetaken = round($data['damageTaken'] / 1000, 1) . " K";
            
        }else
        {
        $damagetaken = $data['damageTaken'];
        }
        @endphp


        <td>{{$damagedone}}</td>
        <td>{{  $damagetaken}}</td>
        <td>{{  $healingdone}}</td>
        

    </tr>
@endforeach


        </tbody>
    </table>
    <hr>
    <br>
<!--Harmadik Harmadik Harmadik Harmadik Harmadik Harmadik Harmadik -->
    @php
    $damageDoneSeries = $outharmadik['data']['reportData']['report']['damageDoneGraph']['data']['series'];
$damageTakenSeries = $outharmadik['data']['reportData']['report']['damageTakenGraph']['data']['series'];
$healingDoneSeries = $outharmadik['data']['reportData']['report']['healingDoneGraph']['data']['series'];
$dispellSeries = $outharmadik['data']['reportData']['report']['dispellgDoneGraph']['data']['series'];
$deathSeries = $outharmadik['data']['reportData']['report']['DeathGraph']['data']['series'];
    
    $groupedData = [];
    @endphp
    <h1>Boss Report</h1>
    <table>
        <thead>
            <tr>
                <th>Boss Name</th>
                <th>Difficulty</th>
                <th>Key</th>
                <th>Deaths</th>
            </tr>
        </thead>
        <tbody>
    @php
        $totalDeaths = count($deathSeries);
       
    
    @endphp
            @foreach ($outharmadik['data']['reportData']['report']['fights'] as $fight)
            <tr>
                <td>{{ $fight['name'] }}</td>
                <td>
                @if ($fight['difficulty'] == 4)
                Heroic
                @endif
                @if ($fight['difficulty'] == 5)
                Mythic
                @endif
                @if ($fight['difficulty'] == 3)
                Normal
                @endif

                </td>
                <td>{{ $fight['keystoneLevel'] }}</td>
                <td>{{ $totalDeaths }}</td>
                
            </tr>
            @endforeach

        </tbody>
    </table>

    <h2>Graph Data</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Damage Done</th>
                <th>Damage Taken</th>
                <th>Healing Done</th>
                
            </tr>
        </thead>
        <tbody>
        @php
    foreach ($damageDoneSeries as $key => $series) {
        $name = $series['name'];

        if (!isset($groupedData[$name])) {
            $groupedData[$name] = [
                'damageDone' => $series['total'] ?? '',
                'type' => $series['type'] ?? '0',
                'damageTaken' => $series['damageTaken'] ?? '0',
                'healingDone' => '0',
                'dispell' => '0',
            ];
        }   
    }
    foreach ($damageTakenSeries as $key => $series) {
        $name = $series['name'];

        if (isset($groupedData[$name])) {
            $groupedData[$name]['damageTaken'] = $series['total'] ?? '';
        }
    }
        
    foreach ($healingDoneSeries as $key => $series) {
        $name = $series['name'];

        if (isset($groupedData[$name])) {
            $groupedData[$name]['healingDone'] = $series['total'] ?? '';
        
    }

    foreach ($dispellSeries as $key => $series) {
        $name = $series['name'];

        if (isset($groupedData[$name])) {
            $groupedData[$name]['dispell'] = $series['total'] ?? '';
        }
    }

    }

    

    
@endphp
@php
    $sortedData = $groupedData;
    array_multisort(array_column($sortedData, 'damageDone'), SORT_DESC, $sortedData);
@endphp

@foreach ($sortedData as $name => $data)
    <tr>
<td>
@if ($data['type'] == 'Warrior')<span style="color: rgb(161, 136, 127);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Warrior-class-icon.png"</span>@endif
    @if ($data['type'] == 'Warlock')<span style="color: rgb(179, 157, 219);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Warlock-class-icon.png"</span>@endif
    @if ($data['type'] == 'Rogue')<span style="color: rgb(255, 238, 88);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Rogue-class-icon.png"</span>@endif
    @if ($data['type'] == 'Hunter')<span style="color: rgb(102, 187, 106);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Hunter-class-icon.png"</span>@endif
    @if ($data['type'] == 'Shaman')<span style="color: rgb(159, 168, 218);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Shaman-class-icon.png"</span>@endif
    @if ($data['type'] == 'Paladin')<span style="color: rgb(240, 98, 146);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Paladin-class-icon.png"</span>@endif
    @if ($data['type'] == 'Monk')<span style="color: rgb(102, 187, 106);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/monk-class-icon.png"</span>@endif
    @if ($data['type'] == 'Mage')<span style="color: rgb(41, 182, 246);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Mage-class-icon.png"</span>@endif
    @if ($data['type'] == 'DeathKnight')<span style="color: rgb(229, 115, 115);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Death-Knight-class-icon.png"</span>@endif
    @if ($data['type'] == 'Druid')<span style="color: rgb(239, 108, 0);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Druid-class-icon.png"</span>@endif
    @if ($data['type'] == 'Priest')<span style="color: rgb(224, 224, 224);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Priest-class-icon.png"</span>@endif
    @if ($data['type'] == 'DemonHunter')<span style="color: #a330c9 !important;vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Demon-Hunter-class-icon.png"</span>@endif
    @if ($data['type'] == 'Pet')<span style="color: white !important;vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Pet-Icon.png"</span>@endif

    {{ $name }}</td>

        @php    
        $damagedone = 0;
        if (is_numeric($data['damageDone']) && $data['damageDone'] >= 1000000) {
            $damagedone = round($data['damageDone'] / 1000000, 1) . " M";
        } 
        elseif (is_numeric($data['damageDone']) && $data['damageDone'] >= 999)
        {
            $damagedone = round($data['damageDone'] / 1000, 1) . " K";
            
        }else
        {
        $damagedone = $data['damageDone'];
        }

        $healingdone = 0;
        if (is_numeric($data['healingDone']) && $data['healingDone'] >= 1000000) {
            $healingdone = round($data['healingDone'] / 1000000, 1) . " M";
        } elseif (is_numeric($data['healingDone']) && $data['healingDone'] >= 999)
        {
            $healingdone = round($data['healingDone'] / 1000, 1) . " K";
            
        }else
        {
        $healingdone = $data['healingDone'];
        }

        $damagetaken = 0;
        if (is_numeric($data['damageTaken']) && $data['damageTaken'] >= 1000000) {
            $damagetaken = round($data['damageTaken'] / 1000000, 1) . " M";
        } elseif (is_numeric($data['damageTaken']) && $data['healingDone'] >= 999 )
         {
            $damagetaken = round($data['damageTaken'] / 1000, 1) . " K";
            
        }else
        {
        $damagetaken = $data['damageTaken'];
        }
        @endphp


        <td>{{$damagedone}}</td>
        <td>{{  $damagetaken}}</td>
        <td>{{  $healingdone}}</td>
        

    </tr>
@endforeach


        </tbody>
    </table>
    <hr>
    <br>
<!--Negyedik Negyedik Negyedik Negyedik Negyedik Negyedik Negyedik Negyedik -->

    @php
    $damageDoneSeries = $outnegyedik['data']['reportData']['report']['damageDoneGraph']['data']['series'];
    $damageTakenSeries = $outnegyedik['data']['reportData']['report']['damageTakenGraph']['data']['series'];
    $healingDoneSeries = $outnegyedik['data']['reportData']['report']['healingDoneGraph']['data']['series'];
    $dispellSeries = $outnegyedik['data']['reportData']['report']['dispellgDoneGraph']['data']['series'];
    $deathSeries = $outnegyedik['data']['reportData']['report']['DeathGraph']['data']['series'];
    
    $groupedData = [];
    @endphp
    <h1>Boss Report</h1>
    <table>
        <thead>
            <tr>
                <th>Boss Name</th>
                <th>Difficulty</th>
                <th>Key</th>
                <th>Deaths</th>
            </tr>
        </thead>
        <tbody>
    @php
        $totalDeaths = count($deathSeries);
       
    
    @endphp
            @foreach ($outnegyedik['data']['reportData']['report']['fights'] as $fight)
            <tr>
                <td>{{ $fight['name'] }}</td>
                <td>
                @if ($fight['difficulty'] == 4)
                Heroic
                @endif
                @if ($fight['difficulty'] == 5)
                Mythic
                @endif
                @if ($fight['difficulty'] == 3)
                Normal
                @endif

                </td>
                <td>{{ $fight['keystoneLevel'] }}</td>
                <td>{{ $totalDeaths }}</td>
                
            </tr>
            @endforeach

        </tbody>
    </table>

    <h2>Graph Data</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Damage Done</th>
                <th>Damage Taken</th>
                <th>Healing Done</th>
                
            </tr>
        </thead>
        <tbody>
        @php
    foreach ($damageDoneSeries as $key => $series) {
        $name = $series['name'];

        if (!isset($groupedData[$name])) {
            $groupedData[$name] = [
                'damageDone' => $series['total'] ?? '',
                'type' => $series['type'] ?? '0',
                'damageTaken' => $series['damageTaken'] ?? '0',
                'healingDone' => '0',
                'dispell' => '0',
            ];
        }   
    }
    foreach ($damageTakenSeries as $key => $series) {
        $name = $series['name'];

        if (isset($groupedData[$name])) {
            $groupedData[$name]['damageTaken'] = $series['total'] ?? '';
        }
    }
        
    foreach ($healingDoneSeries as $key => $series) {
        $name = $series['name'];

        if (isset($groupedData[$name])) {
            $groupedData[$name]['healingDone'] = $series['total'] ?? '';
        
    }

    foreach ($dispellSeries as $key => $series) {
        $name = $series['name'];

        if (isset($groupedData[$name])) {
            $groupedData[$name]['dispell'] = $series['total'] ?? '';
        }
    }

    }

    

    
@endphp
@php
    $sortedData = $groupedData;
    array_multisort(array_column($sortedData, 'damageDone'), SORT_DESC, $sortedData);
@endphp

@foreach ($sortedData as $name => $data)
    <tr>
<td>
@if ($data['type'] == 'Warrior')<span style="color: rgb(161, 136, 127);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Warrior-class-icon.png"</span>@endif
    @if ($data['type'] == 'Warlock')<span style="color: rgb(179, 157, 219);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Warlock-class-icon.png"</span>@endif
    @if ($data['type'] == 'Rogue')<span style="color: rgb(255, 238, 88);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Rogue-class-icon.png"</span>@endif
    @if ($data['type'] == 'Hunter')<span style="color: rgb(102, 187, 106);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Hunter-class-icon.png"</span>@endif
    @if ($data['type'] == 'Shaman')<span style="color: rgb(159, 168, 218);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Shaman-class-icon.png"</span>@endif
    @if ($data['type'] == 'Paladin')<span style="color: rgb(240, 98, 146);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Paladin-class-icon.png"</span>@endif
    @if ($data['type'] == 'Monk')<span style="color: rgb(102, 187, 106);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/monk-class-icon.png"</span>@endif
    @if ($data['type'] == 'Mage')<span style="color: rgb(41, 182, 246);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Mage-class-icon.png"</span>@endif
    @if ($data['type'] == 'DeathKnight')<span style="color: rgb(229, 115, 115);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Death-Knight-class-icon.png"</span>@endif
    @if ($data['type'] == 'Druid')<span style="color: rgb(239, 108, 0);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Druid-class-icon.png"</span>@endif
    @if ($data['type'] == 'Priest')<span style="color: rgb(224, 224, 224);vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Priest-class-icon.png"</span>@endif
    @if ($data['type'] == 'DemonHunter')<span style="color: #a330c9 !important;vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Demon-Hunter-class-icon.png"</span>@endif
    @if ($data['type'] == 'Pet')<span style="color: white !important;vertical-align: middle;"><img style="height:25px; vertical-align: middle;"src="https://tormented.rf.gd/Tormented/public/Logs/Pet-Icon.png"</span>@endif

    {{ $name }}</td>

        @php    
        $damagedone = 0;
        if (is_numeric($data['damageDone']) && $data['damageDone'] >= 1000000) {
            $damagedone = round($data['damageDone'] / 1000000, 1) . " M";
        } 
        elseif (is_numeric($data['damageDone']) && $data['damageDone'] >= 999)
        {
            $damagedone = round($data['damageDone'] / 1000, 1) . " K";
            
        }else
        {
        $damagedone = $data['damageDone'];
        }

        $healingdone = 0;
        if (is_numeric($data['healingDone']) && $data['healingDone'] >= 1000000) {
            $healingdone = round($data['healingDone'] / 1000000, 1) . " M";
        } elseif (is_numeric($data['healingDone']) && $data['healingDone'] >= 999)
        {
            $healingdone = round($data['healingDone'] / 1000, 1) . " K";
            
        }else
        {
        $healingdone = $data['healingDone'];
        }

        $damagetaken = 0;
        if (is_numeric($data['damageTaken']) && $data['damageTaken'] >= 1000000) {
            $damagetaken = round($data['damageTaken'] / 1000000, 1) . " M";
        } elseif (is_numeric($data['damageTaken']) && $data['healingDone'] >= 999 )
         {
            $damagetaken = round($data['damageTaken'] / 1000, 1) . " K";
            
        }else
        {
        $damagetaken = $data['damageTaken'];
        }
        @endphp


        <td>{{$damagedone}}</td>
        <td>{{  $damagetaken}}</td>
        <td>{{  $healingdone}}</td>
        

    </tr>
@endforeach


        </tbody>
    </table>
    <hr>
    <br>
</body>
</html>