<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Admin;


class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
        
    //   $response= $this->withHeaders(["x-vaule","d"])
    //                  ->json('get','/show3',["name"=>"dog"]);
  
    //    $response->assertStatus(200)->assertSeeText("show3");

    // }

  



     public function testAddData(){

           $admins = factory(Admin::class,3)->create()
                   ->each(function($admin){

                        $admin->address()->save(factory(\App\Models\AdminAddress::class)->make());

                   });

       

     }

}
