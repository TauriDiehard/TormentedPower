<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Logs;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class WarcraftController extends Controller
{
    private $kod = "";
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
        
        $logocskak = Logs::latest()->get(); // Fetch all Logs objects
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
        
        
        $kodocska = $validatedData['code'];
        $log_code = $validatedData['code'];
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
        
        $pogchamp = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://www.warcraftlogs.com/api/v2/client', [
            'query' =>  $title
        ]);
        
        $sajt = $pogchamp->json();
        $title = $sajt['data']['reportData']['report']['title'];
        
        $logocskak = Logs::create([
            'code' => $kodocska,
            'title' => $title,
        ]);
        
        return redirect()->route('logs.show', ['logocskak' => $logocskak]);
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



    public function show(Request $request, Logs $logocskak)
    {
        $kodocska = $logocskak->code;
        $accessToken = $this->getAccessToken($request);


        $fightIDs = []; // Initialize an empty array
        $maxFightID = 15; // The maximum fight ID you want to include
        $i = 1; // Initialize a counter

        while ($i <= $maxFightID) {
            // Generate the query and execute as before
            $query = $this->generateQuery($kodocska, $i, $accessToken);
            $response = $this->executeGraphQLQuery($query, $accessToken);

            // Check if the response is valid, add to array if yes
            if (isset($response['data']['reportData']['report']['fights'][0])) {
                $fightIDs[] = $i;
            }

            $i++;
        }
        // Define an array of fight IDs
        foreach ($fightIDs as $fightID) {
            $query = $this->generateQuery($kodocska, $fightID, $accessToken);
            $response = $this->executeGraphQLQuery($query, $accessToken);
            $queries[$fightID] = $response;
        }
        return view('Logs_listing', compact('queries'));
    }

private function generateQuery($kodocska, $fightID, $accessToken)
{
    $fightQuery = "
        query {
            reportData {
                report(code:\"$kodocska\") {
                    fights(fightIDs:[$fightID]) {
                        startTime
                        endTime
                        keystoneLevel
                        difficulty
                        averageItemLevel
                        name
                    }
                }
            }
        }
    ";

    // Execute the fight query and get startTime and endTime values
    $fightResponse = $this->executeGraphQLQuery($fightQuery, $accessToken);
    $fight = $fightResponse['data']['reportData']['report']['fights'][0];
    $startTime = floatval($fight['startTime']);
    $endTime = floatval($fight['endTime']);

    $damageQuery = "
        query {
            reportData {
                report(code:\"$kodocska\") {
                    fights(fightIDs:[$fightID]) {
                        keystoneLevel
                        difficulty
                        averageItemLevel
                        name
                    }
                    AllDataGraph: graph(dataType: DamageDone, startTime: $startTime, endTime: $endTime)
                    HealingGraph: graph(dataType: Healing, startTime: $startTime, endTime: $endTime)
                    DamageTakenGraph: graph(dataType: DamageTaken, startTime: $startTime, endTime: $endTime)
                }
            }
        }
    ";

    return $damageQuery;
}

}