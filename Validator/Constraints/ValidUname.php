<?php

declare(strict_types=1);

/*
 * This file is part of the Zikula package.
 *
 * Copyright Zikula Foundation - https://ziku.la/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zikula\ZAuthModule\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ValidUname extends Constraint
{
    public $message = 'The uname "%string%" is invalid.';

    public $excludedUid;

    /**
     * {@inheritdoc}
     */
    public function getDefaultOption()
    {
        return 'excludedUid';
    }
}
