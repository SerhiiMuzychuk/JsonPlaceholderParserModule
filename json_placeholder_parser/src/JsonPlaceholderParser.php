<?php

namespace Drupal\json_placeholder_parser;

use GuzzleHttp\Client;
use Drupal\Core\Logger\LoggerChannelFactory;
use Drupal\Component\Serialization\Json;

/**
 * Class JsonPlaceholderParser.
 *
 * @package Drupal\json_placeholder_parser
 */
class JsonPlaceholderParser implements JsonPlaceholderParserInterface{

  /**
   * The Guzzle HTTP Client service.
   *
   * @var \GuzzleHttp\Client
   */
  protected $httpClient;

  /**
   * The logger service.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactory
   */
  protected $logger;

  /**
   * The logger service.
   *
   * @var \Drupal\Component\Serialization\Json
   */
  protected $json;

  /**
   * JsonPlaceholderParser constructor.
   *
   * @param \GuzzleHttp\Client $http_client
   *   The HTTP client.
   * @param \Drupal\Core\Logger\LoggerChannelFactory $logger
   *   The logger.
   * @param \Drupal\Component\Serialization\Json $json
   *   The json.
   */
  public function __construct(
    Client $http_client,
    LoggerChannelFactory $logger,
    Json $json
  ) {
    $this->httpClient = $http_client;
    $this->logger = $logger->get('json_placeholder_parser');
    $this->json = $json;
  }

  /**
   * Provides json parse todos.
   *
   * {@inheritdoc}
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function parseTodos($todosId = 1) {
    $response = $this->httpClient->request(
      'GET',
      'https://jsonplaceholder.typicode.com/todos/' . $todosId,
      []
    );
    $response = $this->json->decode($response->getBody());
    return $response;
  }

  /**
   * Provides json parse posts.
   *
   * {@inheritdoc}
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function parsePosts($postId = 1) {
    $response = $this->httpClient->request(
      'GET',
      'https://jsonplaceholder.typicode.com/posts/' . $postId,
      []
    );
    $response = $this->json->decode($response->getBody());
    return $response;
  }

  /**
   * Provides json parse comments.
   *
   *{@inheritdoc}
   *
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function parseComments($postId = 1) {
    $response = $this->httpClient->request(
      'GET',
      'https://jsonplaceholder.typicode.com/comments',
      [
        'query' => [
          'postId' => $postId,
        ],
      ]
    );
    $response = $this->json->decode($response->getBody());
    return $response;
  }

}
