<?php
/**
 * Created by PhpStorm.
 * User: matthewdoran
 * Date: 04/06/16
 * Time: 12:27
 */

interface ApiInterface {

    public function getPullRequests();
    public function getCreatedIssues();
    public function getPastReleases();
    public function getCommitStats();
}