<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonaController
 *
 * @author universidad
 */
class PersonaController extends BaseController{
   
    public function index(){
        $Personas =Persona::all();
        return View::make('persona',compact('Personas'));
    }
}