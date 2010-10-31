<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $login
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Team[] $teams
 * @property Opinion[] $opinions
 */
class User extends CActiveRecord
{
    public $conf_password;
    public $plain_password;

	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'user';
	}


    public function beforeSave() {
        if (!empty($this->plain_password))
            $this->password=md5($this->plain_password);
        return true;
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, plain_password, conf_password', 'required'),
			array('login', 'length', 'max'=>128),
			array('plain_password', 'length', 'max'=>45),
            array('conf_password', 'length', 'max'=>40),
            array('plain_password', 'compare', 'compareAttribute'=>'conf_password'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('login', 'safe', 'on'=>'search'),
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
			'teams' => array(self::MANY_MANY, 'Team', 'membership(user, team)'),
			'opinions' => array(self::HAS_MANY, 'Opinion', 'user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Benutzer',
			'plain_password' => 'Passwort',
            'conf_password' => 'Passwort bestätigen'
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

		$criteria->compare('login',$this->login,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}