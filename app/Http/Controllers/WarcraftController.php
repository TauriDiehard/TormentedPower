<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Logs;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class WarcraftController extends Controller
{
    function getAccessToken(Request $request)
    {
        $clientID = $request->input('clientID');
        $clientSecret = $request->input('clientSecret');
        $client = new Client();
        $response = $client->post('https://www.warcraftlogs.com/oauth/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => '994c9b3c-0312-489e-b081-8af7ca861b69',
                'client_secret' => 'MW2DzOMPmMM9cLHKzyV6Vs96qwxaIhdLVkKsLgTc',
            ],
        ]);

        $accessToken = json_decode($response->getBody()->getContents(), true)['access_token'];
        return $accessToken;
    }

    public function Info()
    {
        return view('Info');
    }
    public function index(Request $request)
    {   
        $logocskak = Logs::all(); // Fetch all Logs objects
        return view('Logs', ['logocskak' => $logocskak]);
        
       
    }
    public function Logs_uploader()
    {
        return view('Logs_uploader');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required'
        ]);
        $logocskak = Logs::create($validatedData);
        
        $kodocska = $validatedData['code'];
        $clientID = '994c9b3c-0312-489e-b081-8af7ca861b69';
        $clientSecret = 'MW2DzOMPmMM9cLHKzyV6Vs96qwxaIhdLVkKsLgTc';
        $accessToken = $this->getAccessToken($request);
        $title = '
        query {
            reportData {
                report(code:"' . $kodocska . '") {
                    title
                }
            }
        }
    ';
    
    $responseelso = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $accessToken,
    ])->get('https://www.warcraftlogs.com/api/v2/client', [
        'query' =>  $title
    ]);
    $out = $responseelso->json();
        return redirect("Logs")->with(['logocskak' => $logocskak, 'out' => $out]);
        
    }

    function executeGraphQLQuery($query, $accessToken)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ])->post('https://www.warcraftlogs.com/api/v2/client', [
            'query' => $query,
        ]);

        return $response->json();
    }


    function testFetch(Request $request)
    {
        $kodocska = "X3BMCtAkL6cVfwKd";
        $clientID = '994c9b3c-0312-489e-b081-8af7ca861b69';
        $clientSecret = 'MW2DzOMPmMM9cLHKzyV6Vs96qwxaIhdLVkKsLgTc';
        $accessToken = $this->getAccessToken($request);
        $idoelso = '
            query {
                reportData {
                    report(code:"' . $kodocska . '") {
                        fights(fightIDs:[1]) {
                            startTime
                            endTime
                        }
                    }
                }
            }
                
        ';

        $elso = $this->executeGraphQLQuery($idoelso, $accessToken);

        $startTimeelso = floatval($elso['data']['reportData']['report']['fights'][0]['startTime']);
        $endTimeelso = floatval($elso['data']['reportData']['report']['fights'][0]['endTime']);

        $elsolekeredezes = '
            query {
                reportData {
                    report(code:"' . $kodocska . '") {
                        fights(fightIDs:[1]) {
                            keystoneLevel
                            difficulty
                            averageItemLevel
                            name
                        }
                        damageDoneGraph: graph(dataType: DamageDone, startTime: ' . $startTimeelso . ', endTime: ' . $endTimeelso . ')
                damageTakenGraph: graph(dataType: DamageTaken, startTime: ' . $startTimeelso . ', endTime: ' . $endTimeelso . ')
                healingDoneGraph: graph(dataType: Healing, startTime: ' . $startTimeelso . ', endTime: ' . $endTimeelso . ')
                dispellgDoneGraph: graph(dataType: Dispels, startTime: ' . $startTimeelso . ', endTime: ' . $endTimeelso . ')
                DeathGraph: graph(dataType: Deaths, startTime: ' . $startTimeelso . ', endTime: ' . $endTimeelso . ')
                    }
                }
            }
        ';
        //--------------------------------------------------------------------------------------------------------------------------
        $idomasodik = '
            query {
                reportData {
                    report(code:"' . $kodocska . '") {
                        fights(fightIDs:[2]) {
                            startTime
                            endTime
                        }
                    }
                }
            }
                
        ';

        $masodik = $this->executeGraphQLQuery($idomasodik, $accessToken);

        $startTimemasodik = floatval($masodik['data']['reportData']['report']['fights'][0]['startTime']);
        $endTimemasodik = floatval($masodik['data']['reportData']['report']['fights'][0]['endTime']);

        $masodiklekeredezes = '
            query {
                reportData {
                    report(code: "' . $kodocska . '") {
                        fights(fightIDs:[2]) {
                            keystoneLevel
                            difficulty
                            averageItemLevel
                            name
                        }
                        damageDoneGraph: graph(dataType: DamageDone, startTime: ' . $startTimemasodik . ', endTime: ' . $endTimemasodik . ')
                damageTakenGraph: graph(dataType: DamageTaken, startTime: ' . $startTimemasodik . ', endTime: ' . $endTimemasodik . ')
                healingDoneGraph: graph(dataType: Healing, startTime: ' . $startTimemasodik . ', endTime: ' . $endTimemasodik . ')
                dispellgDoneGraph: graph(dataType: Dispels, startTime: ' . $startTimemasodik . ', endTime: ' . $endTimemasodik . ')
                DeathGraph: graph(dataType: Deaths, startTime: ' . $startTimemasodik . ', endTime: ' . $endTimemasodik . ')
                    }
                }
            }
        ';
    //----------------------------------------------------------------------------------------------------------
        $idoharmadik = '
    query {
        reportData {
            report(code: "' . $kodocska . '") {
                fights(fightIDs:[3]) {
                    startTime
                    endTime
                }
            }
        }
    }    
';

$harmadik = $this->executeGraphQLQuery($idoharmadik, $accessToken);

$starttimeharmadik = floatval($harmadik['data']['reportData']['report']['fights'][0]['startTime']);
$endtimeharmadik = floatval($harmadik['data']['reportData']['report']['fights'][0]['endTime']);

$harmadiklekeredezes = '
    query {
        reportData {
            report(code: "' . $kodocska . '") {
                fights(fightIDs:[3]) {
                    keystoneLevel
                    difficulty
                    averageItemLevel
                    name
                }
                damageDoneGraph: graph(dataType: DamageDone, startTime: ' . $starttimeharmadik . ', endTime: ' . $endtimeharmadik . ')
                damageTakenGraph: graph(dataType: DamageTaken, startTime: ' . $starttimeharmadik . ', endTime: ' . $endtimeharmadik . ')
                healingDoneGraph: graph(dataType: Healing, startTime: ' . $starttimeharmadik . ', endTime: ' . $endtimeharmadik . ')
                dispellgDoneGraph: graph(dataType: Dispels, startTime: ' . $starttimeharmadik . ', endTime: ' . $endtimeharmadik . ')
                DeathGraph: graph(dataType: Deaths, startTime: ' . $starttimeharmadik . ', endTime: ' . $endtimeharmadik . ')
            }
        }
    }
';

//----------------------------------------------------------------------------------------------------------
$idonegyedik = '
    query {
        reportData {
            report(code: "' . $kodocska . '") {
                fights(fightIDs:[4]) {
                    startTime
                    endTime
                }
            }
        }
    }    
';

$egyedik = $this->executeGraphQLQuery($idonegyedik, $accessToken);

$starttimeegyedik = floatval($egyedik['data']['reportData']['report']['fights'][0]['startTime']);
$endtimeegyedik = floatval($egyedik['data']['reportData']['report']['fights'][0]['endTime']);

$egyediklekeredezes = '
    query {
        reportData {
            report(code: "' . $kodocska . '") {
                fights(fightIDs:[4]) {
                    keystoneLevel
                    difficulty
                    averageItemLevel
                    name
                }
                damageDoneGraph: graph(dataType: DamageDone, startTime: ' . $starttimeegyedik . ', endTime: ' . $endtimeegyedik . ')
                damageTakenGraph: graph(dataType: DamageTaken, startTime: ' . $starttimeegyedik . ', endTime: ' . $endtimeegyedik . ')
                healingDoneGraph: graph(dataType: Healing, startTime: ' . $starttimeegyedik . ', endTime: ' . $endtimeegyedik . ')
                dispellgDoneGraph: graph(dataType: Dispels, startTime: ' . $starttimeegyedik . ', endTime: ' . $endtimeegyedik . ')
                DeathGraph: graph(dataType: Deaths, startTime: ' . $starttimeegyedik . ', endTime: ' . $endtimeegyedik . ')
            }
        }
    }
';
//----------------------------------------------------------------------------------------------------------
        

        $responseelso = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://www.warcraftlogs.com/api/v2/client', [
            'query' =>  $elsolekeredezes
        ]);

        $responsemasodik = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://www.warcraftlogs.com/api/v2/client', [
            'query' =>  $masodiklekeredezes
        ]);

        $responseharmadik = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://www.warcraftlogs.com/api/v2/client', [
            'query' =>  $harmadiklekeredezes
        ]);

        $responsenegyedik = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://www.warcraftlogs.com/api/v2/client', [
            'query' =>  $egyediklekeredezes
        ]);

        $out = $responseelso->json();
        $outmasodik = $responsemasodik->json();
        $outharmadik = $responseharmadik->json();
        $outnegyedik = $responsenegyedik->json();


        
        //dd($outharmadik);
        return view('Info', compact('out', 'outmasodik', 'outharmadik', 'outnegyedik'));
    }


}