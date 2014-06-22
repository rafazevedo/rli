<?php

namespace Drupal\RLIAdmin\Form;

use Drupal\Core\Form\FormBase;

class RLIConfigForm extends Formbase {
  
  protected $formId = 'RLIConfigForm';
  
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return $this->formId;
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {
    
    $form['rli_releaselog_hdmovie_url'] = array(
        '#type' => 'textfield',
        '#title' => $this->t('URL da página de filmes do Releaselog'),
        '#description' => $this->t('.'),
    );
    
    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => $this->t('Gravar'), 
    );
            
    return $form;
  }
  
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, array &$form_state) {
    return TRUE;
  }
  
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, array &$form_state) {
    drupal_set_message($this->t('Configurações gravadas com sucesso.'));
  }
}