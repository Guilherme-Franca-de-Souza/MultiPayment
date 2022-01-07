<?php

namespace Potelo\MultiPayment\Models;

use DateTimeImmutable;

/**
 * Class Customer
 */
class Customer extends Model
{

    /**
     * @var string|null
     */
    public ?string $id = null;

    /**
     * @var string|null
     */
    public ?string $name = null;

    /**
     * @var string|null
     */
    public ?string $email = null;

    /**
     * @var string|null
     */
    public ?string $taxDocument = null;

    /**
     * @var string|null
     */
    public ?string $birthDate = null;

    /**
     * @var string|null
     */
    public ?string $phoneCountryCode = null;

    /**
     * @var string|null
     */
    public ?string $phoneArea = null;

    /**
     * @var string|null
     */
    public ?string $phoneNumber = null;

    /**
     * @var Address|null
     */
    public ?Address $address = null;

    /**
     * @var string|null
     */
    public ?string $gateway = null;

    /**
     * @var mixed|null
     */
    public $original = null;

    /**
     * @var DateTimeImmutable|null
     */
    public ?DateTimeImmutable $createdAt = null;

    /**
     * @inheritDoc
     */
    public function fill(array $data): void
    {
        if (!empty($data['address']) && is_array($data['address'])) {
            $address = new Address();
            $address->fill($data['address']);
            $data['address'] = $address;
        }
        parent::fill($data);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'tax_document' => $this->taxDocument,
            'birth_date' => $this->birthDate,
            'phone_country_code' => $this->phoneCountryCode,
            'phone_area' => $this->phoneArea,
            'phone_number' => $this->phoneNumber,
            'address' => !is_null($this->address) ? $this->address->toArray() : null,
            'gateway' => $this->gateway,
            'original' => $this->original,
            'created_at' => $this->createdAt
        ];
    }
}
