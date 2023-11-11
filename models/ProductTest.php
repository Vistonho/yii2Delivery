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
 *
 * @property Category $category
 */
class ProductTest extends \yii\db\ActiveRecord
{

    public $imageFile;

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
            [['title', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Наименование товара',
            'image' => 'Изображение товара',
            'category_id' => 'Категория товара',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function upload()
    {
        if ($this->validate()) { 
            $fileName = time() . Yii::$app->security->generateRandomString(5) . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs('img/' . $fileName);
            $this->image = $fileName;
            return true;
        } else {
            return false;
        }
    }
}
