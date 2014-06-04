<?php

/**
 * This is the model base class for the table "cliente".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Cliente".
 *
 * Columns in table "cliente" available as properties of the model,
 * followed by relations of table "cliente" available as properties of the model.
 *
 * @property integer $id
 * @property string $tipo
 * @property string $nombre
 * @property string $apellido
 * @property string $razon_social
 * @property string $celuda
 * @property string $telefono
 * @property string $celular
 * @property string $email_1
 * @property string $email_2
 * @property string $descripcion
 * @property string $estado
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $direccion_principal_id
 * @property integer $direccion_secundaria_id
 * @property integer $ciudad_id
 *
 * @property Ciudad $ciudad
 * @property Direccion $direccionPrincipal
 * @property Direccion $direccionSecundaria
 */
abstract class BaseCliente extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'cliente';
    }

    public static function representingColumn() {
        return 'tipo';
    }

    public function rules() {
        return array(
            array('tipo, nombre, apellido', 'required'),
            array('direccion_principal_id, direccion_secundaria_id, ciudad_id', 'numerical', 'integerOnly'=>true),
            array('nombre, apellido, razon_social', 'length', 'max'=>64),
            array('celuda', 'length', 'max'=>20),
            array('telefono, celular', 'length', 'max'=>24),
            array('email_1, email_2', 'length', 'max'=>255),
            array('estado', 'length', 'max'=>8),
            array('descripcion, fecha_actualizacion', 'safe'),
            array('estado', 'in', 'range' => array('ACTIVO','INACTIVO')), // enum,
            array('razon_social, celuda, telefono, celular, email_1, email_2, descripcion, estado, fecha_actualizacion, direccion_principal_id, direccion_secundaria_id, ciudad_id', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, tipo, nombre, apellido, razon_social, celuda, telefono, celular, email_1, email_2, descripcion, estado, fecha_creacion, fecha_actualizacion, direccion_principal_id, direccion_secundaria_id, ciudad_id', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id'),
            'direccionPrincipal' => array(self::BELONGS_TO, 'Direccion', 'direccion_principal_id'),
            'direccionSecundaria' => array(self::BELONGS_TO, 'Direccion', 'direccion_secundaria_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'tipo' => Yii::t('app', 'Tipo'),
                'nombre' => Yii::t('app', 'Nombre'),
                'apellido' => Yii::t('app', 'Apellido'),
                'razon_social' => Yii::t('app', 'Razon Social'),
                'celuda' => Yii::t('app', 'Celuda'),
                'telefono' => Yii::t('app', 'Telefono'),
                'celular' => Yii::t('app', 'Celular'),
                'email_1' => Yii::t('app', 'Email 1'),
                'email_2' => Yii::t('app', 'Email 2'),
                'descripcion' => Yii::t('app', 'Descripcion'),
                'estado' => Yii::t('app', 'Estado'),
                'fecha_creacion' => Yii::t('app', 'Fecha Creacion'),
                'fecha_actualizacion' => Yii::t('app', 'Fecha Actualizacion'),
                'direccion_principal_id' => Yii::t('app', 'Direccion Principal'),
                'direccion_secundaria_id' => Yii::t('app', 'Direccion Secundaria'),
                'ciudad_id' => Yii::t('app', 'Ciudad'),
                'ciudad' => null,
                'direccionPrincipal' => null,
                'direccionSecundaria' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('tipo', $this->tipo, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellido', $this->apellido, true);
        $criteria->compare('razon_social', $this->razon_social, true);
        $criteria->compare('celuda', $this->celuda, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('email_1', $this->email_1, true);
        $criteria->compare('email_2', $this->email_2, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('estado', $this->estado, true);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('direccion_principal_id', $this->direccion_principal_id);
        $criteria->compare('direccion_secundaria_id', $this->direccion_secundaria_id);
        $criteria->compare('ciudad_id', $this->ciudad_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'fecha_creacion',
                'updateAttribute' => 'fecha_actualizacion',
                'timestampExpression' => new CDbExpression('NOW()'),
            )
        ), parent::behaviors());
    }
}