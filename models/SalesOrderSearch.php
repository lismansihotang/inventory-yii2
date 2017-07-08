<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SalesOrder;

/**
 * SalesOrderSearch represents the model behind the search form about `app\models\SalesOrder`.
 */
class SalesOrderSearch extends SalesOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_supplier', 'id_customer', 'insert_user', 'update_user'], 'integer'],
            [['tgl', 'no_po', 'tgl_po', 'no_pengiriman', 'tgl_pengiriman', 'lokasi_pengiriman', 'insert_date', 'update_date'], 'safe'],
            [['subtotal', 'disc', 'ppn', 'total'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SalesOrder::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tgl' => $this->tgl,
            'tgl_po' => $this->tgl_po,
            'id_supplier' => $this->id_supplier,
            'id_customer' => $this->id_customer,
            'tgl_pengiriman' => $this->tgl_pengiriman,
            'subtotal' => $this->subtotal,
            'disc' => $this->disc,
            'ppn' => $this->ppn,
            'total' => $this->total,
            'insert_date' => $this->insert_date,
            'insert_user' => $this->insert_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'no_po', $this->no_po])
            ->andFilterWhere(['like', 'no_pengiriman', $this->no_pengiriman])
            ->andFilterWhere(['like', 'lokasi_pengiriman', $this->lokasi_pengiriman]);

        return $dataProvider;
    }
}
