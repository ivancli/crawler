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
     * @return self
     */
    public function setRequestType($type);

    /**
     * Push header
     * @param $headers
     * @return self
     */
    public function setHeaders($headers);

    /**
     * set target URL
     * @param $url
     * @return self
     */
    public function setURL($url);

    /**
     * Set proxy IP address
     * @param $ip
     * @param int $port
     * @return self
     */
    public function setProxy($ip, $port = 80);

    /**
     * Update content property
     * @param $content
     * @return self
     */
    public function setContent($content);

    /**
     * Update status property
     * @param $status
     * @return self
     */
    public function setStatus($status);

    /**
     * Set path to store cookies
     * @param $path
     * @return self
     */
    public function setCookiesPath($path);

    /**
     * Set request data
     * @param array $data
     * @return self
     */
    public function setRequestData(array $data);

    /**
     * Set request data to be encoded as JSON
     * @return self
     */
    public function setJsonRequest();

    /**
     * Set response data to be decoded as JSON
     * @return self
     */
    public function setJsonResponse();

    /**
     * Unset header array per given indexes
     * @param $indexes
     * @return self
     */
    public function unsetHeaders($indexes);

    /**
     * Load content
     * @return \stdClass
     */
    public function fetch();

}