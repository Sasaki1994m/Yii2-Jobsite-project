<?php

namespace app\models;

use yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\Security;

class User extends ActiveRecord implements IdentityInterface
{
    public $password_repeat;
    public $authKey;

    public static function tableName()
    {
        return '{{%tbl_user}}';
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['full_name','username','email', 'password', 'password_repeat'], 'required'],
            // rememberMe must be a boolean value
            ['email', 'email'],
            // password is validated by validatePassword()
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    // /**
    //  * {@inheritdoc}
    //  */
    public static function findIdentity($id)
    {
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // foreach (self::$users as $user) {
        //     if ($user['accessToken'] === $token) {
        //         return new static($user);
        //     }
        // }

        // return null;
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }    
    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }
    public static function findByUsername($username)
    {
        return User::findOne(['username' => $username]);

        // foreach (self::$users as $user) {
        //     if (strcasecmp($user['username'], $username) === 0) {
        //         return new static($user);
        //     }
        // }

        // return null;
    }
    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */


    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if($this->isNewRecord){
                $this->auth_key = \yii::$app->security->generateRandomString();
            }
            if (isset($this->password)) {
                $this->password = md5($this->password);
                return parent::beforeSave($insert);
            }
        }

        return true;
    }
    //リレーションの設定
    public function getJob()
    {
        return $this->hasMany(Job::class, ['user_id' => 'id']);
    }

    
}
