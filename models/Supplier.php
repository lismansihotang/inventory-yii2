<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id
 * @property string $nm_supplier
 * @property string $alamat
 * @property string $no_telp
 * @property string $no_fax
 * @property string $email
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_supplier', 'no_telp'], 'required'],
            [['alamat'], 'string'],
            [['nm_supplier', 'email'], 'string', 'max' => 35],
            [['no_telp', 'no_fax'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_supplier' => 'Nama Supplier',
            'alamat' => 'Alamat',
            'no_telp' => 'No. Telp',
            'no_fax' => 'No. Fax',
            'email' => 'Email',
        ];
    }

    /**
     * @inheritdoc
     * @return SupplierQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SupplierQuery(get_called_class());
    }
}
