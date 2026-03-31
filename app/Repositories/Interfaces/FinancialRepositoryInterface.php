<?php

namespace App\Repositories\Interfaces;

interface FinancialRepositoryInterface
{
    public function getFinancialData(); // Fee aur Salary ka sara data layega
    public function updateFeeStructure(array $data); // Fee save karega
    public function updateSalaryStructure(array $data); // Salary save karega
}