<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

abstract class Api
{
    /**
     * Create client object
     * @param array $headers
     * @return Client
     */
    public static function client($headers)
    {
        return new Client([
            'headers' => $headers
        ]);
    }

    /**
     * Create client api with json header
     *
     * @return \GuzzleHttp\Client object client
     */
    public static function json($method, $url, $param = [], $headers = [], $isArrayResult = null)
    {
        $method = strtolower($method);

        try {
            $result = self::client(array_merge($headers, [
                            'Content-Type' => 'application/json'
                    ]))
                    ->{$method}($url, ['body' => json_encode($param), 'debug' => false, 'timeout' => 15]);

            if($isArrayResult !== null){
                return json_decode($result->getBody(), $isArrayResult);
            }

            return $result;
        } catch (RequestException $ex) {
            if ($ex->hasResponse()) {
                if ($isArrayResult !== null) {
                    return json_decode($ex->getResponse()->getBody(), $isArrayResult);
                }
                \Log::info($ex->getResponse());
                return $ex->getResponse();

            }
            \Log::info($ex->getMessage());
            return null;

        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return null;
        }
    }

    /**
     * Create client api with json header
     *
     * @return \GuzzleHttp\Client object client
     */
    public static function formData($method, $url, $param = [], $headers = [], $isArrayResult = null)
    {
        $method = strtolower($method);

        try {
            $result = self::client(array_merge(
                        $headers, [
                            'Content-Type' => 'multipart/form-data'
                        ]
                    ))
                    ->{$method}($url, ['body' => json_encode($param)]);

            if($isArrayResult !== null){
                return json_decode($result->getBody(), $isArrayResult);
            }

            return $result;
        } catch (RequestException $ex) {
            if ($ex->hasResponse()) {
                if($isArrayResult !== null){
                    return json_decode($ex->getResponse()->getBody(), $isArrayResult);
                }

                return $ex->getResponse();
            }

            return null;
        }
    }

    /**
     * Create client api with json header
     *
     * @return \GuzzleHttp\Client object client
     */
    public static function formUrlencoded($method, $url, $param = [], $headers = [], $isArrayResult = null)
    {
        $method = strtolower($method);

        try {
            $result = self::client(array_merge(
                        $headers, [
                            'Content-Type' => 'application/x-www-form-urlencoded'
                        ]
                    ))
                    ->{$method}($url, ['body' => json_encode($param)]);

            if($isArrayResult !== null){
                return json_decode($result->getBody(), $isArrayResult);
            }

            return $result;
        } catch (RequestException $ex) {
            if ($ex->hasResponse()) {
                if($isArrayResult !== null){
                    return json_decode($ex->getResponse()->getBody(), $isArrayResult);
                }

                return $ex->getResponse();
            }

            return null;
        }
    }
}


