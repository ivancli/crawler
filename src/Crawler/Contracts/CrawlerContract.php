<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 7/11/2017
 * Time: 5:47 PM
 */

namespace IvanCLI\Crawler\Contracts;


abstract class CrawlerContract implements CrawlerInterface
{
    protected $request_type = 'GET';

    protected $url;
    protected $content;
    protected $status;

    protected $request_data;

    protected $ip;
    protected $port;

    protected $cookies_path;

    protected $headers = [
        'Accept-Language: en-us',
        'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.15) Gecko/20110303 Firefox/3.6.15',
        'Connection: Keep-Alive',
        'Cache-Control: no-cache',
    ];


    /**
     * Push header
     * @param $headers
     * @return void
     */
    public function setHeaders($headers)
    {
        if (is_array($headers)) {
            $this->headers = array_merge($this->headers, $headers);
        } else {
            array_push($this->headers, $headers);
        }
    }

    /**
     * Get loaded content
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get request status code
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set request type
     * @param $type
     * @return void
     */
    public function setRequestType($type)
    {
        $this->request_type = $type;
    }

    /**
     * set target URL
     * @param $url
     * @return void
     */
    public function setURL($url)
    {
        $this->url = $url;
    }

    /**
     * Update content property
     * @param $content
     * @return void
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Update status property
     * @param $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Set proxy IP address
     * @param $ip
     * @param int $port
     * @return void
     */
    public function setProxy($ip, $port = 80)
    {
        $this->ip = $ip;
        $this->port = $port;
    }

    /**
     * Set path to store cookies
     * @param $path
     * @return void
     */
    public function setCookiesPath($path)
    {
        $this->cookies_path = $path;
    }

    /**
     * Set request data
     * @param array $data
     * @return void
     */
    public function setRequestData(array $data)
    {
        $this->request_data = $data;
    }


    /**
     * Unset header array per given indexes
     * @param $indexes
     * @return void
     */
    public function unsetHeaders($indexes)
    {
        foreach ($indexes as $index) {
            if (array_key_exists($index, $this->headers)) {
                unset($this->headers[$index]);
            }
        }
    }
}