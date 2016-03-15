<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Timetable extends CI_Model{
    
    protected $xml= null; 
    //these are the three properties for each of the facets created
    //all held in seperate arrays that holds bookings
    protected $days = array(); 
    protected $timeslots = array(); 
    protected $courses = array(); 
    
    public function __construct() {
        parent::__contstruct(); 
        $this->xml = simplexml_load_file(DATAPATH . 'masterPage.xml'); 
        
        //build the list for days - approach 1
        foreach ($this->xml->days->day as $day){
            $this->days[] = new Booking($day);  
        }
        
        //build the list for timeslots - approach 1
        foreach ($this->xml->timeslots->timeslot as $timeslot){
            $this->timeslots[] = new Booking($timeslot); 
        }
        
        //build the list for courses - approach 1
        foreach ($this->xml->courses->course as $course){
            $this->courses[] = new Booking($course); 
        }
       
    }
}
