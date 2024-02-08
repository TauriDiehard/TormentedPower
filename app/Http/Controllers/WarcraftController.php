<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Logs;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use PhpParser\Node\Stmt\TryCatch;

class WarcraftController extends Controller
{
    function getAccessToken()
    {
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
    public function index()
    {   
        
        $logocskak = Logs::latest()->paginate(7); // Fetch all Logs objects
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
    
        // Define an array of fight IDs
        $fightIDs =[1,2,3,4,5,6,7]; // Add more IDs if needed
    
        $queries = [];

        foreach ($fightIDs as $fightID) {
            $query = $this->generateQuery($kodocska, $fightID, $accessToken);
            if(empty($query))
            {
                break;
            }
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
    if ($fightResponse['data']['reportData']['report']['fights'] === []) {
        // Handle GraphQL errors
        return null;
    } 
    // Check if the 'fights' array is not empty
 
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