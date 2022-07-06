<?php
/**
 *  Implements hook_mail_alter().
 */

function reservation_mail_alter(&$message) {
  if (isset($message['id']) && $message['id'] == 'reservation_page_mail') {
    /**@var \Drupal\reservation\Entity\Message $contact_message */
    $contact_message = $message['params']['contact_message'];
    // Get sender's name.
    $sender_name = $contact_message->getSenderName();
    // Get sender's mail.
    $sender_mail = $contact_message->getSenderMail();
    // Get subject.
    $subject = $contact_message->getSubject();
    // Get message.
    $message_body = $contact_message->getMessage();
    // Get the value of "field_request" field.
    $request_value = $contact_message->get('field_request')->getValue();
  }
}
