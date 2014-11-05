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
        	'user' => Input::get('usuario'),
        	'pass' => Input::get('password')
        	);
        User::create(array(
        		'user'=>$datos['user'],
        		'pass'=>Hash::make($datos['pass']),
        		'rol'=>'empleado'
        	));
        if(Auth::attempt($datos,Input::get('remember-me',0)))
        {
        	return Redirect::to('/home');
        }

        return Redirect::to('/')
        		->with('mensaje_error','Verifica tus datos')
        		->withInput();
        
    }
}
