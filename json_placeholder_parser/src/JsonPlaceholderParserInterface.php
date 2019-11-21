<?php

namespace Drupal\json_placeholder_parser;

/**
 * Interface JsonPlaceholderParserInterface.
 *
 * @package Drupal\json_placeholder_parser
 */
interface JsonPlaceholderParserInterface {

  /**
   * Provides json parse content todos.
   *
   * @param int $todosId
   *
   * @return mixed
   */
  public function parseTodos($todosId);

  /**
   * Provides json parse content posts.
   *
   * @param int $postId
   *
   * @return mixed
   */
  public function parsePosts($postId);

  /**
   * Provides json parse content comments.
   *
   * @param int $postId
   *
   * @return mixed
   */
  public function parseComments($postId);

}
