<?php

declare(strict_types=1);

/*
 * This file is part of boo/bnet.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\BattleNet\OAuth2;

use Boo\BattleNet\Exceptions\OAuthException;
use Boo\BattleNet\Regions\RegionInterface;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

final class BattleNetProvider extends AbstractProvider
{
    /**
     * @var RegionInterface
     */
    protected $region;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $options = [], array $collaborators = [])
    {
        parent::__construct($options, $collaborators);

        if (false === array_key_exists('region', $options) ||
            false === $options['region'] instanceof RegionInterface) {
            throw new OAuthException('Missing required option "region"');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseAccessTokenUrl(array $params): string
    {
        return $this->region->getOAuthBaseUrl().'/oauth/token';
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseAuthorizationUrl(): string
    {
        return $this->region->getOAuthBaseUrl().'/oauth/authorize';
    }

    /**
     * {@inheritdoc}
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token): string
    {
        return $this->region->getApiBaseUrl().'/account/user?access_token='.$token->getToken();
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultScopes(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    protected function checkResponse(ResponseInterface $response, $data): void
    {
        if (\is_array($data) && array_key_exists('error', $data)) {
            throw new OAuthException($data['error'].': '.$data['error_description']);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function createResourceOwner(array $response, AccessToken $token): \stdClass
    {
        return (object) $response;
    }
}
