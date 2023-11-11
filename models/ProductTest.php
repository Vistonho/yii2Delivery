<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_test".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property int $category_id
 */
class ProductTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'image', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'category_id' => 'Category ID',
        ];
    }
}
