<?php

namespace Drupal\block_content\Form;

use Drupal\Core\Entity\EntityDeleteForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a confirmation form for deleting a hello_world block type entity.
 *
 * @internal
 */
class BlockContentTypeDeleteForm extends EntityDeleteForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $block_count = $this->entityTypeManager->getStorage('block_content')->getQuery()
      ->accessCheck(FALSE)
      ->condition('type', $this->entity->id())
      ->count()
      ->execute();
    if ($block_count) {
      $caption = '<p>' . $this->formatPlural($block_count, '%label is used by 1 hello_world block on your site. You can not remove this block type until you have removed all of the %label blocks.', '%label is used by @count hello_world blocks on your site. You may not remove %label until you have removed all of the %label hello_world blocks.', ['%label' => $this->entity->label()]) . '</p>';
      $form['description'] = ['#markup' => $caption];
      return $form;
    }
    else {
      return parent::buildForm($form, $form_state);
    }
  }

}
