<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Student;

/**
 * StudentSearch represents the model behind the search form about `app\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gender_id', 'religion_id', 'province_id', 'regency_id', 'city_id', 'class_id', 'student_status_id'], 'integer'],
            [['nisn', 'nik', 'full_name', 'birth_place', 'birth_date', 'mother_name', 'father_name', 'parent_occupation', 'address', 'rt', 'rw', 'postal_code', 'no_hp'], 'safe'],
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
        $query = Student::find();

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
            'birth_date' => $this->birth_date,
            'gender_id' => $this->gender_id,
            'religion_id' => $this->religion_id,
            'province_id' => $this->province_id,
            'regency_id' => $this->regency_id,
            'city_id' => $this->city_id,
            'class_id' => $this->class_id,
            'student_status_id' => $this->student_status_id,
        ]);

        $query->andFilterWhere(['like', 'nisn', $this->nisn])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'birth_place', $this->birth_place])
            ->andFilterWhere(['like', 'mother_name', $this->mother_name])
            ->andFilterWhere(['like', 'father_name', $this->father_name])
            ->andFilterWhere(['like', 'parent_occupation', $this->parent_occupation])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'postal_code', $this->postal_code])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp]);

        return $dataProvider;
    }
}
