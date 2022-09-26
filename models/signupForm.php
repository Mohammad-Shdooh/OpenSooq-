<?php

namespace app\models;

use yii\base\Security;
use yii\helpers\VarDumper;
use yii\rbac\Rule;
use yii\base\Model;

class signupForm extends Model
{

    public $username ;
    public $password  ;
    public $password_repeated ;


    public function rules()
    {
        return [
            [['username', 'password' , 'password_repeated'], 'required'] ,
            [['username', 'password' , 'password_repeated'], 'string' ,'min'=>4 , 'max'=>16] ,
            ['password_repeated' , 'compare' , 'compareAttribute' =>'password']
        ] ;
    }

    public  function signup() {
        $user = new User() ;
        $user ->username = $this->username ;
        $user ->password = \Yii::$app->getSecurity()->generatePasswordHash($this->password);
        $user ->access_token = \Yii::$app->getSecurity()->generateRandomString() ;
        $user ->auth_key = \Yii::$app->getSecurity()->generateRandomString() ;

        if($user->save()) {
            return true ;

        }else  {
            \Yii::error("User was not saved. ".VarDumper::dumpAsString($user->errors));
            return false ;
        }
    }
}