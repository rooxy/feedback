<?php

/**
 * This is the model class for table "opinion".
 *
 * The followings are the available columns in table 'opinion':
 * @property integer $id
 * @property integer $user
 * @property integer $topic
 * @property string $text
 *
 * The followings are the available model relations:
 * @property Topic $topic0
 * @property User $user0
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
			array('id, user, topic, text', 'required'),
			array('id, user, topic', 'numerical', 'integerOnly'=>true),
			array('text', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user, topic, text', 'safe', 'on'=>'search'),
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
			'topic0' => array(self::BELONGS_TO, 'Topic', 'topic'),
			'user0' => array(self::BELONGS_TO, 'User', 'user'),
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
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}