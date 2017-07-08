<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Pemesanan]].
 *
 * @see Pemesanan
 */
class PemesananQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Pemesanan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Pemesanan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
