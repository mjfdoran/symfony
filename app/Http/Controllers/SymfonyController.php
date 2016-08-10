<?php

namespace App\Http\Controllers;

use ExceptionHandler;
use GitHubApi;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7;
use Illuminate\Routing\Controller as BaseController;

class SymfonyController extends BaseController
{
    private $exceptionHandler;
    private $api;
    private $request;

    function __construct(Request $request)
    {
        $this->request = $request;
        $this->exceptionHandler = ExceptionHandler::getInstance();
        $this->api = new GitHubApi();
    }


    public function index()
    {
        return view('home');
    }


    public function pullRequests()
    {
        $results = $this->api->getPullRequests($this->request->input('page'));
        if ($results == false) {
            return view('pull-requests', ['error' => $this->exceptionHandler->getClientMessage()]);
        }

        return view('pull-requests', ['results' => $results, 'next' => $this->api->next, 'previous' => $this->api->previous, 'routeName' => 'pull-requests']);
    }


    public function createdIssues()
    {
        $results = $this->api->getCreatedIssues($this->request->input('page'));
        if ($results == false) {
            return view('created-issues', ['error' => $this->exceptionHandler->getClientMessage()]);
        }

        return view('created-issues', ['results' => $results, 'next' => $this->api->next, 'previous' => $this->api->previous, 'routeName' => 'created-issues']);
    }


    public function pastReleases()
    {
        $results = $this->api->getPastReleases($this->request->input('page'));
        if ($results == false) {
            return view('created-issues', ['error' => $this->exceptionHandler->getClientMessage()]);
        }

        return view('past-releases', ['results' => $results, 'next' => $this->api->next, 'previous' => $this->api->previous, 'routeName' => 'past-releases']);
    }


    public function commitStatistics()
    {
        $results = $this->api->getCommitStats();
        if ($results == false) {
            return view('commit-statistics', ['error' => $this->exceptionHandler->getClientMessage()]);
        }

        return view('commit-statistics', ['results' => $results]);
    }
}
