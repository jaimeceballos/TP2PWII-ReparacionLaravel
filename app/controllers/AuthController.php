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
class AuthController  extends BaseController{
    function index(){
        if(Auth::check())
        {
            return Redirect::to('/inicio');
        }
        return View::make('login');
    }
    //put your code here
    function login(){
        
        $datos = array(
        	'username' => Input::get('usuario'),
        	'password' => Input::get('password')
        	);
        /*User::create(array(
        		'username'=>$datos['username'],
        		'password'=>Hash::make($datos['password']),
        		'rol'=>'empleado'
        	));*/
        if(Auth::attempt($datos))
        {
        	return Redirect::to('cliente');
        }
       
        return Redirect::to('/')
        		->with('mensaje_error','Verifica tus datos')
        		->withInput();
        
    }
    function logout(){
        Auth::logout();
        return Redirect::to('/')
                    ->with('mensaje_error', 'Has cerrado sesion.');
    }
}
