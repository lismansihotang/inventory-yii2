<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BarangStockGudang]].
 *
 * @see BarangStockGudang
 */
class BarangStockGudangQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BarangStockGudang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BarangStockGudang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
