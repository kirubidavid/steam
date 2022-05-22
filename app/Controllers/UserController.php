<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\UsUser;
use Ramsey\Uuid\Uuid;
use Valitron\Validator;

class UserController
{
    protected $container;

    protected  $usUser;


    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        $this->usUser = new UsUser();        
    }

    public function postCreateAccount(Request $request,  Response $response)
    {
        $uuid = Uuid::uuid4();

        # Form validation
        $v = new Validator($request->getParsedBody());

        $v->rules (['required'=>['phonenumber', 'firstname', 'othername'],
                  'lengthMin'=>['phonenumber'=>12]]);

        $v->validate();

        if(!empty($v->errors())){
            return $response->withJson(['error'=>$v->errors()]);
        }

        # Create user

        $data = ['uuid'=> $uuid->toString() , 
                'us_first_name'=>'John', 
                'us_last_name'=>'Doe', 
                'us_phone_number'=>'254721600401', 
                'us_password'=>password_hash('Admin123', PASSWORD_DEFAULT)];

        $this->usUser->createUser($data);

        # Return response

        return $response->withJson(['message' => 'Welcome to Slim!']);
    }

}