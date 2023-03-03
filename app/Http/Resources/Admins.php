<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Admins extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        // return [

        //     'data' => $this->collection,
        //     'links' => [
        //         'self' => 'link-value',
        //     ],
        //     'status'=>200
        // ];
        return parent::toArray($request);
    }

    public function with($request){
        return [
            "sex"=>'male'
        ];
    }

    public function withResponse($request,$response){
       $response->header('x-d','d');
    }
}
