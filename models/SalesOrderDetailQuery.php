<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SalesOrderDetail]].
 *
 * @see SalesOrderDetail
 */
class SalesOrderDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SalesOrderDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SalesOrderDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
