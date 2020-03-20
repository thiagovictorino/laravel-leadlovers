<?php


namespace Victorino\Leadlovers\Models;

class Lead extends Model
{
    /**
     * @var string
     */
    public $Email;

    /**
     * @var string
     */
    public $Name;

    /**
     * @var string
     */
    public $Company;

    /**
     * @var string
     */
    public $Phone;

    /**
     * @var int
     */
    public $Score;

    /**
     * @var int
     */
    public $Tag;

    /**
     * @var string
     */
    public $Source;
}
