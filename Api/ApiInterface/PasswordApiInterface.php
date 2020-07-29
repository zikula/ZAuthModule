<?php

declare(strict_types=1);

/*
 * This file is part of the Zikula package.
 *
 * Copyright Zikula - https://ziku.la/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zikula\ZAuthModule\Api\ApiInterface;

use InvalidArgumentException;

/**
 * @deprecated at Core-3.0.0 to be removed Core-4.0.0
 */
interface PasswordApiInterface
{
    public const SALT_DELIM = '$';

    public const SALT_LENGTH = 5;

    public const DEFAULT_HASH_METHOD_CODE = 8;

    public const MIN_LENGTH = 5;

    public const MAX_LENGTH = 25;

    /**
     * Given a string return it's hash.
     *
     * @param string $unhashedPassword An unhashed password, as might be entered by a user or generated by the system, that meets
     *                                  all of the constraints of a valid password for a user account
     * @param int $hashMethodCode An internal code identifying one of the valid user password hashing methods; optional
     *
     * @return string A hashed password
     * @throws InvalidArgumentException
     */
    public function getHashedPassword(
        string $unhashedPassword,
        int $hashMethodCode = self::DEFAULT_HASH_METHOD_CODE
    ): string;

    /**
     * Create a system-generated password or password-like code, meeting the configured constraints for a password.
     *
     * @return string The generated (unhashed) password-like string
     */
    public function generatePassword(int $length = self::MIN_LENGTH): string;

    /**
     * Compare a code to a hashed value, to determine if they match.
     *
     * @param string $unhashedPassword The password-like code entered by the user
     * @param string $hashedPassword   The hashed password-like code that the entered password-like code is to be compared to
     *
     * @return bool True if the $unhashedPassword matches the $hashedPassword with the given hashing method;
     *                  false if they do not match
     * @throws InvalidArgumentException
     */
    public function passwordsMatch(string $unhashedPassword, string $hashedPassword): bool;
}
