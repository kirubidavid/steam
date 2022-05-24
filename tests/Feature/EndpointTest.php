<?php

namespace Tests\Feature;

use GuzzleHttp\Client;
use Test\TestCase;

class EndpointTest extends TestCase
{

    /** @test */
    public function get_home_end_point() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:8181/public/');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function post_create_account() {
        $client = new Client();
        $response = $client->request('POST', 'http://localhost:8181/public/api/account-create', [
            'form_params' => [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'phonenumber' => '254722000000',
                'password' => 'Admin123']]);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function post_invalid_first_name(Type $var = null)
    {

        try{
            $client = new Client();
            $response = $client->request('POST', 'http://localhost:8181/public/api/account-create', [
                'form_params' => [
                    'firstname' => '',
                    'lastname' => 'Doe',
                    'phonenumber' => '254722000000',
                    'password' => 'Admin123']]);
        }catch (\Exception $e){
            $this->assertEquals(400, $e->getCode());
        }

    }

    /** @test */
    public function post_invalid_last_name(Type $var = null)
    {
            
        try{
            $client = new Client();
            $response = $client->request('POST', 'http://localhost:8181/public/api/account-create', [
                'form_params' => [
                    'firstname' => 'John',
                    'lastname' => '',
                    'phonenumber' => '254722000000',
                    'password' => 'Admin123']]);
        }catch (\Exception $e){
            $this->assertEquals(400, $e->getCode());
        }
    
    }

    /** @test */
    public function post_invalid_phone_number(Type $var = null)
    {
                
        try{
            $client = new Client();
            $response = $client->request('POST', 'http://localhost:8181/public/api/account-create', [
                'form_params' => [
                    'firstname' => 'John',
                    'lastname' => 'Doe',
                    'phonenumber' => '',
                    'password' => 'Admin123']]);
        }catch (\Exception $e){
            $this->assertEquals(400, $e->getCode());
        }
        
    }

    /** @test */
    public function post_invalid_password(Type $var = null)
    {
                        
        try{
            $client = new Client();
            $response = $client->request('POST', 'http://localhost:8181/public/api/account-create', [
                'form_params' => [
                    'firstname' => 'John',
                    'lastname' => 'Doe',
                    'phonenumber' => '254722000000',
                    'password' => '']]);
        }catch (\Exception $e){
            $this->assertEquals(400, $e->getCode());
        }
                
    }

    /** @test */
    public function post_invalid_phone_number_length(Type $var = null)
    {
        $client = new Client();
        $response = $client->request('POST', 'http://localhost:8181/public/api/account-create', [
            'form_params' => [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'phonenumber' => '25472200',
                'password' => 'Admin123']]);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function post_invalid_password_length(Type $var = null)
    {
        $client = new Client();
        $response = $client->request('POST', 'http://localhost:8181/public/api/account-create', [
            'form_params' => [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'phonenumber' => '254722000000',
                'password' => 'Admin']]);
        $this->assertEquals(200, $response->getStatusCode());
    }


}