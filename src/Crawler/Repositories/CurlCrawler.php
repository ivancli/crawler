<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 7/11/2017
 * Time: 6:16 PM
 */

namespace IvanCLI\Crawler\Repositories;


use IvanCLI\Crawler\Contracts\CrawlerContract;
use Ixudra\Curl\Facades\Curl;

class CurlCrawler extends CrawlerContract
{
    /**
     * Load content
     * @return void
     */
    public function fetch()
    {
        $curler = Curl::to($this->url)
            ->withHeaders($this->headers)
            ->returnResponseObject()
            ->withOption("FOLLOWLOCATION", true);

        if(!is_null($this->cookies_path))
        {
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
        $this->status = $response->status;
        $this->content = $response->content;
    }
}