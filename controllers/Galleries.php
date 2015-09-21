<?php namespace Raviraj\Rjgallery\Controllers;

use Flash;
use BackendMenu;
use Backend\Classes\Controller;
use Raviraj\Rjgallery\Models\Gallery;

/**
 * Galleries Back-end Controller
 */
class Galleries extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Raviraj.Rjgallery', 'rjgallery', 'galleries');
    }

    public function index_onDelete()
    {
        $checked = post('checked');

        if (is_array($checked) && count($checked)) {
            Gallery::destroy($checked);

            Flash::success('Successfully deleted the selected galleries.');
        }

        return $this->listRefresh();
    }
}
