<?php

namespace Drupal\RLIAdmin\Plugin\Block;

use Drupal\block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Bloco com as últimas entradas de filmes no Releaselog
 * 
 * @Block(
 *      id = "rli_news_block",
 *      admin_label = @Translation("News block"),
 * )
 */

class RLINewsBlock extends BlockBase {
    
  /**
   * {@inheritdoc}
   */
  public function build() {
    
    $config = $this->getConfiguration();
    
    if(isset($config['rli_news_block_settings']) && !empty($config['rli_news_block_settings'])) {
      $num_releases = $config['rli_news_block_settings'];
      
      $news_list = '';
      for ($i = 1; $i <= $num_releases; $i++) {
        $news_list .= '<div>Filme número '.$i.'</div>';
      }      
    }
    else {
      $news_list = 'Nenhum lançamento a exibir.';
    }
    
    return array(
      '#markup' => $this->t($news_list),
    );
  }

  public function access(AccountInterface $account) {
    return $account->hasPermission('access content');
  }

  public function blockForm($form, &$form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['rli_news_block_settings'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Numero de itens'),
      '#description' => $this->t('Quantidade de novos releases a serem mostrados.'),
      '#default_value' => isset($config['rli_news_block_settings']) ? $config['rli_news_block_settings']:'',
    );

    return $form;
  }
  
  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, &$form_state) {
    $this->setConfigurationValue('rli_news_block_settings', $form_state['values']['rli_news_block_settings']);
  }
}