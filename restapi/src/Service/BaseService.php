<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\ReviewException;
use App\Exception\UserException;
use App\Exception\ComplaintException;
use Respect\Validation\Validator as v;

abstract class BaseService
{
    protected static function validateUserName(string $name): string
    {
        if (!v::alnum()->length(2, 100)->validate($name)) {
            throw new UserException('Invalid name.', 400);
        }

        return $name;
    }

    protected static function validateEmail(string $emailValue): string
    {
        $email = filter_var($emailValue, FILTER_SANITIZE_EMAIL);
        if (!v::email()->validate($email)) {
            throw new UserException('Invalid email', 400);
        }

        return $email;
    }

    protected static function validateReviewAnswers(string $q_a): string
    {
        if (!v::length(2, 100)->validate($q_a)) {
            throw new ReviewException('Invalid q&a.', 400);
        }

        return $q_a;
    }

    protected static function validateReviewGeoTag(string $geo_tag): string
    {
        if (!v::length(2, 100)->validate($geo_tag)) {
            throw new ReviewException('Invalid Geo Tag', 400);
        }

        return $geo_tag;
    }

    protected static function validateComplaintGeoTag(string $geo_tag): string
    {
        if (!v::length(2, 100)->validate($geo_tag)) {
            throw new ComplaintException('The Geo Tag of the position is invalid.', 400);
        }

        return $geo_tag;
    }
}
