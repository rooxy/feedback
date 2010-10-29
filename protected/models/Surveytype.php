<?php

/**
 * This is the model class for table "surveytype".
 *
 * The followings are the available columns in table 'surveytype':
 * @property integer $id
 * @property string $title
 * @property integer $defaultDaysToAnswer
 *
 * The followings are the available model relations:
 * @property Topic[] $topics
 */
class Surveytype extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Surveytype the static model class
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
		return 'surveytype';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, title', 'required'),
			array('id, defaultDaysToAnswer', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, defaultDaysToAnswer', 'safe', 'on'=>'search'),
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
			'topics' => array(self::HAS_MANY, 'Topic', 'surveytype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'defaultDaysToAnswer' => 'Default Days To Answer',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('defaultDaysToAnswer',$this->defaultDaysToAnswer);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}