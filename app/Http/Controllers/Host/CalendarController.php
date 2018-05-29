<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
  public $prev;
  public $next;
  public $yearMonth;
  public $_thisMonth;
  
  public function __construct(){
    $this->middleware('auth');
  }
	
  public function index(){
    $user=Auth::user();
    
    $this->_thisMonth=new \DateTime('first day of this month');
    $prev=$this->_createPrevLink();
    $next=$this->_createNextLink();
    $yearMonth=$this->_thisMonth->format('F Y');
    
    $tail=$this->_getTail();
    $body=$this->_getBody();
    $head=$this->_getHead();
    $calendar='<tr>'.$tail.$body.$head.'</tr>';
    
    return view('/host/calendar/calendar', compact('user', 'prev', 'next', 'yearMonth', 'calendar'));
  }
  
  public function show($t){
    $user=Auth::user();
    $this->_thisMonth = new \DateTime($t);
    $prev=$this->_createPrevLink();
    $next=$this->_createNextLink();
    $this->yearMonth = $this->_thisMonth->format('F Y');
    $yearMonth=$this->_thisMonth->format('F Y');
    
    $tail=$this->_getTail();
    $body=$this->_getBody();
    $head=$this->_getHead();
    $calendar='<tr>'.$tail.$body.$head.'</tr>';
    
    return view('/host/calendar/calendar', compact('user', 'prev', 'next', 'yearMonth', 'calendar'));
  }
  
  private function _createPrevLink(){
    $dt=clone $this->_thisMonth;
    return $dt->modify('-1 month')->format('Y-m');
  }
  
  private function _createNextLink(){
    $dt=clone $this->_thisMonth;
    return $dt->modify('+1 month')->format('Y-m');
  }
  
  private function _getTail(){
    $tail='';
    $lastDayOfPrevMonth=new \DateTime('last day of '.$this->yearMonth.' -1 month');
    while($lastDayOfPrevMonth->format('w')<6){
      $tail=sprintf('<td class="gray">%d</td>', $lastDayOfPrevMonth->format('d')).$tail;
      $lastDayOfPrevMonth->sub(new \DateInterval('P1D'));
    }
    return $tail;
  }
  
  private function _getBody(){
    $body='';
    $period=new \DatePeriod(
      new \DateTime('first day of '.$this->yearMonth),
      new \DateInterval('P1D'),
      new \DateTime('first day of '.$this->yearMonth.' +1 month')
    );
    $today=new \DateTime('today');
    foreach($period as $day){
      if($day->format('w')==='0'){
        $body.='</tr><tr>';
      }
      $todayClass=($day->format('Y-m-d')===$today->format('Y-m-d'))?'today':'';
      
      $body.=sprintf('<td class="youbi_%d %s" data-toggle="modal" data-target="#exampleModalCenter">%d</td>', $day->format('w'), $todayClass, $day->format('d'));
    }
    return $body;
  }
  
  private function _getHead(){
    $head='';
    $firstDayOfNextMonth=new \DateTime('first day of '.$this->yearMonth.' +1 month');
    while($firstDayOfNextMonth->format('w')>0){
      $head.=sprintf('<td class="gray">%d</td>', $firstDayOfNextMonth->format('d'));
      $firstDayOfNextMonth->add(new \DateInterval('P1D'));
    }
    return $head;
  }
  
  
  
}

