<?php

namespace common\behaviors;

use dosamigos\transliterator\TransliteratorHelper;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;
use yii\httpclient\Exception;

class SlugBehavior extends Behavior
{
    public $in_attribute;
    public $out_attribute;
    public $translit = true;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'getSlug'
        ];
    }

    /**
     * @param $event
     */
    public function getSlug($event)
    {
        if(empty($this->owner->{$this->out_attribute})){
            $this->owner->{$this->out_attribute} = $this->generateSlug($this->owner->{$this->in_attribute});
        }

    }

    /**
     * @param $slug
     * @return string
     */
    public function generateSlug($slug)
    {
        $slug = $this->getTranslit();
        if ($this->checkUniqueSlug($slug)) {
            return $slug;
        } else {
            for ($suffix = 2; !$this->checkUniqueSlug($new_slug = $slug . '-' . $suffix); $suffix++) {
            }
            return $new_slug;
        }
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getTranslit()
    {
        if(!empty($this->in_attribute)) {
            return Inflector::slug(TransliteratorHelper::process($this->owner->{$this->in_attribute}, '-'));
        }else throw new Exception('Field "in_attribute" cannot be empty');
    }

    private function checkUniqueSlug($slug)
    {
        $pk = $this->owner->primaryKey();
        $pk = $pk[0];

        $condition = $this->out_attribute . ' = :out_attribute';
        $params = [':out_attribute' => $slug];
        if (!$this->owner->isNewRecord) {
            $condition .= ' and ' . $pk . ' != :pk';
            $params[':pk'] = $this->owner->{$pk};
        }

        return !$this->owner->find()
            ->where($condition, $params)
            ->one();
    }

}