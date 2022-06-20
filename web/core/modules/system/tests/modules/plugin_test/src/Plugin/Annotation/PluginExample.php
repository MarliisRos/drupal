<?php

namespace Drupal\plugin_test\Plugin\Annotation;

use Drupal\Component\Annotation\AnnotationBase;

/**
 * Defines a hello_world Plugin annotation.
 *
 * @Annotation
 */
class PluginExample extends AnnotationBase {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * Another plugin metadata.
   *
   * @var string
   */
  public $custom;

  /**
   * {@inheritdoc}
   */
  public function get() {
    return [
      'id' => $this->id,
      'hello_world' => $this->custom,
      'class' => $this->class,
      'provider' => $this->provider,
    ];
  }

}
