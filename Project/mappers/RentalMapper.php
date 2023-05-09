<?php

namespace app\mappers;

use app\core\Mapper;
use app\core\Model;
use app\models\Rental;

class RentalMapper extends Mapper
{

    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;

    private ?\PDOStatement $selectCount;


    /**
     * @param \PDOStatement|null $insert
     * @param \PDOStatement|null $update
     * @param \PDOStatement|null $delete
     */
    public function __construct()

    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into rental  (renter_email, car_id, rental_date, number_of_days, sum, end_date_of_rental)
                    VALUES ( :renter_email, :car_id, :rental_date, :number_of_days, :sum, :end_date_of_rental)");
        $this->update = $this->getPdo()->prepare(
            "UPDATE rental 
                  SET renter_email = :renter_email, 
                      car_id = :car_id,
                      rental_date = :rental_date,
                      number_of_days = :number_of_days,
                      sum = :sum,
                      end_date_of_rental =: end_date_of_rental
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM rental WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM rental WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM rental");
        $this->selectCount = $this->getPdo()->prepare("SELECT count(*) FROM rental");
    }

    /**
     * @param Rental $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute([
            ":renter_email" => $model->getRenterEmail(),
            ":car_id" => $model->getCarId(),
            ":rental_date" => $model->getRentalDate(),
            ":number_of_days" => $model->getNumberOfDays(),
            ":sum" => $model->getSum(),
            ":end_date_of_rental" => $model->getEndDateOfRental()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":renter_email" => $model->getRenterEmail(),
            ":car_id" => $model->getCarId(),
            ":rental_date" => $model->getRentalDate(),
            ":number_of_days" => $model->getNumberOfDays(),
            ":sum" => $model->getSum(),
            ":end_date_of_rental" => $model->getEndDateOfRental()
        ]);
    }

    protected function doDelete(Model $model): void
    {
        $this->delete->execute([":id" => $model->getId()]);
    }

    protected function doSelect(int $id): array
    {
        $this->select->execute([":id" => $id]);
        return $this->select->fetch(\PDO::FETCH_NAMED);
    }

    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    protected function doSelectCount(): array
    {
        $this->selectCount->execute();
        return $this->selectCount->fetchAll();
    }

    function createObject(array $data): Model
    {
        return new Rental(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["renter_email"],
            $data["car_id"],
            $data["rental_date"],
            $data["number_of_days"],
            $data["sum"],
            $data["end_date_of_rental"]
        );
    }

    public function getInstance()
    {
        return $this;
    }
}