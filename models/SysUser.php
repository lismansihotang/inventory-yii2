<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sys_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $pass
 * @property string $fullname
 */
class SysUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'pass'], 'string', 'max' => 35],
            [['fullname'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'pass' => 'Password',
            'fullname' => 'Nama Lengkap',
        ];
    }

    /**
     * @inheritdoc
     * @return SysUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SysUserQuery(get_called_class());
    }
}
