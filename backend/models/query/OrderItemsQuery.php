<?php

namespace backend\models\query;

/**
 * This is the ActiveQuery class for [[\backend\models\OrderItems]].
 *
 * @see \backend\models\OrderItems
 */
class OrderItemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\models\OrderItems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\OrderItems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
