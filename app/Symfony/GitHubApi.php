<?php
/**
 * Created by PhpStorm.
 * User: matthewdoran
 * Date: 04/06/16
 * Time: 12:29
 */


use GuzzleHttp\Psr7;

class GitHubApi implements ApiInterface
{
    private $restClient;
    private $baseUrl = 'https://api.github.com/';
    private $owner = 'symfony';
    private $repo = 'symfony';
    public $next = false;
    public $previous = false;

    function __construct()
    {
        $this->restClient = new Guzzle();
    }


    /**
     * Get the open pull requests
     * @param bool $page
     * @param string $state
     * @return bool|mixed
     */
    public function getPullRequests($page = false, $state = 'open')
    {
        $getParameters = $this->populateGets(['state' => $state, 'page' => $page]);
        $url = $this->baseUrl . 'repos/' . $this->owner . '/' . $this->repo . '/pulls' . $getParameters;
        $results = $this->restClient->makeRequest('GET', $url, true);
        $this->paginate($this->restClient->headerLink, $page);

        return $results;
    }


    /**
     * Get created issues
     * @param bool $page
     * @return bool|mixed
     */
    public function getCreatedIssues($page = false)
    {
        $getParameters = $this->populateGets(['page' => $page]);
        $url = $this->baseUrl . 'repos/' . $this->owner . '/' . $this->repo . '/issues' . $getParameters;
        $results = $this->restClient->makeRequest('GET', $url, true);
        $this->paginate($this->restClient->headerLink, $page);

        return $results;
    }


    /**
     * Get past releases of the repo
     * @param bool $page
     * @return bool|mixed
     */
    public function getPastReleases($page = false)
    {
        $getParameters = $this->populateGets(['page' => $page]);
        $url = $this->baseUrl . 'repos/' . $this->owner . '/' . $this->repo . '/tags' . $getParameters;
        $results = $this->restClient->makeRequest('GET', $url, true);
        $this->paginate($this->restClient->headerLink, $page);

        return $results;
    }


    /**
     * Get the total of this weeks commits, this years commits and the average weekly commits
     * @return bool|mixed
     */
    public function getCommitStats()
    {
        $url = $this->baseUrl . 'repos/' . $this->owner . '/' . $this->repo . '/stats/commit_activity';
        $results = $this->restClient->makeRequest('GET', $url);
        if ($results == false) {
            return $results;
        }

        $grandTotal = 0;
        foreach($results as $result) {
            $grandTotal = $grandTotal + $result->total;
        }
        $customResults['thisWeeksCommits'] = $result->total;
        $customResults['thisYearsCommits'] = $grandTotal;
        $customResults['averageWeeklyCommits'] = round($grandTotal / 52);

        return $customResults;
    }


    /**
     * Generate all the get parameters to add to the url
     * @param $getValues
     * @return string
     */
    private function populateGets($getValues)
    {
        $getUrl = '';
        $i = 0;
        foreach ($getValues as $key => $value) {
            if ($i == 0) {
                $getUrl .= '?';
            } else {
                $getUrl .= '&';
            }
            $getUrl .= "$key=$value";
            $i++;
        }

        return $getUrl;
    }


    /**
     * Get the next and previous pages to pass into the link urls
     * @param $links
     * @param $page
     */
    private function paginate($links, $page)
    {
        if ($page == null) {
            $page = 1;
        }
        $page = (int)$page;

        if (strpos($links, 'rel="next"') !== false){

            $this->next = $page + 1;
        }
        if (strpos($links, 'rel="prev"') !== false){

            $this->previous = $page - 1;
        }
    }
}