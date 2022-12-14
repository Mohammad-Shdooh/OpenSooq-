<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'auth_key', 'access_token'], 'required'],
            [['username', 'password', 'auth_key', 'access_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }

    public static function findIdentity($id)
    {
        return self::findOne($id) ;

    }

    public static function findByUsername($username) {
        return self::find()->where(['username'=>$username])->one() ;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
     return self::find()->where(['access_token'=>$token])->one();
    }

    public function getId()
    {

        return $this->id ;
    }

    public function getAuthKey()
    {

        return $this->auth_key ;

    }

    public function validateAuthKey($authKey)
    {

        return $this->auth_key ===$authKey ;
    }

    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password) ;
    }


}
