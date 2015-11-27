<?php
/**
 * BasicSeed plugin data seed file.
 */

namespace App\Config\BasicSeed;

$Applicants = $this->loadModel('Applicants');
$applicants = 
[
  [     
    'id_card' => '123453748969',
    'full_name' => 'full name',
    'email' => 'adi@email.com.id',
    'password' => 'Passw0rd',
    'religion' => 'Islam',
    'blood_type' => 'A',
    'phone_number' => '+6289627302553',
    'gender' => 'M',
    'address' => 'full name',
    'place_of_birth' => 'Bandung',
  ],
  [
    'id_card' => '123463487568',
    'full_name' => 'full name',
    'email' => 'adi@emsail.com',
    'password' => 'Passw0rd',
    'religion' => 'Islam',
    'blood_type' => 'A',
    'phone_number' => '+6289627301553',
    'gender' => 'F',
    'address' => 'full name',
    'place_of_birth' => 'Bandung',
  ],
];

foreach ($applicants as $applicant) {
    $entity = $Applicants->newEntity($applicant); // Careful, validation is still on!
    if($Applicants->save($entity)) {
      $this->out("Saved {$entity->id}");
    }else{
      $this->out("Save failed where email = {$entity->email}");
    }
  }