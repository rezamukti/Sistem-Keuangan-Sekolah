<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaymentTransaction;

/**
 * PaymentTransactionSearch represents the model behind the search form about `app\models\PaymentTransaction`.
 */
class PaymentTransactionSearch extends PaymentTransaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'student_nis', 'payment_for_id', 'payment_status_id', 'payment_method_id', 'user_id'], 'integer'],
            [['payment_for_name', 'year', 'month', 'create_at'], 'safe'],
            [['price_invoice', 'student_paid'], 'number'],
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
        $query = PaymentTransaction::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'student_nis' => $this->student_nis,
            'payment_for_id' => $this->payment_for_id,
            'year' => $this->year,
            'price_invoice' => $this->price_invoice,
            'student_paid' => $this->student_paid,
            'payment_status_id' => $this->payment_status_id,
            'payment_method_id' => $this->payment_method_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'payment_for_name', $this->payment_for_name]);
        $query->andFilterWhere(['like', 'create_at', $this->create_at]);
        $query->andFilterWhere(['like', 'month', $this->month]);

        return $dataProvider;
    }
}
