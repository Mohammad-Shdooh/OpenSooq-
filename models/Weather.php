<?php

namespace app\models;

use Yii;
use Yiisoft\Json\Json;
class Weather extends \yii\base\Widget
{

    public $currently = true;

    public $hourly = null;

    public $daily = null;

    public $unit = 'si';

    public $timezone ;
    public  $temp ;
    public  $weatherDescription ;

    public $weather ;

    public  $lat =33.44  ;
    public $lon =-94.04 ;
    public  $apiKey ="1fcbb9d84754539ceb0045c9dbd1b844" ;

    public function init(){
        parent::init();

    }

    public function run(){
        parent::run();

        $weather = file_get_contents("https://api.openweathermap.org/data/2.5/onecall?lat=".$this->lat."&lon=".$this->lon."&exclude=".$this->daily."&appid=".$this->apiKey);

        $weatherDecode = json_decode($weather);
        $this->timezone = $weatherDecode->timezone ;
//        $this->temp = $weatherDecode->current->temp;
        $this->weatherDescription = $weatherDecode->current->weather[0]->description;
        $this->temp = $this->ConvertTempFromKilvenTo_celisus($weatherDecode->current->temp) ;
        $this->weather = $weatherDecode ;


//        return $this->renderFile('weather' , [
//            'weather'       =>  $weatherDecode,
//            'currently'     =>  $this->currently,
//            'unit'          =>  $this->unit,
//            'hourly'        =>  $this->hourly,
//            'daily'         =>  $this->daily
//       ]);
        return $this;
//return $this ;
    }

    public  function ConvertTempFromKilvenTo_celisus($KilvenTemp) {
        $celisusTemp = $KilvenTemp -273.15 ;
        return $celisusTemp ;
    }
}