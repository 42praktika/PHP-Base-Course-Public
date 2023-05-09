<?php

namespace app\models;

use app\core\Model;

class Rental extends Model
{
    private string $renter_email;
    private int $car_id;
    private string $rental_date;
    private int $number_of_days;
    private int $sum;
    private string $end_date_of_rental;

    public function __construct(
        ?int $id,
        string $renter_email,
        int $car_id,
        string $rental_date,
        int $number_of_days,
        int $sum,
        string $end_date_of_rental
    ) {
        parent::__construct($id);
        $this->renter_email = $renter_email;
        $this->car_id = $car_id;
        $this->rental_date = $rental_date;
        $this->number_of_days = $number_of_days;
        $this->sum = $sum;
        $this->end_date_of_rental = $end_date_of_rental;
    }

    /**
     * @return string
     */
    public function getRenterEmail(): string
    {
        return $this->renter_email;
    }

    /**
     * @param string $renter_email
     */
    public function setRenterEmail(string $renter_email): void
    {
        $this->renter_email = $renter_email;
    }

    /**
     * @return int
     */
    public function getCarId(): int
    {
        return $this->car_id;
    }

    /**
     * @param int $car_id
     */
    public function setCarId(int $car_id): void
    {
        $this->car_id = $car_id;
    }

    /**
     * @return string
     */
    public function getRentalDate(): string
    {
        return $this->rental_date;
    }

    /**
     * @param string $rental_date
     */
    public function setRentalDate(string $rental_date): void
    {
        $this->rental_date = $rental_date;
    }

    /**
     * @return int
     */
    public function getNumberOfDays(): int
    {
        return $this->number_of_days;
    }

    /**
     * @param int $number_of_days
     */
    public function setNumberOfDays(int $number_of_days): void
    {
        $this->number_of_days = $number_of_days;
    }

    /**
     * @return int
     */
    public function getSum(): int
    {
        return $this->sum;
    }

    /**
     * @param int $sum
     */
    public function setSum(int $sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @return string
     */
    public function getEndDateOfRental(): string
    {
        return $this->end_date_of_rental;
    }

    /**
     * @param string $end_date_of_rental
     */
    public function setEndDateOfRental(string $end_date_of_rental): void
    {
        $this->end_date_of_rental = $end_date_of_rental;
    }

}