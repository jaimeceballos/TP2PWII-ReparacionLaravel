<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author universidad
 */
class LoginController  extends BaseController{
    //put your code here
    function login(){
        $datos = array(
        	'username' => Input::get('usuario'),
        	'password' => Input::get('password')
        	);
        /*User::create(array(
        		'user'=>$datos['user'],
        		'pass'=>Hash::make($datos['pass']),
        		'rol'=>'empleado'
        	));*/
        if(Auth::attempt($datos))
        {
        	return Redirect::to('/personas/1');
        }
        /*$user = User::find(3);
        if(Auth::login($user))
        {
            return Redirect::to('/home');
        }*/
        return Redirect::to('/')
        		->with('mensaje_error','Verifica tus datos'.serialize($user))
        		->withInput();
        
    }
}
