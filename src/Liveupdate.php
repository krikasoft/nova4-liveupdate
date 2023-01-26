<?php

namespace Sfinktah\Nova4Liveupdate;

use Illuminate\Support\Facades\Config;
use Laravel\Nova\Fields\Field;

class Liveupdate extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova4-liveupdate';

    protected function resolveAttribute($resource, $attribute)
    {
        $this->setResourceId(data_get($resource, $resource->getKeyName()));

        return parent::resolveAttribute($resource, $attribute);
    }

    protected function setResourceId($id)
    {
        return $this->withMeta(['id' => $id, 'nova_path' => Config::get('nova.path')]);
    }

    public function minWidth($width = 100)
    {
        return $this->withMeta(['minWidth' => $width]);
    }
}
