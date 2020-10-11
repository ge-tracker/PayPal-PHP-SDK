<?php
namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;

/**
 * Class OpenIdUserinfo
 *
 * OpenIdConnect UserInfo Resource
 *
 * @property string user_id
 * @property string sub
 * @property mixed name
 * @property string given_name
 * @property string family_name
 * @property string middle_name
 * @property string picture
 * @property string email
 * @property bool email_verified
 * @property string gender
 * @property string birthday
 * @property string zoneinfo
 * @property string locale
 * @property string language
 * @property bool verified
 * @property string phone_number
 * @property OpenIdAddress address
 * @property mixed verified_account
 * @property mixed account_type
 * @property string age_range
 * @property string payer_id
 */
class OpenIdUserinfo extends PayPalResourceModel
{

    /**
     * Subject - Identifier for the End-User at the Issuer.
     *
     * @param string $user_id
     * @return self
     */
    public function setUserId($user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * Subject - Identifier for the End-User at the Issuer.
     *
     * @return string
     */
    public function getUserId(): string
    {
        return $this->user_id;
    }

    /**
     * Subject - Identifier for the End-User at the Issuer.
     *
     * @param string $sub
     * @return self
     */
    public function setSub($sub): self
    {
        $this->sub = $sub;
        return $this;
    }

    /**
     * Subject - Identifier for the End-User at the Issuer.
     *
     * @return string
     */
    public function getSub(): string
    {
        return $this->sub;
    }

    /**
     * End-User's full name in displayable form including all name parts, possibly including titles and suffixes, ordered according to the End-User's locale and preferences.
     *
     * @param string $name
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * End-User's full name in displayable form including all name parts, possibly including titles and suffixes, ordered according to the End-User's locale and preferences.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Given name(s) or first name(s) of the End-User
     *
     * @param string $given_name
     * @return self
     */
    public function setGivenName($given_name): self
    {
        $this->given_name = $given_name;
        return $this;
    }

    /**
     * Given name(s) or first name(s) of the End-User
     *
     * @return string
     */
    public function getGivenName(): string
    {
        return $this->given_name;
    }

    /**
     * Surname(s) or last name(s) of the End-User.
     *
     * @param string $family_name
     * @return self
     */
    public function setFamilyName($family_name): self
    {
        $this->family_name = $family_name;
        return $this;
    }

    /**
     * Surname(s) or last name(s) of the End-User.
     *
     * @return string
     */
    public function getFamilyName(): string
    {
        return $this->family_name;
    }

    /**
     * Middle name(s) of the End-User.
     *
     * @param string $middle_name
     * @return self
     */
    public function setMiddleName($middle_name): self
    {
        $this->middle_name = $middle_name;
        return $this;
    }

    /**
     * Middle name(s) of the End-User.
     *
     * @return string
     */
    public function getMiddleName(): string
    {
        return $this->middle_name;
    }

    /**
     * URL of the End-User's profile picture.
     *
     * @param string $picture
     * @return self
     */
    public function setPicture($picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * URL of the End-User's profile picture.
     *
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * End-User's preferred e-mail address.
     *
     * @param string $email
     * @return self
     */
    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * End-User's preferred e-mail address.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * True if the End-User's e-mail address has been verified; otherwise false.
     *
     * @param boolean $email_verified
     * @return self
     */
    public function setEmailVerified($email_verified): self
    {
        $this->email_verified = $email_verified;
        return $this;
    }

    /**
     * True if the End-User's e-mail address has been verified; otherwise false.
     *
     * @return boolean
     */
    public function getEmailVerified(): bool
    {
        return $this->email_verified;
    }

    /**
     * End-User's gender.
     *
     * @param string $gender
     * @return self
     */
    public function setGender($gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * End-User's gender.
     *
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * End-User's birthday, represented as an YYYY-MM-DD format. They year MAY be 0000, indicating it is omited. To represent only the year, YYYY format would be used.
     *
     * @param string $birthday
     * @return self
     */
    public function setBirthday($birthday): self
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * End-User's birthday, represented as an YYYY-MM-DD format. They year MAY be 0000, indicating it is omited. To represent only the year, YYYY format would be used.
     *
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    /**
     * Time zone database representing the End-User's time zone
     *
     * @param string $zoneinfo
     * @return self
     */
    public function setZoneinfo($zoneinfo): self
    {
        $this->zoneinfo = $zoneinfo;
        return $this;
    }

    /**
     * Time zone database representing the End-User's time zone
     *
     * @return string
     */
    public function getZoneinfo(): string
    {
        return $this->zoneinfo;
    }

    /**
     * End-User's locale.
     *
     * @param string $locale
     * @return self
     */
    public function setLocale($locale): self
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * End-User's locale.
     *
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * End-User's language.
     *
     * @param string $language
     * @return self
     */
    public function setLanguage($language): self
    {
        $this->language = $language;
        return $this;
    }

    /**
     * End-User's language.
     *
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * End-User's verified status.
     *
     * @param boolean $verified
     * @return self
     */
    public function setVerified($verified): self
    {
        $this->verified = $verified;
        return $this;
    }

    /**
     * End-User's verified status.
     *
     * @return boolean
     */
    public function getVerified(): bool
    {
        return $this->verified;
    }

    /**
     * End-User's preferred telephone number.
     *
     * @param string $phone_number
     * @return self
     */
    public function setPhoneNumber($phone_number): self
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    /**
     * End-User's preferred telephone number.
     *
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    /**
     * End-User's preferred address.
     *
     * @param \PayPal\Api\OpenIdAddress $address
     * @return self
     */
    public function setAddress($address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * End-User's preferred address.
     *
     * @return \PayPal\Api\OpenIdAddress
     */
    public function getAddress(): OpenIdAddress
    {
        return $this->address;
    }

    /**
     * Verified account status.
     *
     * @param boolean $verified_account
     * @return self
     */
    public function setVerifiedAccount($verified_account): self
    {
        $this->verified_account = $verified_account;
        return $this;
    }

    /**
     * Verified account status.
     *
     * @return boolean
     */
    public function getVerifiedAccount(): bool
    {
        return $this->verified_account;
    }

    /**
     * Account type.
     *
     * @param string $account_type
     * @return self
     */
    public function setAccountType($account_type): self
    {
        $this->account_type = $account_type;
        return $this;
    }

    /**
     * Account type.
     *
     * @return string
     */
    public function getAccountType(): string
    {
        return $this->account_type;
    }

    /**
     * Account holder age range.
     *
     * @param string $age_range
     * @return self
     */
    public function setAgeRange($age_range): self
    {
        $this->age_range = $age_range;
        return $this;
    }

    /**
     * Account holder age range.
     *
     * @return string
     */
    public function getAgeRange(): string
    {
        return $this->age_range;
    }

    /**
     * Account payer identifier.
     *
     * @param string $payer_id
     * @return self
     */
    public function setPayerId($payer_id): self
    {
        $this->payer_id = $payer_id;
        return $this;
    }

    /**
     * Account payer identifier.
     *
     * @return string
     */
    public function getPayerId(): string
    {
        return $this->payer_id;
    }


    /**
     * returns user details
     *
     * @path /v1/identity/openidconnect/userinfo
     * @method GET
     * @param array        $params     (allowed values are access_token)
     *                                 access_token - access token from the createFromAuthorizationCode / createFromRefreshToken calls
     * @param ApiContext $apiContext Optional API Context
     * @param PayPalRestCall $restCall
     * @return OpenIdUserinfo
     */
    public static function getUserinfo($params, $apiContext = null, $restCall = null): OpenIdUserinfo
    {
        static $allowedParams = array('schema' => 1);

        $params = is_array($params)  ? $params : array();

        if (!array_key_exists('schema', $params)) {
            $params['schema'] = 'openid';
        }
        $requestUrl = "/v1/identity/openidconnect/userinfo?"
            . http_build_query(array_intersect_key($params, $allowedParams));

        $json = self::executeCall(
            $requestUrl,
            "GET",
            "",
            array(
                'Authorization' => "Bearer " . $params['access_token'],
                'Content-Type' => 'x-www-form-urlencoded'
            ),
            $apiContext,
            $restCall
        );

        $ret = new OpenIdUserinfo();
        $ret->fromJson($json);

        return $ret;
    }
}
