<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Barang;

/**
 * BarangSearch represents the model behind the search form about `app\models\Barang`.
 */
class BarangSearch extends Barang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_satuan_kecil', 'id_satuan_besar', 'id_kategori', 'id_lokasi', 'stock', 'min_stock', 'user_id'], 'integer'],
            [['nm_barang', 'ket_barang'], 'safe'],
            [['harga_beli', 'margin_jual', 'harga_jual'], 'number'],
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
        $query = Barang::find();

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
            'harga_beli' => $this->harga_beli,
            'margin_jual' => $this->margin_jual,
            'harga_jual' => $this->harga_jual,
            'id_satuan_kecil' => $this->id_satuan_kecil,
            'id_satuan_besar' => $this->id_satuan_besar,
            'id_kategori' => $this->id_kategori,
            'id_lokasi' => $this->id_lokasi,
            'stock' => $this->stock,
            'min_stock' => $this->min_stock,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'nm_barang', $this->nm_barang])
            ->andFilterWhere(['like', 'ket_barang', $this->ket_barang]);

        return $dataProvider;
    }
}
