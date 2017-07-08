<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PemesananDetail]].
 *
 * @see PemesananDetail
 */
class PemesananDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PemesananDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PemesananDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
