<?php

namespace Potelo\MultiPayment\Models;

/**
 * Class CreditCard
 */
class CreditCard extends Model
{

    /**
     * @var mixed
     */
    public $id;

    /**
     * @var string|null
     */
    public ?string $description = null;

    /**
     * @var string|null
     */
    public ?string $number = null;

    /**
     * @var string|null
     */
    public ?string $brand = null;

    /**
     * @var string|null
     */
    public ?string $month = null;

    /**
     * @var string|null
     */
    public ?string $year = null;

    /**
     * @var string|null
     */
    public ?string $cvv = null;

    /**
     * @var string|null
     */
    public ?string $lastDigits = null;

    /**
     * @var string|null
     */
    public ?string $firstName = null;

    /**
     * @var string|null
     */
    public ?string $lastName = null;

    /**
     * @var string|null
     */
    public ?string $token = null;

    /**
     * @var string|null
     */
    public ?string $gateway = null;

    /**
     * @var \DateTimeImmutable|null
     */
    public ?\DateTimeImmutable $createdAt = null;

    /**
     * @inerhitDoc
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'number' => $this->number,
            'brand' => $this->brand,
            'month' => $this->month,
            'year' => $this->year,
            'cvv' => $this->cvv,
            'last_digits' => $this->lastDigits,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'token' => $this->token,
            'gateway' => $this->gateway,
            'created_at' => $this->createdAt,
        ];
    }
}
