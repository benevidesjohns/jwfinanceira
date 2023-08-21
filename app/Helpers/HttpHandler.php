<?php

namespace App\Helpers;

class HttpHandler
{
    public function apiBaseURL()
    {
        return 'http://localhost/api/';
    }

    public function sendByResponseType($viewName, $data, $status, $responseType, $isMessage)
    {
        if ($responseType == 'xml') {
            $view = $isMessage ? 'message' : $viewName;

            if ($isMessage) {
                $data = $data['info'];
            }

            return response()
                ->view('xml_templates.' . $view, compact('data', 'status'), $status)
                ->header('Content-Type', 'text/xml');

        } else if ($responseType == 'json' || $responseType == null) {
            return response()->json($data, $status);

        } else {
            return response(status: 400);
        }
    }

    public function getContentByRequestType($requestType, $content)
    {
        if ($requestType == 'xml') {
            $sxe = simplexml_load_string($content);

            $keys = [];
            $values = [];
            for ($i = 0; $i < $sxe->count(); $i++) {
                array_push($keys, $sxe->children()[$i]->getName());
                array_push($values, $sxe->children()[$i]->__toString());
            }

            return array_combine($keys, $values);
        }

        if ($requestType == 'json' || $requestType == null) {
            return (array) json_decode($content);
        }

        return null;
    }
}