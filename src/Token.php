<?php declare(strict_types=1);

namespace ncryptf;

final class Token
{
    /**
     * The access token
     *
     * @var string
     */
    public $accessToken;

    /**
     * The refresh token
     *
     * @var string
     */
    public $refreshToken;

    /**
     * The 32 byte initial key material
     *
     * @var string
     */
    public $ikm;

    /**
     * The 32 byte signature string
     *
     * @var string
     */
    public $signature;

    /**
     * The token expiration time
     *
     * @var float
     */
    public $expiresAt;

    /**
     * Constructor
     *
     * @param string $accessToken  The access token
     * @param string $refreshToken The refresh token
     * @param string $ikm          32 byte initial key material as a byte array
     * @param string $signature    32 byte signature string as a byte array
     * @param float $expiresAt     The expiration time of the token
     */
    public function __construct(string $accessToken, string $refreshToken, string $ikm, string $signature, float $expiresAt)
    {
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->ikm = $ikm;
        $this->signature = $signature;
        $this->expiresAt = $expiresAt;
    }

    /**
     * Returns true if the token is expired
     *
     * @return boolean
     */
    public function isExpired()
    {
        return \time() > $this->expiresAt;
    }
}
