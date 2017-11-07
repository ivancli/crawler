<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 11/03/2017
 * Time: 3:23 PM
 */

namespace IvanCLI\Crawler\Contracts;


interface CrawlerInterface
{
    /**
     * Get loaded content
     * @return mixed
     */
    public function getContent();

    /**
     * Get request status code
     * @return mixed
     */
    public function getStatus();

    /**
     * Set request type
     * @param $type
     * @return void
     */
    public function setRequestType($type);

    /**
     * Push header
     * @param $headers
     * @return void
     */
    public function setHeaders($headers);

    /**
     * set target URL
     * @param $url
     * @return void
     */
    public function setURL($url);

    /**
     * Set proxy IP address
     * @param $ip
     * @param int $port
     * @return void
     */
    public function setProxy($ip, $port = 80);

    /**
     * Update content property
     * @param $content
     * @return void
     */
    public function setContent($content);

    /**
     * Update status property
     * @param $status
     * @return void
     */
    public function setStatus($status);

    /**
     * Set path to store cookies
     * @param $path
     * @return void
     */
    public function setCookiesPath($path);

    /**
     * Set request data
     * @param array $data
     * @return void
     */
    public function setRequestData(array $data);

    /**
     * Unset header array per given indexes
     * @param $indexes
     * @return void
     */
    public function unsetHeaders($indexes);

    /**
     * Load content
     * @return void
     */
    public function fetch();

}