<?php namespace Raviraj\Rjgallery\Components;

use Cms\Classes\ComponentBase;
use Raviraj\Rjgallery\Models\Gallery as GalleryModel;
use Lang;

class Gallery extends ComponentBase
{
    public $gallery;

    public function componentDetails()
    {
        return [
            'name'        => 'raviraj.rjgallery::lang.idgallery.title',
            'description' => 'raviraj.rjgallery::lang.menu.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'idGallery' => [
                'title'             => 'raviraj.rjgallery::lang.idgallery.title',
                'description'       => 'raviraj.rjgallery::lang.idgallery.description',
                'type'              => 'dropdown',
            ],
            'lang' => [
                'title'             => 'raviraj.rjgallery::lang.misc.title',
                'description'       => 'raviraj.rjgallery::lang.misc.description',
                'type'              => 'string',
                'default'           => Lang::get('raviraj.rjgallery::lang.misc.defaultname')
            ],
            'jqueryinject' => [
                'title'             => 'raviraj.rjgallery::lang.jqueryinject.title',
                'description'       => 'raviraj.rjgallery::lang.jqueryinject.description',
                'type'              => 'dropdown',
                'default'           => 'yes',
                'options'           => $this->getOptionsArray('jqueryinject'),
            ],
            'thumbnail' => [
                'title'             => 'raviraj.rjgallery::lang.thumbnail.title',
                'description'       => 'raviraj.rjgallery::lang.thumbnail.description',
                'type'              => 'dropdown',
                'default'           => 'true',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.options'),
                'options'           => $this->getOptionsArray('thumbnail'),
            ],
            'caption' => [
                'title'             => 'raviraj.rjgallery::lang.caption.title',
                'description'       => 'raviraj.rjgallery::lang.caption.description',
                'type'              => 'dropdown',
                'default'           => 'true',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.options'),
                'options'           => $this->getOptionsArray('caption'),
            ],
            'desc' => [
                'title'             => 'raviraj.rjgallery::lang.desc.title',
                'description'       => 'raviraj.rjgallery::lang.desc.description',
                'type'              => 'dropdown',
                'default'           => 'true',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.options'),
                'options'           => $this->getOptionsArray('desc'),
            ],
            'counter' => [
                'title'             => 'raviraj.rjgallery::lang.counter.title',
                'description'       => 'raviraj.rjgallery::lang.counter.description',
                'type'              => 'dropdown',
                'default'           => 'true',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.options'),
                'options'           => $this->getOptionsArray('counter'),
            ],
            'controls' => [
                'title'             => 'raviraj.rjgallery::lang.controls.title',
                'description'       => 'raviraj.rjgallery::lang.controls.description',
                'type'              => 'dropdown',
                'default'           => 'true',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.options'),
                'options'           => $this->getOptionsArray('controls'),
            ],
            'preload' => [
                'title'             => 'raviraj.rjgallery::lang.preload.title',
                'description'       => 'raviraj.rjgallery::lang.preload.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'raviraj.rjgallery::lang.preload.validationMessage',
                'default'           => '1',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.options')
            ],

            'mode' => [
                'title'             => 'raviraj.rjgallery::lang.mode.title',
                'description'       => 'raviraj.rjgallery::lang.mode.description',
                'type'              => 'dropdown',
                'default'           => 'slide',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.effects'),
                'options'           => [
                    'slide'=>'raviraj.rjgallery::lang.mode.optionsslide',
                    'fade'=>'raviraj.rjgallery::lang.mode.optionsfade'
                ],
            ],
            'speed' => [
                'title'             => 'raviraj.rjgallery::lang.speed.title',
                'description'       => 'raviraj.rjgallery::lang.speed.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'raviraj.rjgallery::lang.speed.validationMessage',
                'default'           => '500',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.effects')
            ],
            'loop' => [
                'title'             => 'raviraj.rjgallery::lang.loop.title',
                'description'       => 'raviraj.rjgallery::lang.loop.description',
                'type'              => 'dropdown',
                'default'           => 'true',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.effects'),
                'options'           => $this->getOptionsArray('loop'),
            ],
            'auto' => [
                'title'             => 'raviraj.rjgallery::lang.auto.title',
                'description'       => 'raviraj.rjgallery::lang.auto.description',
                'type'              => 'dropdown',
                'default'           => 'false',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.effects'),
                'options'           => $this->getOptionsArray('auto'),
            ],
            'pause' => [
                'title'             => 'raviraj.rjgallery::lang.pause.title',
                'description'       => 'raviraj.rjgallery::lang.pause.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'raviraj.rjgallery::lang.pause.validationMessage',
                'default'           => '2000',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.effects')
            ],
            'escKey' => [
                'title'             => 'raviraj.rjgallery::lang.escKey.title',
                'description'       => 'raviraj.rjgallery::lang.escKey.description',
                'type'              => 'dropdown',
                'default'           => 'true',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.effects'),
                'options'           => $this->getOptionsArray('escKey'),
            ],
            'height' => [
                'title'             => 'raviraj.rjgallery::lang.height.title',
                'description'       => 'raviraj.rjgallery::lang.height.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'raviraj.rjgallery::lang.height.validationMessage',
                'default'           => '70',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.thumbs')
            ],
            'width' => [
                'title'             => 'raviraj.rjgallery::lang.width.title',
                'description'       => 'raviraj.rjgallery::lang.width.description',
                'type'              => 'string',
                'validationPattern' => '^[\d]+$',
                'validationMessage' => 'raviraj.rjgallery::lang.width.validationMessage',
                'default'           => '100',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.thumbs')
            ],
            'resizer' => [
                'title'             => 'raviraj.rjgallery::lang.resizer.title',
                'description'       => 'raviraj.rjgallery::lang.resizer.description',
                'type'              => 'dropdown',
                'default'           => 'auto',
                'group'             => Lang::get('raviraj.rjgallery::lang.groups.thumbs'),
                'options'           => [
                    'auto'      => 'raviraj.rjgallery::lang.resizer.optionsauto',
                    'crop'      => 'raviraj.rjgallery::lang.resizer.optionscrop',
                    'exact'     => 'raviraj.rjgallery::lang.resizer.optionsexact',
                    'landscape' => 'raviraj.rjgallery::lang.resizer.optionslandscape',
                    'portrait'  => 'raviraj.rjgallery::lang.resizer.optionsportrait',
                ],
            ],
        ];
    }

    protected function getOptionsArray($property)
    {
        $optionString = "raviraj.rjgallery::lang.%s.options%s";

        $formal   = $property != 'jqueryinject';
        $trueVal  = $formal ? 'true' : 'yes';
        $falseVal = $formal ? 'false' : 'no';

        return [
            $trueVal  => sprintf($optionString, $property, $falseVal),
            $falseVal => sprintf($optionString, $property, $trueVal),
        ];
    }

    public function getIdGalleryOptions()
    {
        return GalleryModel::getDropdownOptions();
    }

    public function onRun()
    {
        $this->prepareVars();

        if ($this->property('jqueryinject')=="yes") {
            $this->addJs('assets/js/jquery-1.9.1.min.js');
        }
        $this->addJs('assets/js/lightGallery.min.js');
        $this->addCss('assets/style/lightGallery.css');
    }

    public function onRender()
    {
        $this->prepareVars();
    }

    protected function prepareVars()
    {
        foreach ($this->getProperties() as $key => $value) {
            $this->page[$key] = $value;
        }

        $this->page['gallery'] = GalleryModel::findById($this->page['idGallery']);

        if (!isset($this->gallery)) {
            $this->gallery = $this->page['gallery'];
        }
    }
}
