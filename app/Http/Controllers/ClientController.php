<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	try {
    		$req = $this->gunzzleHttpRetryOnError('clients', 'GET', true);
    		$clients = json_decode($req->getBody()->getContents(), true);
    		$clients = $clients['result'];
    		return view('client', compact('clients'));
    	} catch (Exception $ex) {
            abort(500);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
        	$data = $request->all();

    		$req = $this->gunzzleHttpRetryOnError('clients', 'POST', true, $data);
    		$clients = json_decode($req->getBody()->getContents(), true);

    		if ($clients['status'] === 'success') {
    			return redirect()->route('clients.index')->with('success', $clients['msg']);
    		} else {
    			return redirect(route('clients.index'))->withErrors($clients['error'])->withInput($data);
    		}
    		
    	} catch (Exception $ex) {
            abort(500);
        }
    }

    private function gunzzleHttpRetryOnError($url, $method = "GET", $retryOnError = true, $data = [])
    {
        try {
            $base = 'http://localhost:8000/';
            $client = new \GuzzleHttp\Client();

            if ($method != "GET") {
            	$request = $client->request($method, $base . $url, [
            		'form_params' => $data
        		]);
            } else {
        		$request = $client->request($method, $base . $url);
            }

            return $request;

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {

            if ($retryOnError && $e->getCode() === 503) {
                return $this->gunzzleHttpRetryOnError($url);
            }
            abort(500);
        }
    }
}
