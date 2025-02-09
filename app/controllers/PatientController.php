<?php

use Core\Controller;

use App\Repositories\PatientRepository;


class PatientController extends Controller
{
    private $patientRepository;

    public function __construct()
    {
        $this->patientRepository = new PatientRepository();
    }

    public function index(){
        $patients = $this->patientRepository->getAllPatients();
        $this -> view('admin/patients', ['patients' => $patients]);
    }

    public function get($id=5){
        $patient = $this->patientRepository->getPatientById($id);
        $this -> view('admin/patient', ['patient' => $patient]);
    }
}