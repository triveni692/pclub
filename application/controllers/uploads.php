<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Uploads extends CI_Controller {

   function __construct()
   {
     parent::__construct();
     $this->load->helper('url');
   }

   function index($default='none')
   {
     show_404('uploads/'.$default);
   }

   function tutorials($default='none')
   { 
     if($default=='none') show_404('uploads/tutorials/');
     $a = base_url() . 'uploads/tutorials/' . $default;
     echo base_url();

   }
   
   function pic($default='none')
   {    
     if($default=='none') show_404('uploads/pic/');
     $a = base_url() . 'uploads/pic/' . $default;
     echo base_url();
   }

 }