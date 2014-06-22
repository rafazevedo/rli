<?php

namespace Drupal\RLIAdmin\Controller;

use Drupal\Core\Controller\ControllerBase;

class RLIAdminController extends ControllerBase {
    public function content() {
        return array(
            '#type' => 'markup',
            '#markup' => t('Hello.'),
        );
    }
}