<?php

/**
 * This is the model class for table "opinion".
 *
 * The followings are the available columns in table 'opinion':
 * @property integer $id
 * @property integer $user
 * @property integer $topic
 * @property integer $survey
 * @property string $text
 *
 * The followings are the available model relations:
 * @property User $user0
 * @property Topic $topic0
 * @property Survey $survey0
 */
class Opinion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Opinion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'opinion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user, topic, survey, text', 'required'),
			array('user, topic, survey', 'numerical', 'integerOnly'=>true),
			array('text', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user, topic, survey, text', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user0' => array(self::BELONGS_TO, 'User', 'user'),
			'topic0' => array(self::BELONGS_TO, 'Topic', 'topic'),
			'survey0' => array(self::BELONGS_TO, 'Survey', 'survey'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user' => 'User',
			'topic' => 'Topic',
			'survey' => 'Survey',
			'text' => 'Text',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user',$this->user);
		$criteria->compare('topic',$this->topic);
		$criteria->compare('survey',$this->survey);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}