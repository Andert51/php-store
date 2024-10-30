<?php
    interface iEmployee {
        public function createEmployee($employee);
        public function updateEmployee($employee);
        public function deleteEmployee($idemployee);
        public function getAllEmployees();
        public function getEmployeeByName($name);
        public function getEmployeeByRole($role);
    }
?>