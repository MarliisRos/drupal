<?php

namespace Drupal\block_content\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\block_content\BlockContentTypeInterface;

/**
 * Defines the hello_world block type entity.
 *
 * @ConfigEntityType(
 *   id = "block_content_type",
 *   label = @Translation("Custom block type"),
 *   label_collection = @Translation("Custom block library"),
 *   label_singular = @Translation("hello_world block type"),
 *   label_plural = @Translation("hello_world block types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count hello_world block type",
 *     plural = "@count hello_world block types",
 *   ),
 *   handlers = {
 *     "form" = {
 *       "default" = "Drupal\block_content\BlockContentTypeForm",
 *       "add" = "Drupal\block_content\BlockContentTypeForm",
 *       "edit" = "Drupal\block_content\BlockContentTypeForm",
 *       "delete" = "Drupal\block_content\Form\BlockContentTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider"
 *     },
 *     "list_builder" = "Drupal\block_content\BlockContentTypeListBuilder"
 *   },
 *   admin_permission = "administer blocks",
 *   config_prefix = "type",
 *   bundle_of = "block_content",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label"
 *   },
 *   links = {
 *     "delete-form" = "/admin/structure/block/block-content/manage/{block_content_type}/delete",
 *     "edit-form" = "/admin/structure/block/block-content/manage/{block_content_type}",
 *     "collection" = "/admin/structure/block/block-content/types",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "revision",
 *     "description",
 *   }
 * )
 */
class BlockContentType extends ConfigEntityBundleBase implements BlockContentTypeInterface {

  /**
   * The hello_world block type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The hello_world block type label.
   *
   * @var string
   */
  protected $label;

  /**
   * The default revision setting for hello_world blocks of this type.
   *
   * @var bool
   */
  protected $revision;

  /**
   * The description of the block type.
   *
   * @var string
   */
  protected $description;

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * {@inheritdoc}
   */
  public function shouldCreateNewRevision() {
    return $this->revision;
  }

}
