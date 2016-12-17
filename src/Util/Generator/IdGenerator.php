<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.12.16
 * Time: 09:41
 */
namespace Conversio\Util\Generator;

use DateTime;

class IdGenerator
{
    /**
     * @var string
     */
    private $seed;

    /**
     * @var DateTime;
     */
    private $datetime;

    /**
     * IdGenerator constructor.
     *
     * @param               $seed
     * @param DateTime|null $datetime
     */
    public function __construct($seed, DateTime $datetime = null)
    {
        $this->seed     = $seed;
        $this->datetime = !empty($datetime) ? $datetime : new DateTime();
    }

    /**
     * @param int $length
     *
     * @return string
     */
    public function generateId($length = 20)
    {
        $seed      = $this->seed . $this->datetime->getTimestamp();
        $rand      = bin2hex(random_bytes(10));
        $generated = '';
        while (strlen($generated) < $length) {
            $generated .= base64_encode(md5($seed . $rand));
        }

        return substr($generated, 0, $length);
    }

}