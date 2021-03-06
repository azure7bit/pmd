<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
// use App\Model\Value\Gender;
use Cake\ORM\Entity;
use Cake\Utility\Text;
use DateTime;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * Applicant Entity.
 *
 * @property int $id
 * @property string $id_card
 * @property string $full_name
 * @property string $email
 * @property string $password
 * @property string $address
 * @property string $religion
 * @property string $blood_type
 * @property string $phone_number
 * @property string $gender
 * @property string $avatar
 * @property string $confirmation_token
 * @property \Cake\I18n\Time $confirmation_at
 * @property int $created_by
 * @property \Cake\I18n\Time $creation_date
 * @property int $last_updated_by
 * @property \Cake\I18n\Time $last_update_date
 * @property \App\Model\Entity\ApplicantJobList[] $applicant_job_lists
 */

class Applicant extends Entity
{

  /**
   * Fields that can be mass assigned using newEntity() or patchEntity().
   *
   * Note that when '*' is set to true, this allows all unspecified fields to
   * be mass assigned. For security purposes, it is advised to set '*' to false
   * (or remove it), and explicitly make individual fields accessible as needed.
   *
   * @var array
   */
  // protected $_accessible = [
  //   '*' => true,
  //   'id' => false,
  //   'password_confirmation' => true,
  //   'securitycode' => true
  // ];


  /**
   * Fields that can be mass assigned using newEntity() or patchEntity().
   *
   * @var array
   */
  protected $_accessible = [
      '*' => true,
      'avatar'=>true,
      'AVATAR' => true,
      'AVATAR_DIR' => true,
      'current_password' => true,
      'password_confirmation' => true,
  ];

  public $actsAs = array(
    'Captcha' => array(
        'field' => array('security_code'),
        'error' => 'Incorrect captcha code value'
    )
  );

  protected function _getBirthdate(){
    if(is_null($this->_properties['birthdate'])){
        return $this->_properties['birthdate'];
    }else{
        return date_format($this->_properties['birthdate'], "d M Y");
    }
  }

  /**
   * @param string $password password that will be set.
   * @return bool|string
   */
  protected function _setPassword($password)
  {
      return $this->hashPassword($password);
  }

  /**
   * @param string $password password that will be confirm.
   * @return bool|string
   */
  protected function _setPasswordConfirmation($password)
  {
      return $this->hashPassword($password);
  }
  

  // protected function _setCurrentPassword($password)
  // {
  //     return $this->hashPassword($password);
  // }

  /**
   * @param string $tos tos option. It will be set the tos_date
   * @return bool
   */
  protected function _setTos($tos)
  {
      if ((bool)$tos === true) {
          $this->set('tos_date', new DateTime());
      }
      return $tos;
  }

  protected function _setTosDate($tos_date)
  {
    return date_format($tos_date, 'Y-m-d');
  }

  /**
   * Hash a password using the configured password hasher,
   * use DefaultPasswordHasher if no one was configured
   *
   * @param string $password password to be hashed
   * @return mixed
   */
  public function hashPassword($password)
  {
    $PasswordHasher = $this->getPasswordHasher();
    return $PasswordHasher->hash($password);
  }

  /**
   * Return the configured Password Hasher
   *
   * @return mixed
   */
  public function getPasswordHasher()
  {
    // $passwordHasher = Configure::read('Users.passwordHasher');
    // if (!class_exists($passwordHasher)) {
      $passwordHasher = '\Cake\Auth\DefaultPasswordHasher';
    // }
    return new $passwordHasher;
  }

  /**
   * Checks if a password is correctly hashed
   *
   * @param string $password password that will be check.
   * @param string $hashedPassword hash used to check password.
   * @return bool
   */
  public function checkPassword($password, $hashedPassword)
  {
      $PasswordHasher = $this->getPasswordHasher();
      return $PasswordHasher->check($password, $hashedPassword);
  }

  /**
   * Returns if the token has already expired
   *
   * @return bool
   */
  public function tokenExpired()
  {
    return empty($this->token_exp) || strtotime($this->token_exp) < strtotime("now");
  }


  /**
   * Generate token_expires and token in a user
   * @param string $tokenExpiration new token_expires user.
   *
   * @return void
   */
  public function updateToken($tokenExpiration)
  {
    $expires = new DateTime();
    // $expires->modify("+ $tokenExpiration secs");
    // $expires->modify("$tokenExpiration");
    $expires = date_format($expires, 'Y-m-d');
    $this->token_exp = $expires;
    $this->token = str_replace('-', '', Text::uuid());

  }

  public function setToken()
  {
    $expires = new DateTime();
    $expires = date_format($expires, 'Y-m-d');
    $value = $expires + $this->email;
    $hasher = new DefaultPasswordHasher();
    $this->token = $hasher->hash($value);
  }

  public function setActivationDate(){
    $this->last_update_date;
    return $this->last_update_date;
  }
 
  public function avatar_url($thumbnailtype=null)
  {
    if(!empty($thumbnailtype)){
      $value = '/filesAVATAR/erc_applicants/AVATAR/'. $this->avatar_dir . '/'. $thumbnailtype . "_". $this->avatar;
    }else{
      $value = '/filesAVATAR/erc_applicants/AVATAR/'. $this->avatar_dir . '/'. $this->avatar;
    }
    return $value;
  }

  /**
   * Creates an activation hash for the current user.
   *
   *  @param Void
   *  @return String activation hash.
  */
  public function getActivationHash()
  {
    if (!isset($this->id)) {
      return false;
    }
    return substr(Security::hash(Configure::read('Security.salt') . $this->field('creation_date') . date('Ymd')), 0, 8);
  }

  /**
   * Change password method
   *
   * @param EntityInterface $user user data.
   * @return mixed
   */
  public function changePassword($user)
  {
    $currentUser = $this->_table->get($user->id, [
      'contain' => []
    ]);

    if (!empty($user->current_password)) {
      if (!$user->checkPassword($user->current_password, $currentUser->password)) {
        return 'The old password does not match';
      }
    }
    $user = $this->_table->save($user);
    // if (!empty($user)) {
    //   $user = $this->_removeValidationToken($user);
    // }
    return $user;
  }
}
