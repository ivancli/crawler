<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 20/06/2017
 * Time: 11:23 AM
 */

namespace IvanCLI\Crawler\Repositories;


use IvanCLI\Crawler\Contracts\CrawlerContract;
use Ixudra\Curl\Facades\Curl;

class EntranceCrawler extends CrawlerContract
{
    /**
     * Load content
     * @return void
     */
    public function fetch()
    {

        $this->singleFetch($this->__domain());
        $response = $this->singleFetch($this->url);
        $this->status = $response->status;
        $this->content = $response->content;
    }

    protected function singleFetch($url)
    {
        $curler = Curl::to($url)
            ->withHeaders($this->headers)
            ->returnResponseObject()
            ->withOption("FOLLOWLOCATION", true);

        if (!is_null($this->cookies_path)) {
            $curler->setCookieFile($this->cookies_path);
            $curler->setCookieJar($this->cookies_path);
        }

        if (!is_null($this->request_data)) {
            $curler->withData($this->request_data);
        }

        switch ($this->request_type) {
            case 'POST':
                $response = $curler->post();
                break;
            case 'PUT':
                $response = $curler->put();
                break;
            case 'PATCH':
                $response = $curler->patch();
                break;
            case 'DELETE':
                $response = $curler->delete();
                break;
            case 'GET':
            default:
                $response = $curler->get();

        }
        return $response;
    }

    private function __domain()
    {
        $segments = parse_url($this->url);
        $scheme = array_get($segments, 'scheme');
        $host = array_get($segments, 'host');
        if (!is_null($scheme) && !is_null($host)) {
            return "{$scheme}://$host";
        }
        return null;
    }
}